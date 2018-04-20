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
		if($this->admin->chksess()){
            //get user details
            $data['user_data'] = $this->userman->detailus($this->session->userdata('user_name'));
            $upd = $this->input->post('btn-update');
            if(isset($upd)){
                //Button hidup kesini
                //Validasi Data
                $this->form_validation->set_rules('realname', 'Nama Anda', 'required|max_length[150]|min_length[3]');
                $this->form_validation->set_rules('phone', 'Nomor Telepon', 'required|integer|max_length[18]|min_length[3]');
                if($this->session->userdata("level") == 1){
                    $this->form_validation->set_rules('jabat', 'Jabatan Anda', 'required|max_length[32]|min_length[3]');
                    $this->form_validation->set_rules('whois', 'Nama Lembaga/Desa', 'required|max_length[18]|min_length[3]');
                }
                $this->form_validation->set_rules('password', 'Password', 'required|max_length[150]|min_length[3]');
                //set message form validation
                $this->form_validation->set_message('required', '<div class="alert alert-warning" style="margin-top: 3px"><div class="header"><b><i class="fas fa-exclamation-triangle"></i> {field}</b> harus diisi!</div></div>');
                if($this->form_validation->run() == TRUE){
                    //Get Username
                    $username = $this->session->userdata('user_name');
                    //get data dari FORM
                    $realname = ucwords(strtolower($this->safe->inject($this->input->post("realname", TRUE))));
                    $jabat = ucwords(strtolower($this->safe->inject($this->input->post("jabat", TRUE))));
                    $whois = strtoupper($this->safe->inject($this->input->post("whois", TRUE)));
                    $phone = $this->safe->inject($this->input->post("phone", TRUE));
                    $password = $this->safe->convert($this->safe->inject($this->input->post("password", TRUE)),$username);
                    //Date insert
                    $date = date("Y-m-d H:i:s");
                    //checking data via model
                    $checking = $this->userman->update_data(array('username' => $username), array('nama_user' => $realname, 'jabatan'=>$jabat, 'place' => $whois, 'password' => $password, 'phone' => $phone, 'lastedit' => $date ));
                    //Mengecek apa Berjalan dengan mulus
                    if ($checking != FALSE){
                        //Perintah OK
                        $this->admin->logout();
                        $data['error'] = '<div class="alert alert-success" style="margin-top: 3px"><div class="header"><b><i class="fa fa-check-circle"></i> Sukses</b> User telah diperbarui!<br><i>Silahkan Login Kembali</i></div></div>';
                        $this->load->view('login', $data);
                    }else{
                        $data['error'] = '<div class="alert alert-danger" style="margin-top: 3px"><div class="header"><b><i class="fa fa-exclamation-circle"></i> ERROR</b> Data Tidak dapat diubah!</div></div>';
                        $this->load->view("head");
                        $this->load->view('edituser',$data);
                    }
                }else{
                    $data['error'] = '<div class="alert alert-danger" style="margin-top: 3px"><div class="header"><b><i class="fa fa-exclamation-circle"></i> ERROR</b> Gagal Memperbarui!<br><sup>Untuk tindakan lebih lanjut. Silahkan Lihat keterangan didekat form isian!</sup></div></div>';
                    $this->load->view("head");
                    $this->load->view('edituser',$data);
                }
            }else{
            $this->load->view("head");
            $this->load->view('edituser',$data);
            }
		}else{
			//jika session belum terdaftar, maka redirect ke halaman login
			redirect("login");
		}
	}

}
