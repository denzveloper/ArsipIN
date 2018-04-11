<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Uman extends CI_Controller {
    public function __construct(){
        parent::__construct();
        //load model admin
        $this->load->model('admin');
        //load model userman
        $this->load->model('userman');
        //load library safe
        $this->load->library('safe');
        //load model pagination
        $this->load->library('pagination');
    }
    public function index(){
        if($this->admin->logged_id()){
            //if login user can visits
            if($this->session->userdata("level") == 0){
                //if level user is 0 you can processed
                //fetching data
                $data['user_data'] = $this->userman->fetchdata();
                //load header
                $this->load->view("head");
                //load content page
                $this->load->view('userman', $data);
            }else{
                //Jika Bukan haknya kesini(Tampil error)
                $this->load->view("denied");
            }
        }else{
            //jika session belum terdaftar, maka redirect ke halaman login
            redirect("login");
        }
    }
    public function action(){
        if($this->admin->logged_id()){
            //if login user can visits
            if($this->session->userdata("level") == 0){
                //if level user is 0 you can processed
                $dlt = $this->input->get('delete');
                $rst = $this->input->get('reset');
                $adm = $this->input->get('admin');
                if(isset($dlt)){
                    //$username = $this->safe->convert($this->input->get("delete", TRUE),$this->session->userdata('user_name'));
                    $username = $this->safe->inject($this->safe->convert($this->input->get("delete", TRUE),$this->session->userdata("user_name")));
                    $checking = $this->userman->del_data(array('username' => $username));
                    if ($checking != FALSE){
                        //Perintah OK
                        redirect("uman");
                    }else{
                        //Perintah ERROR
                        $this->load->view("error");
                    }
                }elseif (isset($rst)) {
                    $username = $this->safe->convert($this->safe->inject($this->input->get("reset", TRUE)),$this->session->userdata("user_name"));
                    $password = $this->safe->inject($this->safe->convert($username, $username));
                    $checking = $this->userman->update_data(array('username' => $username), array('password' => $password));
                    if ($checking != FALSE){
                        //Perintah OK
                        redirect("uman");
                    }else{
                        //Perintah ERROR
                        $this->load->view("error");
                    }
                }elseif (isset($adm)) {
                    $username = $this->safe->inject($this->safe->convert($this->input->get("admin", TRUE),$this->session->userdata("user_name")));
                    $checking = $this->userman->update_data(array('username' => $username), array('level' => 0));
                    if ($checking != FALSE){
                        //Perintah OK
                        redirect("uman");
                    }else{
                        //Perintah ERROR
                        $this->load->view("error");
                    }
                }else{
                    //Jika bukan perintah keduanya maka tampil ini saja
                    redirect("uman");
                }
            }else{
                //Jika Bukan haknya kesini(Tampil error)
                $this->load->view("denied");
            }
        }else{
            //jika session belum terdaftar, maka redirect ke halaman login
            redirect("login");
        }
    }
}