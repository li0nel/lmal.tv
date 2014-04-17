<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->helper('form');

		$this->form_validation->set_rules('email', 'email', 'required|valid_email');
		$this->form_validation->set_rules('message', 'message', 'required');
		$this->form_validation->set_error_delimiters('<span style="color:#D44012;float:right">', '</span>');
		$this->form_validation->set_message('required', '%s requis');
		$this->form_validation->set_message('valid_email', '%s invalide');

		//flags for contact form behavior		
		$data['contact']=$this->input->post('email') || $this->input->post('message');
		$data['ty']=false;
		
		if($this->form_validation->run() == FALSE) {
		} else {
			$email=$this->input->post('email');				
			$message=$this->input->post('message');
			
			//Display thank you message
			$data['ty']=true;
			
			$this->load->library('email');
			$this->email->from($email, 'LMAL.TV');
			$this->email->to('contact@lmal.tv'); 
			$this->email->subject('Message depuis page d\'accueil de LMAL.TV');//'Reset your LMAL.TV password');
			$this->email->message($message); 
			$this->email->send();
		}
		$this->load->view('home',$data);
	}
	
	public function terms()
	{
		$this->load->helper('url');
		$this->load->view('terms');
	}

	public function pricing()
	{
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->helper('form');

		$this->load->view('pricing');
	}

	public function faq()
	{
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->helper('form');

		$this->load->view('faq');
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */