<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller {

    public function __construct(){
        parent::__construct();
        //load model usman
        $this->load->model('usman');
        //load model dataman
        $this->load->model('dataio');
        //load library safe
        $this->load->library('safe');
    }

    public function index(){
        if($this->usman->chksess()){
            //if login you can visits
            if($this->session->userdata("level") == 1){
                //if level is 1 or Writer you are here
                $this->load->view("head");
                $this->load->view('datain');
            }elseif ($this->session->userdata("level") == 0) {
                //if level is 0 or ArsipAris you are here
                $data['list'] = $this->dataio->getlistuser();
                $data['new'] = $this->dataio->getnewdata();
                $this->load->view("head");
                $this->load->view('login/data/datashow',$data);
            }
            else{
                //Jika Bukan Hak Akses
                $this->load->view("errors/denied");
            }
        }else{
            //Not LoggedIn
            redirect("login");
        }
    }

    //Show recent and list data user send
    public function udata(){
        if ($this->session->userdata("level") == 0) {
            //$us = $this->input->get("usr", TRUE);
            //$data['list'] = $this->dataio->viewmin(array('username' => $us));
            $this->load->view("head");
            $this->load->view('login/data/listdatauser');
        }
    }

    //Show Data
    public function show(){
        if ($this->usman->chksess()) {
            if($this->session->userdata("level") == 0){
                //get require data
                $namae = $this->session->userdata('namaus');
                $by = $this->safe->inject($this->safe->convert($this->input->get("usr", TRUE),$namae));
                //$when = $this->safe->inject($this->safe->convert($this->input->get("dat", TRUE),$namae));
                //$by = $this->safe->inject($this->input->get("usr", TRUE));
                $when = $this->safe->inject($this->input->get("dat", TRUE));
                $data['doc'] = $this->dataio->viewdata(array('username' => $by, 'date' => $when));
                if ($data['doc']!=FALSE) {
                    $this->dataio->makejr(array('username' => $by, 'date' => $when));
                }
                $this->load->view("head");
                $this->load->view('login/data/show',$data);
            }else{
                //Jika Bukan Hak Akses
                $this->load->view("errors/denied");
            }
        }else{
            //Not LoggedIn
            redirect("login");
        }
    }

    //input data
    public function action(){
        if($this->usman->chksess()){
            //if login you can visits
            if($this->session->userdata("level") == 1){
                $something = $this->input->post('btn-add');
                if(isset($something)){
                    //if button is pressed
                    //Data: berisi tentang id data
                    $d = $this->session->userdata("user_name");
                    $dd = date("Y-m-d H:i:s");
                    //data: d_ar_aktif
                    $a1 = $this->input->post("k_no_srt_pk_kd_kls", TRUE);
                    $b1 = $this->input->post("k_pk_nk_ag", TRUE);
                    $c1 = $this->input->post("k_sim_ar_fol", TRUE);
                    $d1 = $this->input->post("k_sim_ar_bin", TRUE);
                    $e1 = $this->input->post("k_sim_ar_box", TRUE);
                    $f1 = $this->input->post("k_sim_ar_cab", TRUE);
                    $g1 = $this->input->post("k_tata_arsip", TRUE);
                    $h1 = $this->input->post("m_pk_agenda", TRUE);
                    $i1 = $this->input->post("m_pk_lmbr_dispo", TRUE);
                    $j1 = $this->input->post("m_sim_ar_fol", TRUE);
                    $k1 = $this->input->post("m_sim_ar_bin", TRUE);
                    $l1 = $this->input->post("m_sim_ar_box", TRUE);
                    $m1 = $this->input->post("m_sim_ar_cab", TRUE);
                    $n1 = $this->input->post("m_tata_arsip", TRUE);
                    $o1 = $this->input->post("sk_olah_arsip", TRUE);
                    $p1 = $this->input->post("arsip_thn_sblm", TRUE);
                    //data: d_ar_in
                    $a2 = $this->input->post("tahun", TRUE);
                    $b2 = $this->input->post("sim_ar_fol", TRUE);
                    $c2 = $this->input->post("sim_ar_box", TRUE);
                    $d2 = $this->input->post("sim_ar_gdng", TRUE);
                    $e2 = $this->input->post("sim_ar_lemari", TRUE);
                    //data: Hasil
                    $a3 = $this->input->post("hsl_temu", TRUE);
                    $b3 = $this->input->post("tgl_wkt", TRUE);
                    //data: d_ar_statis
                    $a4 = $this->input->post("ar_tanah", TRUE);
                    $b4 = $this->input->post("ar_apbdes", TRUE);
                    $c4 = $this->input->post("ar_kuang", TRUE);
                    $d4 = $this->input->post("ar_kpdn", TRUE);
                    $e4 = $this->input->post("fto_mntn_kuwu", TRUE);
                    $f4 = $this->input->post("sjrh_desa", TRUE);
                    $g4 = $this->input->post("ar_pilwu", TRUE);
                    $h4 = $this->input->post("pta_desa", TRUE);
                    $i4 = $this->input->post("ar_kep_skpmng", TRUE);
                    $j4 = $this->input->post("ar_kep_ijazah", TRUE);
                    $k4 = $this->input->post("ar_kep_akta", TRUE);
                    $l4 = $this->input->post("ar_kep_kk", TRUE);
                    $m4 = $this->input->post("ar_kep_bknkh", TRUE);
                    $n4 = $this->input->post("ar_kep_ktp", TRUE);
                    //data: d_adat
                    $a5 = $this->input->post("mpg_sri", TRUE);
                    $b5 = $this->input->post("sdkh_bumi", TRUE);
                    $c5 = $this->input->post("ngnjng_bar", TRUE);
                    $d5 = $this->input->post("seni_daerah", TRUE);
                    //data: d_arna_ar
                    $a6 = $this->input->post("s_box_ar", TRUE);
                    $b6 = $this->input->post("s_fol_map", TRUE);
                    $c6 = $this->input->post("s_skat", TRUE);
                    $d6 = $this->input->post("s_label", TRUE);
                    $e6 = $this->input->post("s_fill_cab", TRUE);
                    //data: d_kesimpulan
                    $a7 = $this->input->post("sdm_krg_mmdai", TRUE);
                    $b7 = $this->input->post("blm_phm_atrn", TRUE);
                    $c7 = $this->input->post("bts_sarana", TRUE);

                    $checking = $this->dataman->datain('tbl_data', array(
                        'user'=>$d, 'date'=>$dd,
                        'k_no_srt_pk_kd_kls'=>$a1, 'k_pk_nk_ag'=>$b1, 'k_sim_ar_fol'=>$c1, 'k_sim_ar_bin'=>$d1, 'k_sim_ar_box'=>$e1, 'k_sim_ar_cab'=>$f1, 'k_tata_arsip'=>$g1, 'm_pk_agenda'=>$h1, 'm_pk_lmbr_dispo'=>$i1, 'm_sim_ar_fol'=>$j1, 'm_sim_ar_bin'=>$k1, 'm_sim_ar_box'=>$l1, 'm_sim_ar_cab'=>$m1, 'm_tata_arsip'=>$n1, 'sk_olah_arsip'=>$o1, 'arsip_thn_sblm'=>$p1,
                        'tahun'=>$a2, 'sim_ar_fol'=>$b2, 'sim_ar_box'=>$c2, 'sim_ar_gdng'=>$d2, 'sim_ar_lemari'=>$e2,
                        'hsl_temu'=>$a3, 'tgl_wkt'=>$b3,
                        'ar_tanah'=>$a4, 'ar_apbdes'=>$b4, 'ar_kuang'=>$c3, 'ar_kpdn'=>$d4, 'fto_mntn_kuwu'=>$e4, 'sjrh_desa'=>$f4, 'ar_pilwu'=>$g4, 'pta_desa'=>$h4, 'ar_kep_skpmng'=>$i4, 'ar_kep_ijazah'=>$j4, 'ar_kep_akta'=>$k4, 'ar_kep_kk'=>$l4, 'ar_kep_bknkh'=>$m4, 'ar_kep_ktp'=>$n4,
                        'mpg_sri'=>$a5, 'sdkh_bumi'=>$b5, 'ngnjng_bar'=>$c5, 'seni_daerah'=>$d5,
                        's_box_ar'=>$a6, 's_fol_map'=>$b6, 's_skat'=>$c6, 's_label'=>$d6, 's_fill_cab'=>$e6,
                        'sdm_krg_mmdai'=>$a7, 'blm_phm_atrn'=>$b7, 'bts_sarana'=>$c7
                    ));
                    if ($checking != FALSE){
                        //Perintah OK
                        $data['error'] = '<div class="alert alert-success" style="margin-top: 3px"><div class="header"><b><i class="fa fa-exclamation-circle"></i> Sukses</b> User telah diperbarui!<br><i>Silahkan Login Kembali</i></div></div>';
                    }else{
                        //Perintah ERR
                        $data['error'] = '<div class="alert alert-danger" style="margin-top: 3px"><div class="header"><b><i class="fa fa-exclamation-circle"></i> ERROR</b> Data Tidak dapat diubah!</div></div>';
                    }
                    $this->load->view("head");
                    $this->load->view('data', $data);
                }else{
                    redirect("data");
                }
            }else{
                //Jika Bukan Hak Akses
                $this->load->view("errors/denied");
            }
        }else{
            redirect("login");
        }
    }
}