<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fbapp extends CI_Controller {
	function __construct() {
		parent::__construct();
		       
        $this->load->library('facebook', array(
        	'appId'  => '539471056115540',
        	'secret' => '1c1dfc2de361d0e3c9e6ae1cdab5f921'
        ));
        
        //parse_str($_SERVER['QUERY_STRING'], $_REQUEST);
        
    	$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('User_model');
	}
    
    function return_tab() {
	    if($this->session->userdata('userid') == NULL) redirect(base_url('login'));
	    else $user_lmal = $this->User_model->get_user($this->session->userdata('userid'));

	    if(!empty($_GET['tabs_added'])) {
		    $tabs_ids =  array_keys($_GET['tabs_added']);
		    $comma_separated_ids = implode(",", $tabs_ids);
		    
		    $this->User_model->set_fbpage($this->session->userdata('userid'),$tabs_ids[0]);
		} else {
		}
		redirect(base_url('app'));
    }
    
    function tab() {
		$signed_request = $this->facebook->getSignedRequest();
		if( $page = $signed_request['page'] ) {
		   $channel=$this->User_model->get_channel_from_fbpageid($page['id']);
		   if($channel==false)
		   		exit('Veuillez réinstaller l\'app LMAL sur cette page.');
		   else
		   		redirect(base_url($channel['channel'].'/embed'));	
		}
    }
}