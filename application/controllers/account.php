<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/account
	 *	- or -  
	 * 		http://example.com/index.php/account/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/account/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function login()
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
		
		if($this->form_validation->run() == FALSE) {
			if ($this->session->flashdata('login')=='wrong password at login')
				$data['wrong']='password';
			else if ($this->session->flashdata('login')=='wrong email at login')
				$data['wrong']='email';
			else
				$data['wrong']='';
				
			$this->load->view('login',$data);
		}else {
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$userid = $this->User_model->login_user($email,$password);
			if (isset($userid[0])) {
				$this->session->set_userdata(array('email'=>$email,'userid'=>$userid[0]->userid,'channel'=>$userid[0]->channel));
				//redirect(base_url($userid[0]->channel));
				$this->session->set_flashdata('login', '');
				redirect(base_url('app'));
			} else {
				if ($this->User_model->does_user_exist($email))
		            $this->session->set_flashdata('login', 'wrong password at login');
		        else
		            $this->session->set_flashdata('login', 'wrong email at login');  
				redirect(base_url('app'));//redirect(base_url('login'));
			}
		}	
	}
	
	public function signup()
	{
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('User_model');
		$this->load->model('Event_model');

		$this->form_validation->set_rules('channel', ' ', 'trim|alpha_numeric|required|is_unique[users.channel]');	
		$this->form_validation->set_message('alpha_numeric', 'entrez des caractères alphanumériques (sans espace)');		
		$this->form_validation->set_message('required', '%s requis');
		$this->form_validation->set_message('is_unique', 'ce nom de compte existe déjà');
		$this->form_validation->set_error_delimiters('<span style="color:#D44012;font-size: 16px;font-weight: 400;margin-top: -25px;margin-left: 100px;float: left;">', '</span>');

		if($this->form_validation->run() == FALSE) {
			$this->load->view('signup');
		}else {
			$channel = $this->input->post('channel');

			$userid=$this->User_model->create_user('visitor','',$channel);
			$this->Event_model->createevent($channel,$userid,'','','0','0', 1);
			
			$this->session->set_userdata(array('email'=>'visitor','userid'=>$userid));

			redirect(base_url($channel.'/welcome'));
		}
	}
	
	function alpha_dash_space($str)
{
	$str = str_replace(" ", "", $str);
    return ( ! preg_match("/^([-a-z_ ])+$/i", $str)) ? FALSE : $str;
} 


	public function getkey()
	{
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('User_model');
		$this->load->model('Event_model');

		$this->form_validation->set_rules('channel', 'nom', 'trim|callback_alpha_dash_space|required|is_unique[users.channel]');		
		$this->form_validation->set_rules('email', 'email', 'required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'mot de passe', 'required|md5');
		$this->form_validation->set_message('valid_email', '%s invalide');
		$this->form_validation->set_message('alpha_numeric', 'entrez des caractères alphanumériques (sans espace)');		
		$this->form_validation->set_message('required', '%s requis');
		$this->form_validation->set_message('is_unique', 'ce %s existe déjà');
		$this->form_validation->set_error_delimiters('<span style="color:#D44012;float:right">', '</span>');

		if($this->form_validation->run() == FALSE) {
			$this->load->view('getkey');
		}else {
			$channel = $this->input->post('channel');
			$email = $this->input->post('email');
			$password = $this->input->post('password');

			$userid=$this->User_model->create_user($email,$password,$channel,'1');
			
			$this->session->set_userdata(array('email'=>$email,'userid'=>$userid,'channel'=>$channel));

			redirect(base_url('app'));
		}
	}
	
	public function welcome($channel)
	{
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('User_model');

		$channelinfo = $this->User_model->get_channel($channel);
		if (!isset($channelinfo['userid']))
			show_404();
		else if ($channelinfo['userid']!=$this->session->userdata('userid'))
			redirect(base_url('login'));
		else if ($channelinfo['active']==1)
			redirect(base_url($channel));
		else {
			$this->form_validation->set_rules('email', 'email', 'required|valid_email|is_unique[users.email]');
			$this->form_validation->set_error_delimiters('<span style="color:#D44012;font-size: 16px;font-weight: 400;margin-top: -25px;float: left;">', '</span>');
			$this->form_validation->set_message('required', '%s requis');
			$this->form_validation->set_message('valid_email', '%s invalide');
			$this->form_validation->set_message('is_unique', 'cet email est déjà utilisé');


			if($this->form_validation->run() == FALSE) {
				$data['channel']=$channel;
				$this->load->view('welcome',$data);
			}else {
				$email = $this->input->post('email');
	
				$this->User_model->set_email($channel,$email);
				
				$this->session->set_flashdata('welcome','yes');
				redirect(base_url($channel));
			}		
		}
	}
	
	public function activate($channel,$token) //+ forgotpw
	{
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('User_model');

		$channelinfo = $this->User_model->get_channel($channel);
		if (!isset($channelinfo['userid']))
			show_404();
		else {			
			$data['channel']=$channel;
			$data['token']=$token;
			$data['result']='';
								
			$this->form_validation->set_rules('password', 'mot de passe', 'trim|required|min_length[6]|md5');
			$this->form_validation->set_rules('passwordconf', 'confirmation', 'trim|required|matches[password]|');
			$this->form_validation->set_message('required', '%s requis');
			$this->form_validation->set_message('matches', 'ne correspond pas');
			$this->form_validation->set_message('min_length', '%s trop court (<6 caract.)');
			$this->form_validation->set_error_delimiters('<span style="color:#D44012;float:right">', '</span>');

			if($this->form_validation->run() == FALSE) {
			}else {
				$password = $this->input->post('password');	
				
				//if ($this->User_model->activate_channel($channel,$token,$password))
				//{
					$this->User_model->activate_channel($channel,$token,$password); //return false if password is updated with the same one
					$data['result']='success';
					$this->session->set_userdata(array('userid'=>$channelinfo['userid'],'channel'=>$channel));
					$this->session->set_flashdata('welcome','yes');
//				} else {
//					$data['result']='error';
//				}
			}

			$this->load->view('activate',$data);
		}
	}
	
	public function forgotpwd()
	{
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('User_model');
								
		$this->form_validation->set_rules('email', 'email', 'required|valid_email');
		$this->form_validation->set_error_delimiters('<span style="color:#D44012;font-size: 16px;font-weight: 400;margin-top: -25px;margin-left: 2px;float: left;">', '</span>');
		$this->form_validation->set_message('required', '%s requis');
		$this->form_validation->set_message('valid_email', '%s invalide');

		$data['status']='';
		$data['wrong']='';
		
		if($this->form_validation->run() == FALSE) {
		}else {
			$email = $this->input->post('email');

			if (!$this->User_model->forgotpwd($email))
				$data['wrong']='email';
			else
				$data['wrong']='ok';
		}
		$this->load->view('forgotpwd',$data);
	}

	public function logout()
	{
		$this->load->helper('url');
		$this->load->library('session');
		$channel=$this->session->userdata('channel');
		$this->session->sess_destroy();
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
		redirect(base_url('app'));//redirect(base_url($channel));
	}

}

/* End of file account.php */
/* Location: ./application/controllers/account.php */