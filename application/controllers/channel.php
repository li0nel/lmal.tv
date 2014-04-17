<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Channel extends CI_Controller {

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
	private function remotefileexists($url)
	{
		 $ch = curl_init($url);
		curl_setopt($ch, CURLOPT_NOBODY, true);
		curl_exec($ch);
		$retcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		// $retcode > 400 -> not found, $retcode = 200, found.
		curl_close($ch);
		return $retcode<400 && $retcode!=0;
	}
	
	public function embed($channel='',$format='') {
		$this->load->helper('url');
		$this->load->model('User_model');

		$channel_data = $this->User_model->get_channel($channel);
		if (!isset($channel_data['userid']))
			show_404();
		else {
			$data['poster']=base_url('assets/images/offline.png');
			$data['rtmp']='rtmp://push.lmal.tv/pub/'.$channel;
			$data['m3u8']='http://hls.lmal.tv/live/'.$channel.'/index.m3u8';
			$data['channel']=$channel;

			if ($format=='fb') {
				$data['width']=640;
				$data['height']=360;
				$data['poster']=base_url('assets/images/offline.png');
				$data['rtmp']='rtmp://push.lmal.tv/pub/'.$channel;
				$data['m3u8']='http://hls.lmal.tv/live/'.$channel.'/index.m3u8';

				$data['fb']=true;
			} else {
				if ($format=='') {
					$data['width']=1024;
					$data['height']=576;
				} else if ($format=='large') {
					$data['width']=853;
					$data['height']=480;
				} else if ($format=='medium') {
					$data['width']=640;
					$data['height']=360;
				} else if ($format=='small') {
					$data['width']=480;
					$data['height']=270;
				}
			}
			
			$this->load->view('embed',$data);
		}
	}

	public function publicchannel($channel='') {
		$this->load->helper('url');
		$this->load->model('User_model');
		$this->load->library('session');

		$channel_data = $this->User_model->get_channel($channel);
		
		if (!isset($channel_data['userid']))
			show_404();
		else {
			$data['uploaderror']=$this->session->flashdata('anypictupload');
			$data['ownername']=$channel_data['name'];
			$data['ownerbio']=$channel_data['description'];
			$data['channel']=$channel;
			$data['price']='coucou';
			
			if ($channel_data['price']!=0)
				$data['poster']=base_url('assets/images/mire.png');
			else
				$data['poster']=base_url('assets/images/offline.png');
	
			$data['rtmp']='rtmp://push.lmal.tv/pub/'.$channel;
			$data['m3u8']='http://hls.lmal.tv/live/'.$channel.'/index.m3u8';
			$data['date']=$channel_data['nextevent_date'];
			$data['hour']=$channel_data['nextevent_time'];
			$data['picture'] = $channel_data['picture'];
			$data['title'] = $channel_data['nextevent_title'];
			$data['description'] = $channel_data['nextevent_description'];
			
			if ($this->session->userdata('userid')==$channel_data['userid'])
				$this->load->view('newadmin',$data);					
			else
				$this->load->view('newchannel',$data);
		}
	}

/*	public function index($channel='',$eventidhash='',$embed='',$format='') //TODO tout réécrire, séparer embed / page channel-admin
	{
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('Event_model');
		$this->load->model('User_model');
		$this->load->library('form_validation');
		$this->load->helper('form');

		$channel_data = $this->User_model->get_channel($channel);
		if (!isset($channel_data['userid']))
			show_404();
		else {
			if ($eventidhash=='')
				$event = $this->Event_model->get_last_event($channel_data['userid']);
			else
				$event = $this->Event_model->get_event($eventidhash);
			
			if (!isset($event)) show_404();
			
			$data['uploaderror']=$this->session->flashdata('anypictupload');
			$data['ownername']=$channel_data['name'];
			$data['ownerbio']=$channel_data['description'];
			$data['channel']=$channel;
			$data['m3u8']='http://pull.lmal.tv/live/'.$channel.'/playlist.m3u8';
		//	if (!$this->remotefileexists($data['m3u8']))
		//		$data['m3u8']='';
			
			$data['duration']=intval($event['duration']/60);
			if ($event['startdate']=='0000-00-00 00:00:00')
			{
				$data['formatteddate'] = '';
				$data['formattedhour'] = '';
			} else {
				$formatteddate = DateTime::createFromFormat('Y-m-d H:i:s', $event['startdate']);
				$data['formatteddate'] = $formatteddate->format('d-m-Y');
				$data['formattedhour'] = $formatteddate->format('H:i');
			}			

			$data['poster'] = $event['poster'];			
			$data['picture'] = $channel_data['picture'];
			$data['title'] = $event['title'];
			$data['description'] = $event['description'];
			$data['eventidhash'] = $event['eventidhash'];
			$data['paid'] = $event['paid'];
			$data['nbevents'] = $channel_data['nbevents'];
			$data['active'] = $channel_data['active'];
			$data['show_paymentmodal']=$this->session->flashdata('payment')==='success';
			$data['fb']=false;


			if ($event['timebeforebegin']<=0 && $event['timebeforeend']>0)// && $this->remotefileexists($data[0]['m3u8']))
				$data['status']='onair';
			else if ($event['startdate']=='0000-00-00 00:00:00')
				$data['status']='upcoming';
			else if ($event['timebeforeend']<=0) {
				$data['status']='finished';
				$data['url']='https://s3-eu-west-1.amazonaws.com/lmal-recordings/'.preg_replace('/[^\w-]/', '', $event['title'].'_'.$event['eventidhash']).'.mp4';
				if (!$this->remotefileexists($data['url']))
					$data['url']='';
			} else
				$data['status']='upcoming';

			if ($embed=='embed') {  //TODO virer embed2, écraser embed
				if ($format=='fb') {
					$data['width']=640;
					$data['height']=360;
					$data['poster']=base_url('assets/images/offline.png');
					$data['rtmp']='rtmp://push.lmal.tv/pub/'.$channel;
					$data['m3u8']='http://hls.lmal.tv/live/'.$channel.'/index.m3u8';

					$data['fb']=true;
					$this->load->view('embed2',$data);
				} else {

					if ($format=='') {
						$data['width']=1024;
						$data['height']=576;
					} else if ($format=='large_169') {
						$data['width']=853;
						$data['height']=480;
					} else if ($format=='medium_169') {
						$data['width']=640;
	//					$data['height']=360;
	//					$data['width']=480;
						$data['height']=360;
					} else if ($format=='small_169') {
						$data['width']=480;
						$data['height']=270;
					} else if ($format=='xlarge_43') {
						$data['width']=768;
						$data['height']=576;
					} else if ($format=='large_43') {
						$data['width']=640;
						$data['height']=480;
					} else if ($format=='medium_43') {
						$data['width']=480;
						$data['height']=360;
					}		
					$this->load->view('embed',$data);
				}
			} else if ($embed=='embed2') {
				$data['poster']=base_url('assets/images/offline.png');
				$data['rtmp']='rtmp://push.lmal.tv/pub/'.$channel;
				$data['m3u8']='http://hls.lmal.tv/live/'.$channel.'/index.m3u8';
				
				if ($format=='fb') {
					$data['width']=640;
					$data['height']=360;
					$data['poster']=base_url('assets/images/offline.png');
					$data['rtmp']='rtmp://push.lmal.tv/pub/'.$channel;
					$data['m3u8']='http://hls.lmal.tv/live/'.$channel.'/index.m3u8';

					$data['fb']=true;
					$this->load->view('embed2',$data);
				} else {
					if ($format=='') {
						$data['width']=1024;
						$data['height']=576;
					} else if ($format=='large') {
						$data['width']=853;
						$data['height']=480;
					} else if ($format=='medium') {
						$data['width']=640;
						$data['height']=360;
					} else if ($format=='small') {
						$data['width']=480;
						$data['height']=270;
					}
					
					if ($channel_data['price']>0)
						$this->load->view('embedpay',$data);
					else
						$this->load->view('embed2',$data);
				}
			} else if ($this->session->userdata('userid')==$channel_data['userid']) {
				$data['streamkey']=$channel_data['streamkey'];
				if ($this->session->flashdata('welcome')=='yes')
					$data['show_welcomemodal']=true;
				else
					$data['show_welcomemodal']=false;
					
				$data['archives'] = $this->User_model->get_channel_archives($channel);

				$this->load->view('admin',$data);					
			} else
				$this->load->view('channel',$data);
		}
	}*/
	
	public function newevent($channel)
	{
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('User_model');
		$this->load->model('Event_model');
		
		$channel_data = $this->User_model->get_channel($channel);
		if (!isset($channel_data['userid']))
			show_404();
		else {
			if ($this->session->userdata('userid')!=$channel_data['userid'])
				exit('Error, please log in');
			
			$this->Event_model->createevent($channel,$channel_data['userid'],'','','0','0', 1);
			redirect(base_url($channel));
		}
	}

	public function deleteevent($eventidhash='')
	{
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('User_model');
		$this->load->model('Event_model');
		
		$event = $this->Event_model->get_event($eventidhash);
		if (isset($event))
		{
			if ($this->session->userdata('userid')!=$event['userid'])
				exit('Error, please log in');

			$this->Event_model->deleteevent($eventidhash);
			$user=$this->User_model->get_user($event['userid']);
			redirect(base_url($user['channel']));
		}
	}

	public function deleteeventid($eventid='')
	{
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('Event_model');
		
		$event = $this->Event_model->get_event_fromid($eventid);
		if (isset($event))
		{
			if ($this->session->userdata('userid')!=$event['userid'])
				exit('Error, please log in');

			$this->Event_model->deleteeventid($eventid);
			redirect(base_url('app'));
		}
	}
	
	public function stop($channel='')
	{
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('User_model');
		$this->load->model('Event_model');
		
		$channel_data = $this->User_model->get_channel($channel);
		if (!isset($channel_data['userid']))
			show_404();
		else {
			$event = $this->Event_model->get_last_event($channel_data['userid']);
		
			if (isset($event))
			{
				if ($this->session->userdata('userid')!=$channel_data['userid'])
					exit('Error, please log in');
	
				$this->Event_model->stopevent($event['eventidhash']);
				$user=$this->User_model->get_user($channel_data['userid']);
				redirect(base_url($user['channel']));
			}
		}
	}

	public function start($channel='')
	{
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('User_model');
		$this->load->model('Event_model');
		
		$channel_data = $this->User_model->get_channel($channel);
		if (!isset($channel_data['userid']))
			show_404();
		else {
			$event = $this->Event_model->get_last_event($channel_data['userid']);
		
			if (isset($event))
			{
				if ($this->session->userdata('userid')!=$channel_data['userid'])
					exit('Error, please log in');
	
				$this->Event_model->startevent($event['eventidhash']);
				$user=$this->User_model->get_user($channel_data['userid']);
				redirect(base_url($user['channel']));
			}
		}
	}

	//$route['(:any)/delete/(:any)'] = 'channel/deleteevent/$1/$2';
}

/* End of file channel.php */
/* Location: ./application/controllers/channel.php */