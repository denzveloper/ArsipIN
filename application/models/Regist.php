<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Regist extends CI_Model{
	//fungsi register
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
    function create_user($tabel, $data){
        $cek = $this->db->insert($tabel, $data);
        return TRUE;
    }
    function delete_num($table, $field){
        $this->db->where('kodever',$field);
        $this->db->delete($table);
    }
}