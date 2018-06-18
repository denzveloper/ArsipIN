<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tentang extends CI_Controller {
	public function __construct(){
        parent::__construct();
        //load model usman
        $this->load->model('usman');
    }

	public function index(){
		if($this->usman->chksess()){
			$this->load->view("tentang");
		}else{
			$this->output->set_status_header('404'); 
	    	$this->load->view('errors/err404');
		}
	}

	public function kita(){
		$this->load->view("tentang");
	}
}
