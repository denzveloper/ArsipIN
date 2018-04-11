<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");

class Admin extends CI_Model{
	//fungsi cek session
    function logged_id(){
        return $this->session->userdata('user_name');
    }
	//fungsi check login
    function check_login($table, $field1, $field2){
        $this->db->select('*');
        $this->db->from($table);
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
    function lastlog($tabel, $who, $field){
        $this->db->where($who);
        $this->db->update($tabel, $field);
        return;
    }
}