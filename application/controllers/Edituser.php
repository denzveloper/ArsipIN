<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edituser extends CI_Controller {

    public function __construct(){
        parent::__construct();
        //load library form validasi
        $this->load->library('form_validation');
        //load model admin
        $this->load->model('admin');
        //load model admin
        $this->load->model('userman');
        //load model safe
        $this->load->library('safe');
    }

	public function index(){
		if($this->admin->logged_id()){
            //Jika Login maka ditampilkan
            //Button Hidup?
            //Ambil apakah Button Sudah Hidup
            $something = $this->input->post('btn-update');
			if(isset($something)){
                //Button hidup kesini
                //Validasi Data
                $this->form_validation->set_rules('realname', 'Nama Anda', 'required|max_length[150]|min_length[3]');
                $this->form_validation->set_rules('phone', 'Phone', 'required|integer|max_length[18]|min_length[3]');
                $this->form_validation->set_rules('password', 'Password', 'required|max_length[150]|min_length[3]');
                //set message form validation
                $this->form_validation->set_message('required', '<div class="alert alert-danger" style="margin-top: 3px"><div class="header"><b><i class="fa fa-exclamation-circle"></i> {field}</b> harus diisi!</div></div>');
                if($this->form_validation->run() == TRUE){
                    //Get Username
                    $username = $this->session->userdata('user_name');
    				//get data dari FORM
                	$realname = ucwords(strtolower($this->safe->inject($this->input->post("realname", TRUE))));
                	$phone = $this->safe->inject($this->input->post("phone", TRUE));
                	$password = $this->safe->convert($this->input->post("password", TRUE),$username);
        	        //checking data via model
            	    $checking = $this->userman->update_data('tbl_users', array('username' => $username), array('nama_user' => $realname, 'password' => $password, 'phone' => $phone));
                    //Mengecek apa Berjalan dengan mulus
    		        if ($checking != FALSE){
                            //Perintah OK
    		        		$this->session->sess_destroy();
    	    	            $data['error'] = '<div class="alert alert-success" style="margin-top: 3px"><div class="header"><b><i class="fa fa-exclamation-circle"></i> Sukses</b> User telah diperbarui!<br><i>Silahkan Login Kembali</i></div></div>';
                			$this->load->view('login', $data);
                	}else{
                        //Perintah ERR
                		$data['error'] = '<div class="alert alert-danger" style="margin-top: 3px"><div class="header"><b><i class="fa fa-exclamation-circle"></i> ERROR</b> Data Tidak dapat diubah!</div></div>';
                		$this->load->view('edituser', $data);
    				}
                }else{
                $data['error'] = '<div class="alert alert-danger" style="margin-top: 3px"><div class="header"><b><i class="fa fa-exclamation-circle"></i> ERROR</b> Gagal Memperbarui!</div></div>';
                $this->load->view('edituser');
                }
            }else{
                $this->load->view('edituser');
                }
		}else{
			//jika session belum terdaftar, maka redirect ke halaman login
			redirect("login");
		}
	}
}
