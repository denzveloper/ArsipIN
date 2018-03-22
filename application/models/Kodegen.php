<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kodegen extends CI_Model{
	Public function __construct(){
        parent::__construct();
        //load helper String
        $this->load->helper('string');
    }
	function generate($tabel, $jumlah){
		for ($i=0; $i < $jumlah ; $i++) { 
			$rand = strtoupper(random_string('alnum',7));
			$masuk = array('kodever' => $rand);
			$this->db->insert($tabel, $masuk);
		}
	}
	public function record_count() {
       return $this->db->count_all("tbl_kode");
   	}
	public function fetchdata($limit, $start){
		$this->db->limit($limit, $start);
		$Q = $this->db->get("tbl_kode");
        if($Q->num_rows() > 0){
            foreach ($Q->result() as $row){
                $data[] = $row;
            }
            return $data;
        }
        return FALSE;
	}

	function getdata(){
		$this->db->select("kodever"); 
  		$this->db->from('tbl_kode');
  		$query = $this->db->get();
  		return $query->result();
	}
}