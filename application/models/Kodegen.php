<?php
//kodegen(Kode Generator) versi 0.4
defined('BASEPATH') OR exit('No direct script access allowed');

class Kodegen extends CI_Model{

  //mungkin bakal dihapus
	Public function __construct(){
    parent::__construct();
    //load helper String
    $this->load->helper('string');
  }

  //Generate new code sebanyak $jumlah
	function generate($jumlah){
    for ($i=0; $i < $jumlah ; $i++) { 
      $rand = strtoupper(random_string('alnum',7));
			$masuk = array('kodever' => $rand);
			$this->db->insert('tbl_kode', $masuk);
      $query = $this->db->affected_rows();
      if($query == 0){
        $i--;
      }
		}
    $query = $this->db->affected_rows();
    if ($query == 0) {
      return FALSE;
    }else{
      return $query;
    }
	}

  //Datapkan semua data
  function getdataall(){
    $this->db->select("kodever"); 
    $this->db->from('tbl_kode');
    $query = $this->db->get();
    $data = array();
    if($query !== FALSE && $query->num_rows() > 0){
      foreach ($query->result() as $row) {
        $data[] = $row;
      }
    }
   return $data;
  }
  
}