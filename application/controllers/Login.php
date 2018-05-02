<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    public function __construct(){
        parent::__construct();
        //load library form validasi
        $this->load->library('form_validation');
        //load model usman
        $this->load->model('usman');
        //load library enkripsi password
        $this->load->library('safe');
        //useragent
        $this->load->library('user_agent');
    }

	public function index(){
        if ($this->agent->browser() == 'Internet Explorer'){
            redirect("my404/blocked");
        }
		if($this->usman->chksess()){
			//jika memang session sudah terdaftar, maka dialihkan ke halaman dahsboard
			redirect("dashboard");
		}else{
			//set form validation
            $this->form_validation->set_rules('username', 'Nama Pengguna', 'required|max_length[24]|alpha_numeric');
            $this->form_validation->set_rules('password', 'Kata Sandi', 'required|max_length[150]');
            //set message form validation
            $this->form_validation->set_message('required', '<div class="alert alert-danger" style="margin-top: 3px"><div class="header"><b><i class="fa fa-exclamation-circle"></i> {field}</b> harus diisi!</div></div>');
            //cek validasi
			if ($this->form_validation->run() == TRUE){
    			//get data dari FORM
                $uname = $this->safe->inject($this->input->post("username", TRUE));
                $ps = $this->safe->convert($this->safe->inject($this->input->post("password", TRUE)),$uname);
                //checking data via model
                $cek = $this->usman->chklog(array('username' => $uname), array('password' => $ps));
                //jika ditemukan, maka create session
    	        if ($cek != FALSE){
                    $date = date("Y-m-d H:i:s");
                    $this->usman->lastlog(array('username' => $uname, 'password' => $ps), array('lastlog' => $date));
        	        foreach ($cek as $hit){
            	        $sesar = array(
                            'uname' => $hit->username,
                            'upass' => $hit->password,
                            'jabat' => $hit->jabatan,
                            'who' => $hit->place,
                        	'namaus' => $hit->nama_user,
                            'tlpus' => $hit->phone,
                            'level' => $hit->level,
                            'edit' => $hit->lastedit
                     	);
                      	//set session userdata
                       	$this->session->set_userdata($sesar);
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