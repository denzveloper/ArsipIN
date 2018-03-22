<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
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
			//jika memang session sudah terdaftar, maka dialihkan ke halaman dahsboard
			redirect("dashboard");
		}else{
			//set form validation
            $this->form_validation->set_rules('username', 'Nama Pengguna', 'required');
            $this->form_validation->set_rules('password', 'Kata Sandi', 'required');
            //set message form validation
            $this->form_validation->set_message('required', '<div class="alert alert-danger" style="margin-top: 3px"><div class="header"><b><i class="fa fa-exclamation-circle"></i> {field}</b> harus diisi!</div></div>');
            //cek validasi
			if ($this->form_validation->run() == TRUE){
			//get data dari FORM
            $username = $this->safe->inject($this->input->post("username", TRUE));
            $password = $this->safe->convert($this->input->post("password", TRUE),$username);
            //checking data via model
            $checking = $this->admin->check_login('tbl_users', array('username' => $username), array('password' => $password));
            //jika ditemukan, maka create session
	            if ($checking != FALSE){
    	            foreach ($checking as $apps){
        	            $session_data = array(
            	            'user_name' => $apps->username,
                	        'user_pass' => $apps->password,
                    	    'user_nama' => $apps->nama_user,
                            'user_phone' => $apps->phone,
                            'level' => $apps->level
                   	);
                    	//set session userdata
                    	$this->session->set_userdata($session_data);
	                    redirect('dashboard/');
                	}
            	}else{
            		$data['error'] = '<div class="alert alert-danger" style="margin-top: 3px"><div class="header"><b><i class="fa fa-exclamation-circle"></i> ERROR</b> Nama Pengguna atau Kata Sandi salah!</div></div>';
            		$this->load->view('login', $data);
            	}
	    	}else{
	        	$this->load->view('login');
	    	}
		}
	}
}