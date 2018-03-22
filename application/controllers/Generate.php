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
        $this->load->library("pagination");
    }
	public function index(){
		if($this->admin->logged_id()){
			if($this->session->userdata("level") == 0){
				/*
				$config = array();
			    $config["base_url"] = base_url("index.php/generate/");
			    $config["total_rows"] = $this->kodegen->record_count();
			    $config["per_page"] = 5;		 
			    $config["uri_segment"] = 3;
			    $this->pagination->initialize($config);
			    $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			    $data["results"] = $this->kodegen->fetchdata($config["per_page"], $page);
			    $data["links"] = $this->pagination->create_links();
			    */
			    $this->data['posts'] = $this->kodegen->getdata(); //cari daftar

				$something = $this->input->post('btn-gen');
				if(isset($something)){
					$this->form_validation->set_rules('jumlah', 'Banyaknya Kode', 'required|is_natural_no_zero|greater_than[0]|less_than[16]');
					$this->form_validation->set_message('required', '<div class="alert alert-danger" style="margin-top: 3px"><div class="header"><b><i class="fa fa-exclamation-circle"></i> {field}</b> harus diisi!</div></div>');
					$this->form_validation->set_message('is_unique', 'The %s is already taken');
					if ($this->form_validation->run() == TRUE) {
						$jumlah = $this->input->post("jumlah", TRUE);
						$checking = $this->kodegen->generate('tbl_kode', $jumlah);
					}else{
						$data['error'] = '<div class="alert alert-danger" style="margin-top: 3px"><div class="header"><b><i class="fa fa-exclamation-circle"></i> ERROR</b> Terjadi Kegagalan Proses!</div></div>';
					}
   					//$this->load->view('kodegen', $data);
   					$this->load->view('kodegen', $this->data);
				}else{
   					//$this->load->view('kodegen', $data);
   					$this->load->view('kodegen', $this->data);
				}
			}else{
				//Jika Bukan Hak Akses ke Dahboard
				redirect("dashboard");
			}
		}else{
			//jika session belum terdaftar, maka redirect ke halaman login
			redirect("login");
		}
	}
}
