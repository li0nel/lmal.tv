<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pay extends CI_Controller {

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
	public function index($channel='',$eventidhash='',$json='')
	{
		$this->load->helper('url');
		$this->load->model('Event_model');
		$this->load->model('User_model');
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->library('session');

		$event=$this->Event_model->get_event($eventidhash);
		if (isset($event))
		{
			if ($this->session->userdata('userid')!=$event['userid'])
				exit('Please log in');
					
			$this->form_validation->set_rules('card-number', 'card-number', 'required');
			$this->form_validation->set_rules('card-expiry-month', 'card-expiry-month', 'required');
			$this->form_validation->set_rules('card-expiry-year', 'card-expiry-year', 'required');
			$this->form_validation->set_rules('card-cvc', 'card-cvc', 'required');

			if($this->form_validation->run() == FALSE) {
				$event['amount']=intval($event['duration']/60)*340;

				$formatteddate = DateTime::createFromFormat('Y-m-d H:i:s', $event['startdate']);
				$event['date'] = $formatteddate->format('d-m-Y');
				$event['time'] = $formatteddate->format('H:i');

				$event['duration'] = intval($event['duration']/60);
	
				if ($json=='json')
					$this->output->set_output(json_encode($event));
				else
					; //redirect to responsive payment page here, for small screens
			} else {
				$card_number=$this->input->post('card-number');
				$card_expiry_month=$this->input->post('card-expiry-month');
				$card_expiry_year=$this->input->post('card-expiry-year');
				$card_cvc=$this->input->post('card-cvc');
				
				//process payment
				
				$this->Event_model->unlockevent($eventidhash);
				
				$this->session->set_flashdata('payment','success');
				echo 'success';
			}
		}
	}

	public function buyticket($channel='',$eventidhash='',$json=0)
	{
		$this->load->helper('url');
		$this->load->model('Event_model');
		$this->load->model('User_model');
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->library('session');

		$event=$this->Event_model->get_event($eventidhash);
		if (isset($event))
		{
			$this->form_validation->set_rules('test', 'test', 'required');
	
			if($this->form_validation->run() == FALSE) {
				$event['amount']=10; //get price here

				$formatteddate = DateTime::createFromFormat('Y-m-d H:i:s', $event['startdate']);
				$event['date'] = $formatteddate->format('d-m-Y');
				$event['time'] = $formatteddate->format('H:i');

				$event['duration'] = intval($event['duration']/60);
	
				if ($json==1)
					$this->output->set_output(json_encode($event));
				else
					; //redirect to responsive payment page here, for small screens
			} else {
//				$this->Customer_model->buyticket($eventidhash);
				redirect(base_url($channel));
			}
		}
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */