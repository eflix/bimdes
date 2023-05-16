<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokumen_model extends CI_Model {

	public function getAllData(){
		return $query = $this->db->get('data_dokumen')->result_array();
	}

}