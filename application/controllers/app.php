<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class App extends CI_Controller {

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
	public function index()
	{
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('User_model');

		$this->form_validation->set_rules('email', 'email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'mot de passe', 'required|md5');
		$this->form_validation->set_error_delimiters('<span style="color:#D44012;float:right">', '</span>');
		$this->form_validation->set_message('required', '%s requis');
		$this->form_validation->set_message('valid_email', '%s invalide');
		
		$data['showlogin']=$this->input->post('email') || $this->input->post('password');

		if($this->form_validation->run() == FALSE) {
			$data['wrong']='';
		}else {
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$userid = $this->User_model->login_user($email,$password);
			if (isset($userid[0])) {
				$this->session->set_userdata(array('email'=>$email,'userid'=>$userid[0]->userid,'channel'=>$userid[0]->channel));
				//redirect(base_url($userid[0]->channel));
				$data['wrong']='';
				$data['showlogin']=false;
			} else {
				if ($this->User_model->does_user_exist($email))
					$data['wrong']='password';
		        else
					$data['wrong']='email';
			}
		}
		
		$data['channel']=$this->session->userdata('channel');
		if ($data['channel']!='') {
			$channel_data = $this->User_model->get_channel($data['channel']);
			$data['streamkey']=$channel_data['streamkey'];
		
			$data['nextevent_date']=$channel_data['nextevent_date'];
			$data['nextevent_time']=$channel_data['nextevent_time'];
			$data['nextevent_title']=$channel_data['nextevent_title'];
		} else {
			$data['nextevent_date']='';
			$data['nextevent_time']='';
			$data['nextevent_title']='';			
		}
		
/*		$array=array();
		$sample=array();
		$sample['id']=1;
		$sample['date']='2013-08-30';
		$sample['duration']='32 minutes';
		$sample['url']='url';
		array_push($array, $sample);
		array_push($array, $sample);
		array_push($array, $sample);
		array_push($array, $sample);*/
		$data['archives']=$this->User_model->get_channel_archives($data['channel']);

		$this->load->view('app',$data);
	}
}

/* End of file app.php */
/* Location: ./application/controllers/welcome.php */