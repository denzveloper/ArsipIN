<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
    public function __construct(){
        parent::__construct();
        //load library form validasi
        $this->load->library('form_validation');
        //load model admin
        $this->load->model('admin');
        //load model register
        $this->load->model('regist');
        //load library enkripsi password
        $this->load->library('safe');
    }
	public function index(){
		if($this->admin->logged_id()){
				//jika memang session sudah terdaftar, maka redirect ke halaman dahsboard
				redirect("dashboard");
		}else{
			//jika session belum terdaftar
			//set form validation
	        $this->form_validation->set_rules('username', 'Nama Pengguna', 'required|max_length[10]');
	        $this->form_validation->set_rules('realname', 'Nama Anda', 'required|max_length[150]');
	        $this->form_validation->set_rules('phone', 'No Telepon', 'required|integer|max_length[18]|min_length[3]');
	        $this->form_validation->set_rules('password', 'Kata Sandi', 'required|max_length[150]|min_length[3]');
	        $this->form_validation->set_rules('kode', 'Kode Verifikasi', 'required|max_length[7]');

	        //set message form validation
	        $this->form_validation->set_message('required', '<div class="alert alert-danger" style="margin-top: 3px"><div class="header"><b><i class="fa fa-exclamation-circle"></i> {field}</b> harus diisi!</div></div>');

	        //cek validasi
			if ($this->form_validation->run() == TRUE) {
				//get data dari FORM
	            $username = $this->safe->inject($this->input->post("username", TRUE));
	            $realname = ucwords(strtolower($this->safe->inject($this->input->post("realname", TRUE))));
	            $phone = $this->safe->inject($this->input->post("phone", TRUE));
	            $password = $this->safe->convert($this->input->post("password", TRUE),$username);
	            $kode = strtoupper($this->safe->inject($this->input->post("kode", TRUE)));
	            
	            //checking kode verifikasi via model
	            $kodcek = $this->regist->checking('tbl_kode', array('kodever' => $kode));
	            //checking data via model
	            $checking = $this->regist->checking('tbl_users', array('username' => $username));

	            //jika tidak bentrok usernya maka lanjut
	            if ($checking == FALSE && $kodcek != FALSE) {
	            	if($this->input->post('secutity_code') == $this->session->userdata('mycaptcha')){
	            		$buatdata = $this->regist->create_user('tbl_users', array('username' => $username, 'nama_user' => $realname, 'password' => $password, 'phone' => $phone, 'level' => 1));
	            		//jika buat data berhasil ke laman login
	            		if ($buatdata == TRUE){
	            			$this->regist->delete_num('tbl_kode',  $kode);
	                		$data['error'] = '<div class="alert alert-info" style="margin-top: 3px">
	                		<div class="header"><b><i class="fa fa-exclamation-circle"></i> DONE</b> Registrasi pengguna berhasil!</br><i>Silahkan Anda Login..</i></div></div>';
	            			$this->load->view('login', $data);
	                	}
	                	else{
	                		$data['error'] = '<div class="alert alert-danger" style="margin-top: 3px">
	                		<div class="header"><b><i class="fa fa-exclamation-circle"></i> ERROR</b> Gagal Membuat Pengguna!</br></div></div>';
	            			$this->load->view('register', $data);
	                	}
	                }
	            }else{
	            	$data['error'] = '<div class="alert alert-danger" style="margin-top: 3px">
	                	<div class="header"><b><i class="fa fa-exclamation-circle"></i> ERROR</b> Gagal Regristasi Pengguna!</div></div>';
	            	$this->load->view('register', $data);
	            }
	        }else{
	            $this->load->view('register');
	        }

		}

	}
}
