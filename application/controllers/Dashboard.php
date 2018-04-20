<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct(){
        parent::__construct();
        //load model admin
        $this->load->model('admin');
    }
	public function index(){
		if($this->admin->chksess()){
			//jika login kesini
			$this->load->view("head");
			//load header html
			$this->load->view("dashboard");
			//load dahboard menu
		}else{
			//jika session belum terdaftar, maka redirect ke halaman login
			redirect("login");
		}
	}
	public function logout(){
		//call logout function
		$this->admin->logout();
		redirect('login');
	}
}
