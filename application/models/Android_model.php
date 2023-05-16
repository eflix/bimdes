<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Android_model extends CI_Model {

	public function getAllBerita(){
		return $query = $this->db->get('berita')->result_array();
	}
	
	public function getBeritaById($id){
		return $query = $this->db->get_where('berita',['bt_id' => $id])->row_array();
	}
	
    public function getAllSlider(){
		return $query = $this->db->get('konten_header')->result_array();
	}

	public function getAllIcon(){
		return $query = $this->db->get('android_icon')->result_array();
	}

}