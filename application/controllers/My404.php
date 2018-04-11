<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My404 extends CI_Controller {
	public function __construct(){
    	parent::__construct();
    	//load user agent
    	$this->load->library('user_agent');
	} 
	public function index(){ 
	    $this->output->set_status_header('404'); 
	    $this->load->view('err404');//loading in custom error view
 	}
	public function blocked(){
		//checking again when not using IE
 		if ($this->agent->browser() != 'Internet Explorer'){
        	redirect("login");
    	}
 		$this->output->set_status_header('404'); 
    	$this->load->view('broden');
	}
} 