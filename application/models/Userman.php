<?php
//Userman(User Manager) versi 0.4
defined('BASEPATH') OR exit('No direct script access allowed');

class Userman extends CI_Model{

    //Ambil user data by username
    public function detailus($who){
        $this->db->from('tbl_users');
        $this->db->where('username',$who);
        $query = $this->db->get();
        $this->db->limit(1);
        $data = array();
        if($query !== FALSE && $query->num_rows() > 0){
            foreach ($query->result() as $row) {
            $data[] = $row;
            }
        }
        return $data;
    }

    //Ambil semua data user level 1
    public function fetchdata(){
        $this->db->from('tbl_users');
        $this->db->where('level',1);
        $this->db->order_by("acccreate", "DESC");
        $query = $this->db->get();
        $data = array();
        if($query !== FALSE && $query->num_rows() > 0){
            foreach ($query->result() as $row) {
            $data[] = $row;
            }
        }
        return $data;
    }

	//fungsi untuk Update user data
    function update_data($who, $field){
        $this->db->where($who);
        $this->db->update("tbl_users", $field);
        $query = $this->db->affected_rows();
        if ($query == 0) {
            return FALSE;
        }else{
            return $query;
        }
    }

    //fungsi delete user data
    public function del_data($field){
        $this->db->where($field);
        $this->db->delete("tbl_users");
        $query = $this->db->affected_rows();
        if ($query == 0) {
            return FALSE;
        }else{
            return $query;
        }
    }

}