<?php
//Regist(Ragister Data) versi 0.4
defined('BASEPATH') OR exit('No direct script access allowed');

class Regist extends CI_Model{
    
	//fungsi pengecekan untuk register
    function checking($tabel, $field){
        $this->db->select('*');
        $this->db->from($tabel);
        $this->db->where($field);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return FALSE;
        }else{
            return $query->result();
        }
    }
    //Membuat Pengguna
    function create_user($data){
        $this->db->insert('tbl_users', $data);
        $query = $this->db->affected_rows();
        if ($query == 0) {
            return FALSE;
        }else{
            return $query;
        }
    }

    //Menghapus Kode Verifikasi
    function delete_num($field){
        $this->db->where('kodever',$field);
        $this->db->delete('tbl_kode');
    }
    
}