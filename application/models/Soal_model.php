<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Soal_model extends CI_Model {

	public function getAllSoal($category){
        $this->db->select("soal.*")
        ->from('soal')
        ->join('category',"sl_id_category = category.id")
        // ->join('materi',"md_modul = mt_modul")
        ->where("category = UPPER('$category')")
        // ->where('category',"UMUM")
        ;
        $query = $this->db->get();
		return $query->result_array();
	}

    public function getAllModul($id_category){
		return $this->db->get('modul')->result_array();
	}

    public function tambahSoal($frmData){
		$this->db->insert('soal',$frmData);
	}
}