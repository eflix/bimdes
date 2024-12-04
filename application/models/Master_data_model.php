<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_data_model extends CI_Model {

	public function getAllMapel(){
		return $query = $this->db->get('master_mapel')->result_array();
	}

    public function tambahMapel($frmData){
        $this->db->insert('master_mapel',$frmData);
      }

}