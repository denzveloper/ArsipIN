<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edit extends CI_Controller {

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
            if($this->session->userdata("level")==1 && $this->dataio->chk_ok(array('username'=>$this->session->userdata("uname")))){
                //if level is 1 or Writer you are here
                $this->load->view("head");
                $this->load->view('login/data/edit');
            }else{
                //Jika Bukan Hak Akses
                $this->load->view("errors/denied");
            }
        }else{
            //Not LoggedIn
            redirect("login");
        }
    }

    public function edit(){
    	if ($this->usman->chksess()) {
    		if ($this->session->userdata("level") == 1) {
    			$something = $this->input->post('btn-add');
                if(isset($something)){
                    //if button is pressed
                    $d = $this->session->userdata("uname");
                    $dd = $this->dataio->gtedt(array('username' => $d))->date;
                    //data: d_ar_aktif
                    $a1 = $this->input->post("a1", TRUE);
                    $b1 = $this->input->post("b1", TRUE);
                    $c1 = $this->input->post("c1", TRUE);
                    $d1 = $this->input->post("d1", TRUE);
                    $e1 = $this->input->post("e1", TRUE);
                    $f1 = $this->input->post("f1", TRUE);
                    $g1 = $this->input->post("g1", TRUE);
                    $h1 = $this->input->post("h1", TRUE);
                    $i1 = $this->input->post("i1", TRUE);
                    $j1 = $this->input->post("j1", TRUE);
                    $k1 = $this->input->post("k1", TRUE);
                    $l1 = $this->input->post("l1", TRUE);
                    $m1 = $this->input->post("m1", TRUE);
                    $n1 = $this->input->post("n1", TRUE);
                    $o1 = $this->input->post("o1", TRUE);
                    //data: d_ar_in
                    $a2 = $this->input->post("a2", TRUE);
                    $b2 = $this->input->post("b2", TRUE);
                    $c2 = $this->input->post("c2", TRUE);
                    $d2 = $this->input->post("d2", TRUE);
                    $e2 = $this->input->post("e2", TRUE);
                    $f2 = $this->input->post("f2", TRUE);
                    //data: Hasil
                    $a3 = $this->input->post("a3", TRUE);
                    //data: d_ar_statis
                    $a4 = $this->input->post("a4", TRUE);
                    $b4 = $this->input->post("b4", TRUE);
                    $c4 = $this->input->post("c4", TRUE);
                    $d4 = $this->input->post("d4", TRUE);
                    $e4 = $this->input->post("e4", TRUE);
                    $f4 = $this->input->post("f4", TRUE);
                    $g4 = $this->input->post("g4", TRUE);
                    $h4 = $this->input->post("h4", TRUE);
                    $i4 = $this->input->post("i4", TRUE);
                    $j4 = $this->input->post("j4", TRUE);
                    $k4 = $this->input->post("k4", TRUE);
                    $l4 = $this->input->post("l4", TRUE);
                    $m4 = $this->input->post("m4", TRUE);
                    $n4 = $this->input->post("n4", TRUE);
                    //data: d_adat
                    $a5 = $this->input->post("a5", TRUE);
                    $b5 = $this->input->post("b5", TRUE);
                    $c5 = $this->input->post("c5", TRUE);
                    $d5 = $this->input->post("d5", TRUE);
                    //data: d_arna_ar
                    $a6 = $this->input->post("a6", TRUE);
                    $b6 = $this->input->post("b6", TRUE);
                    $c6 = $this->input->post("c6", TRUE);
                    $d6 = $this->input->post("d6", TRUE);
                    $e6 = $this->input->post("e6", TRUE);
                    //data: d_kesimpulan
                    $a7 = $this->input->post("a7", TRUE);
                    $b7 = $this->input->post("b7", TRUE);
                    $c7 = $this->input->post("c7", TRUE);
                    
                    if($this->dataio->chk('tbl_data', array('dibaca'=>1, 'date'=>$dd, 'username'=>$d))){
                        //Perintah ERR
                        $data['error'] = '<div class="alert alert-danger" style="margin-top: 3px"><div class="header"><b><i class="fa fa-exclamation-circle"></i> ERROR</b> Data Tahun ini sudah dicetak/dibaca!<br></div></div>';
                    }else{
                        $checking = $this->dataio->dataup(array('date'=>$dd,
                            'k_no_srt_pk_kd_kls'=>$a1, 'k_pk_nk_ag'=>$b1, 'k_sim_ar_fol'=>$c1, 'k_sim_ar_bin'=>$d1, 'k_sim_ar_box'=>$e1, 'k_sim_ar_cab'=>$f1, 'k_tata_arsip'=>$g1, 'm_pk_agenda'=>$h1, 'm_pk_lmbr_dispo'=>$i1, 'm_sim_ar_fol'=>$j1, 'm_sim_ar_bin'=>$k1, 'm_sim_ar_box'=>$l1, 'm_sim_ar_cab'=>$m1, 'm_tata_arsip'=>$n1, 'sk_olah_arsip'=>$o1,
                            'arsip_thn_sblm'=>$a2, 'tahun'=>$b2, 'sim_ar_fol'=>$c2, 'sim_ar_box'=>$d2, 'sim_ar_gdng'=>$e2, 'sim_ar_lemari'=>$f2,
                            'hsl_temu'=>$a3,
                            'ar_tanah'=>$a4, 'ar_apbdes'=>$b4, 'ar_kuang'=>$c4, 'ar_kpdn'=>$d4, 'fto_mntn_kuwu'=>$e4, 'sjrh_desa'=>$f4, 'ar_pilwu'=>$g4, 'pta_desa'=>$h4, 'ar_kep_skpmng'=>$i4, 'ar_kep_ijazah'=>$j4, 'ar_kep_akta'=>$k4, 'ar_kep_kk'=>$l4, 'ar_kep_bknkh'=>$m4, 'ar_kep_ktp'=>$n4,
                            'mpg_sri'=>$a5, 'sdkh_bumi'=>$b5, 'ngnjng_bar'=>$c5, 'seni_daerah'=>$d5,
                            's_box_ar'=>$a6, 's_fol_map'=>$b6, 's_skat'=>$c6, 's_label'=>$d6, 's_fill_cab'=>$e6,
                            'sdm_krg_mmdai'=>$a7, 'blm_phm_atrn'=>$b7, 'bts_sarana'=>$c7
                        ), array('username'=>$d, 'date'=>$dd,'dibaca'=>0));
                        if ($checking != FALSE){
                            //Perintah OK
                            $data['error'] = '<div class="alert alert-success" style="margin-top: 3px"><div class="header"><b><i class="fa fa-exclamation-circle"></i> Sukses</b> Data sudah diedit!<br><i>Arsip Aris akan segera mencetak data terbaru Anda.</i></div></div>';
                        }else{
                            //Perintah ERR
                            $data['error'] = '<div class="alert alert-danger" style="margin-top: 3px"><div class="header"><b><i class="fa fa-exclamation-circle"></i> ERROR</b> Data Tidak dapat diperbarui!<br><i>Kesalahan terjadi mungkin karena data dicetak atau masalah lainnya.</i></div></div>';
                        }
                    }
                    $this->load->view("head");
                    $this->load->view('login/data/edit', $data);
                }else{
                	redirect("edit");
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