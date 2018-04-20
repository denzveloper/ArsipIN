<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Generate extends CI_Controller {
    public function __construct(){
        parent::__construct();
        //load library validasi
        $this->load->library('form_validation');
        //load model admin
        $this->load->model('admin');
        //load model kodegen
        $this->load->model('kodegen');
        //load model pagination
        $this->load->library('pagination');
    }
	public function index(){
		if($this->admin->chksess()){
			//jika login maka bisa masuk
			if($this->session->userdata("level") == 0){
				//jika level user 0 kesini
			    $data['posts'] = $this->kodegen->getdataall(); //cari daftar

				$something = $this->input->post('btn-gen');
				if(isset($something)){
					$this->form_validation->set_rules('jumlah', 'Banyaknya Kode', 'required|is_natural_no_zero|greater_than[0]|less_than[17]');
					$this->form_validation->set_message('required', '<div class="alert alert-warning" style="margin-top: 3px"><div class="header"><b><i class="fas fa-exclamation-triangle"></i> {field}</b> harus diisi!</div></div>');
					if ($this->form_validation->run() == TRUE) {
						//Jadi gak generate disini.
						$jumlah = $this->input->post("jumlah", TRUE);
						$checking = $this->kodegen->generate($jumlah);
							if ($checking != FALSE) {
								$data['error'] = '<div class="alert alert-success" style="margin-top: 3px"><div class="header"><b><i class="fa fa-check-circle"></i> Sukses</b> Kode telah ditambah!<br><i>Silahkan muat ulang halaman</i></div></div>';
							}else{
								$data['error'] = '<div class="alert alert-danger" style="margin-top: 3px"><div class="header"><b><i class="fa fa-exclamation-circle"></i> ERROR</b> Terjadi Kegagalan Proses!</div></div>';
							}
					}else{
						//jika gagal kesini
						$data['error'] = '<div class="alert alert-danger" style="margin-top: 3px"><div class="header"><b><i class="fa fa-exclamation-circle"></i> ERROR</b> Terjadi Kegagalan Proses!</div></div>';
					}
   					$this->load->view("head");
   					$this->load->view('kodegen', $data);
				}else{
   					$this->load->view("head");
   					$this->load->view('kodegen', $data);
				}
			}else{
				//Jika Bukan Hak Akses
				$this->load->view("denied");
			}
		}else{
			//jika session belum terdaftar, maka redirect ke halaman login
			redirect("login");
		}
	}
}
