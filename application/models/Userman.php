<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Userman extends CI_Model{
	//fungsi untuk Update user data
    function update_data($tabel, $who, $field){
        $this->db->where($who);
        $this->db->update($tabel, $field);
        $query = $this->db->affected_rows();
        if ($query == 0) {
            return FALSE;
        }else{
            return $query;
        }
    }
}