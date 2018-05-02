<?php
//Dataio(Data I/O) versi 0.3
defined('BASEPATH') OR exit('No direct script access allowed');

class Dataio extends CI_Model{

	//Fetching data All
    function viewall(){
        $this->db->select('*');
        $this->db->from('tbl_data');
        $this->db->order_by("date", "DESC");
        $this->db->limit(10);
        $query = $this->db->get();
	    $data = array();
	    if($query !== FALSE && $query->num_rows() > 0){
	    	foreach ($query->result() as $row) {
	    		$data[] = $row;
	    	}
	    }
		return $data;
    }

	//Lihat data detail
	function viewdata($field){
        $this->db->select('*');
        $this->db->from('tbl_data');
        $this->db->where($field);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return FALSE;
        }else{
            return $query->result();
        }
    }

    //Buat data hanya bisa baca
    function makejr($who){
    	$this->db->where($who);
    	$this->db->where('dibaca',0);
        $this->db->update('tbl_data', array('dibaca' => 1));
    }

    //Edit data
    function editio($tabel, $field){
    	$this->db->where($who);
    	$this->db->where('status',0);
        $this->db->update('tbl_data', $field);
        $query = $this->db->affected_rows();
        if ($query == 0) {
        	return FALSE;
        }else{
        	return $query;
        }
    }

    //Fetching data Filtered
    function viewmin($field){
        $this->db->select('*');
        $this->db->from('tbl_data');
        $this->db->where($field);
        $query = $this->db->get();
	    $data = array();
	    if($query !== FALSE && $query->num_rows() > 0){
	    	foreach ($query->result() as $row) {
	    		$data[] = $row;
	    	}
	    }
	   	return $data;
    }

    //Chart use only
    function vica($field0, $field1){
        $this->db->select($field0);
        $this->db->from('tbl_data');
        $this->db->where($field1);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return FALSE;
        }else{
            return $query->result();
        }
    }

    //Dapatkan daftar user beserta dan disusun tempat
    function getlistuser(){
        $this->db->from('tbl_users');
        $this->db->where('level',1);
        $this->db->order_by("place");
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return FALSE;
        }else{
            return $query->result();
        }
    }

    //Dapatkan daftar laporan terbaru
    function getnewdata(){
        $this->db->from('tbl_data');
        $this->db->order_by("dibaca");
        $this->db->order_by("date","DESC");
        $this->db->limit(5);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return FALSE;
        }else{
            return $query->result();
        }
    }

    //Dapatkan list
    function getwho($find){
        $this->db->from('tbl_users');
        $this->db->where("username","$find");
        $query = $this->db->get();
        return $query->row();
    }
    
}