<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chart extends CI_Controller {
    function __construct(){
        parent::__construct();
        //load model usman
        $this->load->model('usman');
        //load model data I/O
        $this->load->model('dataio');
    }
    public function index(){
        if($this->usman->chksess()){
            if($this->session->userdata("level") == 0){
                $data['fin'] = $this->dataio->vica();
                $data['user'] = $this->dataio->getlistuser();
                $this->load->view("head");
                $this->load->view('login/data/chart', $data);
            }else{
                //Jika Bukan Hak Akses
                $this->load->view("errors/denied");
            }
        }else{
            //jika session belum terdaftar, maka redirect ke halaman login
            redirect("login");
        }
    }
}
