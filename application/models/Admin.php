<?php
//Admin versi 0.8

#===============================================[-][=][x]
#BACKEND DEVELOPED BY: DENZVELOPER/DzEN                #
#CONTACT: dandyoctavian@yahoo.co.jp                    #    
#======================================================#
#This Piece of ArsipIN App                             #
#License: BSD License (1990)                           #
#Framework By: CodeIgniter                             #
#Supported By: D3-TI.2A[Ampas](2018), POLINDRA         #
#EXSCLUSIVE FOR: Dinas Kearsipan dan Perpus IMY        #
#======================================================#

defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");

class Admin extends CI_Model{

	//fungsi cek session
    function logged_id(){
        return $this->session->userdata('user_name');
    }

	//fungsi check login
    function check_login($field1, $field2){
        $this->db->select('*');
        $this->db->from('tbl_users');
        $this->db->where($field1);
        $this->db->where($field2);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }

    //fungsi last login
    function lastlog($who, $field){
        //last login date/time save
        $this->db->where($who);
        $this->db->update('tbl_users', $field);
        return;
    }

    //fungsi logout
    function logout(){
        //set value empty in session, destroy session and logout
        $arraydata = array(
            'user_name'=> '', 'user_pass'=>'', 'who'=>'', 'user_nama'=>'', 'user_phone'=>'', 'level'=>'', 'edit'=>''
        );
        $this->session->unset_userdata($arraydata);
        $this->session->sess_destroy();
    }
    
}