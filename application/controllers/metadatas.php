<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Metadatas extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	 
	 private function _get_event_metadatas ($eventidhash) 
	 {
		$this->load->helper('url');
		$this->load->model('Event_model');
		$this->load->model('User_model');
		$this->load->model('Stats_model');
		$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
		$this->output->set_header("Cache-Control: post-check=0, pre-check=0");
		$this->output->set_header("Pragma: no-cache");

		$event = $this->Event_model->get_event($eventidhash);
		$user = $this->User_model->get_user($event['userid']);
		
		if ($event['timebeforebegin']<=0 && $event['timebeforeend']>0)
			$event['status']='onair';
		else if ($event['timebeforeend']<=0)
			$event['status']='finished';
		else
			$event['status']='upcoming';

		$event['stats']=intval($this->Stats_model->get_live_stats($user['channel']));
//		exit(var_dump($event['stats']));
		if ($event['stats']==0) $event['stats']=1;
		
		if ($event['timebeforebegin']<=0)
		{
			//now stats
			$stats_array=array();
			$stats_from_db=$this->Stats_model->get_stats($user['channel'],$event['startdate'],$event['enddate']);
			
			$i=0;
			foreach ($stats_from_db as $row)
			{
				$list[$i]['epoch']=intval($row['epoch']);
				$list[$i]['viewers']=intval($row['viewers']);
				$i++;
			}
			if ($i>0 && $event['status']=='onair')
			{
				$list[$i]['epoch']=strtotime($event['enddate'])*1000 - 1;
				$list[$i]['viewers']=null;
				
				$list[$i+1]['epoch']=strtotime($event['enddate'])*1000;
				$list[$i+1]['viewers']=0;
			}
			
/*			$list[0]['epoch']=1365439465000; $list[0]['viewers']=3;
			$list[1]['epoch']=1365439475000; $list[1]['viewers']=6;
			$list[2]['epoch']=1365439485000; $list[2]['viewers']=13;
			$list[3]['epoch']=1365439495000; $list[3]['viewers']=11;
			$list[4]['epoch']=1365439505000; $list[4]['viewers']=16;
			$list[5]['epoch']=1365439515000; $list[5]['viewers']=15;
			$list[6]['epoch']=1365439525000; $list[6]['viewers']=15;
			$list[7]['epoch']=1365439535000; $list[7]['viewers']=14;
			$list[8]['epoch']=1365439545000; $list[8]['viewers']=10;
			$list[9]['epoch']=1365439555000; $list[9]['viewers']=7;
			$list[10]['epoch']=1365439624000; $list[10]['viewers']=null;
//			$list[11]['epoch']=1365439575000; $list[11]['viewers']=null;
//			$list[12]['epoch']=1365439585000; $list[12]['viewers']=null;
//			$list[13]['epoch']=1365439595000; $list[13]['viewers']=null;
//			$list[14]['epoch']=1365439605000; $list[14]['viewers']=null;
//			$list[15]['epoch']=1365439615000; $list[15]['viewers']=null;
			$list[11]['epoch']=1365439625000; $list[11]['viewers']=0;
			*/
			if (isset($list)) $stats_array['list']=$list;
			else $stats_array['list']=null;

			$event['stats_chart']=json_encode($stats_array);
		}
		$this->output->set_output(json_encode($event));
	}
	
	public function event($eventidhash='')
	{
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('Event_model');
		
		$event=$this->Event_model->get_event($eventidhash);
		if (isset($event))
		{
			$name = $this->input->post('name');
			$value = $this->input->post('value');

			if ($name=='title' || $name=='description' || $name=='date' || $name=='time' || $name=='duration') {
				if ($this->session->userdata('userid')!=$event['userid']) {
					$this->output->set_status_header('401');
					exit('Error, please log in');
				}
					
				if ($name=='duration' && $event['paid']==1) {
					$this->output->set_status_header('401');
					exit('Vous ne pouvez pas modifier la durée après avoir payé');
				} else if ($name=='description' && strlen($value)>1500) {
					$this->output->set_status_header('401');
					exit('Max 1500 caractères');
				} else if ($name=='title' && strlen($value)>500) {
					$this->output->set_status_header('401');
					exit('Max 500 caractères');
				}

				$result=$this->Event_model->updateevent($eventidhash,$name,$value); //not boolean
				if ($result) {
					$this->output->set_status_header('401');
					if ($name=='date' || $name=='time') echo $result=='1'?'Entrez une date/heure future':'Choisissez d\'abord une date';
					else echo 'Erreur';
				}
			} else {
				$this->_get_event_metadatas($eventidhash);
			}
		}
	}
	
	public function channel($channel='')
	{
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('User_model');
		
		$channel_data = $this->User_model->get_channel($channel);
		if (!isset($channel_data['userid']))
			show_404();
		else {
			if ($this->session->userdata('userid')!=$channel_data['userid']) {
				$this->output->set_status_header('401');
				exit('Error, please log in');
			}
			
			$name = $this->input->post('name');
			$value = $this->input->post('value');

			if ($name=='name' || $name=='userbio' || $name=='title' || $name=='description') {
				if (strlen($value)>500) {
					$this->output->set_status_header('401');
					exit('Max 500 caractères');
				}
				if ($name=='title') $name='nextevent_title';
				if ($name=='description') $name='nextevent_description';
				if ($name=='userbio') $name='description';
				$result=$this->User_model->updateprofile($channel_data['userid'],$name,$value);
				if (!$result) {
					$this->output->set_status_header('401');
					echo 'Erreur';
				}
			}
		}
	}

	public function nextevent($channel='')
	{
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('User_model');
		
		$channel_data = $this->User_model->get_channel($channel);
		if (!isset($channel_data['userid']))
			show_404();
		else {
			if ($this->session->userdata('userid')!=$channel_data['userid']) {
				$this->output->set_status_header('401');
				exit('Error, please log in');
			}
			
			$data['title'] = $this->input->post('title');
			$data['date'] = $this->input->post('date');
			$data['time'] = $this->input->post('time');
			
//			$event = $this->Event_model->get_last_event($channel_data['userid']);
//			exit(var_dump($data));
			$this->User_model->setnextevent($channel,$data);
			redirect(base_url('app'));			
//			exit($event['eventid'].' : '.$title.' '.$date.' '.$time);
		}
	}

	public function getchannelstatus($channel='') //pour embed2
	{
		$this->load->helper('url');
		$this->load->model('Event_model');
		$this->load->model('User_model');
		$this->load->model('Stats_model');

		$channel_data = $this->User_model->get_channel($channel);
		if (!isset($channel_data['userid']))
			show_404();
		else {
			$event = $this->Event_model->get_last_event($channel_data['userid']);
			
			if (!isset($event)) {
				$data['status']='offline';
			} else {
				$data['stats']=intval($this->Stats_model->get_live_stats($channel));
				if ($data['stats']==0) $data['stats']=1;
	
				$data['channel']=$channel;
				$data['m3u8']='http://pull.lmal.tv/live/'.$channel.'/playlist.m3u8';
				
				if ($event['timebeforebegin']<=0 && ($event['enddate']=='0000-00-00 00:00:00' || $event['timebeforeend']>0))
					$data['status']='live';
				else
					$data['status']='offline';
			}				
			//get next event date / title
			$data['nextevent_date']=$channel_data['nextevent_date'];
			$data['nextevent_time']=$channel_data['nextevent_time'];
			$data['timebeforebegin']=$channel_data['timebeforebegin'];
			$data['timebeforebegin_hours']=$channel_data['timebeforebegin_hours'];
			$data['timebeforebegin_days']=$channel_data['timebeforebegin_days'];
			$data['nextevent_title']=$channel_data['nextevent_title'];

			
			
			$this->output->set_output(json_encode($data));
		}
	}
	
	public function picture($channel='')
	{
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('User_model');
		
		$channel_data = $this->User_model->get_channel($channel);
		if (!isset($channel_data['userid']))
			show_404();
		else {
			if ($this->session->userdata('userid')!=$channel_data['userid'])
				exit('Error, please log in');
				
			$config['upload_path'] = APPPATH.'../assets/pictures/';
			$config['file_name'] = $channel;
			$config['allowed_types'] = 'gif|jpg|png';
			$config['overwrite']=TRUE;
			$config['max_size']	= '200000'; //200KB
			$config['max_width']  = '256';
			$config['max_height']  = '256';
	
			$this->load->library('upload', $config);
	
			if (!$this->upload->do_upload())
			{
				$error = $this->upload->display_errors();
				switch (strlen($error)) {
					case 83:
						$error='L\'image est trop grande (max 256x256)'; //exit('width or height error');
						break;
					case 64:
						$error='L\'image doit être en png, gif ou jpg';//exit('wrong filetype');
						break;
					case 79:
						$error='L\'image est trop volumineuse (max 200KB)';//exit('too big');
						break;
					default:
						break;
				}
				$this->session->set_flashdata('anypictupload', $error);
				redirect(base_url($channel));
			}
			else
			{
				//dont forget to delete all other pictures!
				$data = array('upload_data' => $this->upload->data());
				switch($data['upload_data']['file_ext']){
					case '.jpg':
						unlink(APPPATH.'../assets/pictures/'.$channel.'.gif');
						unlink(APPPATH.'../assets/pictures/'.$channel.'.png');
						break;
					case '.png':
						unlink(APPPATH.'../assets/pictures/'.$channel.'.gif');
						unlink(APPPATH.'../assets/pictures/'.$channel.'.jpg');
						break;
					case '.gif':
						unlink(APPPATH.'../assets/pictures/'.$channel.'.jpg');
						unlink(APPPATH.'../assets/pictures/'.$channel.'.png');
						break;
				}
				$this->session->set_flashdata('anypictupload', '');
				redirect(base_url($channel.'#avatarupload'));
			}
		}
	}
	
	public function poster($eventidhash='')
	{
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('Event_model');
		$this->load->model('User_model');
				
		$event=$this->Event_model->get_event($eventidhash);
		if (isset($event))
		{
			if ($this->session->userdata('userid')!=$event['userid'])
				exit('Error, please log in');

			$config['upload_path'] = APPPATH.'../assets/posters/';
			$config['file_name'] = $eventidhash;
			$config['allowed_types'] = 'gif|jpg|png';
			$config['overwrite']=TRUE;
			$config['max_size']	= '2000000'; //200KB
			$config['max_width']  = '1024';
			$config['max_height']  = '576';
	
			$this->load->library('upload', $config);
	
			if (!$this->upload->do_upload())
			{
				$error = $this->upload->display_errors();
				switch (strlen($error)) {
					case 83:
						$error='L\'image est trop grande (max 1024x576)'; //exit('width or height error');
						break;
					case 64:
						$error='L\'image doit être en png, gif ou jpg';//exit('wrong filetype');
						break;
					case 79:
						$error='L\'image est trop volumineuse (max 200KB)';//exit('too big');
						break;
					default:
						break;
				}
				$this->session->set_flashdata('anypictupload', $error);
			}
			else
			{
				//dont forget to delete all other pictures!
				$data2 = array('upload_data' => $this->upload->data());
				switch($data2['upload_data']['file_ext']){
					case '.jpg':
						unlink(APPPATH.'../assets/posters/'.$eventidhash.'.gif');
						unlink(APPPATH.'../assets/posters/'.$eventidhash.'.png');
						break;
					case '.png':
						unlink(APPPATH.'../assets/posters/'.$eventidhash.'.gif');
						unlink(APPPATH.'../assets/posters/'.$eventidhash.'.jpg');
						break;
					case '.gif':
						unlink(APPPATH.'../assets/posters/'.$eventidhash.'.jpg');
						unlink(APPPATH.'../assets/posters/'.$eventidhash.'.png');
						break;
				}			//exit(var_dump($data));
				$this->session->set_flashdata('anypictupload', '');
			}
			$user=$this->User_model->get_user($event['userid']);
			redirect(base_url($user['channel']));
		}
	}
}

/* End of file metadatas.php */
/* Location: ./application/controllers/metadatas.php */