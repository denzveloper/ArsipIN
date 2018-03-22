<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller {

    public function __construct(){
        parent::__construct();
        //load library form validasi
        $this->load->library('form_validation');
        //load model admin
        $this->load->model('admin');
        //load library enkripsi password
        $this->load->library('safe');
    }
	public function index(){
		if($this->admin->logged_id()){
			$this->load->view("data");
			//set form validation
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            //set message form validation
            $this->form_validation->set_message('required', '<div class="alert alert-danger" style="margin-top: 3px"><div class="header"><b><i class="fa fa-exclamation-circle"></i> {field}</b> harus diisi</div></div>');
            //cek validasi
			if ($this->form_validation->run() == TRUE){
			//get data dari FORM
            $username = $this->safe->inject($this->input->post("username", TRUE));
            $password = $this->safe->convert($this->input->post("password", TRUE),$username);
            //checking data via model
            $checking = $this->admin->check_login('tbl_users', array('username' => $username), array('password' => $password));
            //jika ditemukan, maka create session
	            if ($checking != FALSE){
	                    redirect('data/');
            	}else{
            		$data['error'] = '<div class="alert alert-danger" style="margin-top: 3px"><div class="header"><b><i class="fa fa-exclamation-circle"></i> ERROR</b> Nama Pengguna atau Kata Sandi salah!</div></div>';
            		$this->load->view('data', $data);
            	}
	    	}else{
	    		$data['error'] = '<div class="alert alert-danger" style="margin-top: 3px"><div class="header"><b><i class="fa fa-exclamation-circle"></i> ERROR</b> Data gagal dikirim!</div></div>';
	        	$this->load->view('data');
	    	}
		}else{
			//jika session belum terdaftar, maka redirect ke halaman login
			redirect("login");
		}
	}
}
