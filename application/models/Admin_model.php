<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {
	public function getAllMember(){
		return $this->db->get_where('member', ['mb_category <>' => 'ahli hukum'])->result_array();
	}

	public function getMemberById($id){
		return $this->db->get_where('member', ['mb_id' => $id])->row_array();
	}

	public function getAllAhliHukum(){
		return $this->db->get_where('member', ['mb_category =' => 'ahli hukum'])->result_array();
	}

	public function cariMember(){
		$keyword = $this->input->post('keyword', true);
		$this->db->where('mb_category <>','ahli hukum' );
		$this->db->like('mb_nama', $keyword);
		$this->db->or_like('mb_no_hp', $keyword);
		$this->db->or_like('mb_email', $keyword);
		$this->db->or_like('mb_alamat', $keyword);
		
		return $this->db->get_where('member',['mb_category <>' => 'ahli hukum'])->result_array();
	}

	public function cariAhliHukum(){
		$keyword = $this->input->post('keyword', true);
		$this->db->where('mb_category =','ahli hukum' );
		$this->db->like('mb_nama', $keyword);
		$this->db->or_like('mb_no_hp', $keyword);
		$this->db->or_like('mb_email', $keyword);
		$this->db->or_like('mb_alamat', $keyword);
		
		return $this->db->get_where('member',['mb_category =' => 'ahli hukum'])->result_array();
	}

	public function ubahMember(){
		$data = [
			'mb_category' => $this->input->post('category', true),
			'mb_nama' => $this->input->post('nama', true),
			'mb_email' => $this->input->post('email', true),
			'mb_alamat' => $this->input->post('alamat', true)
		];

		$this->db->where('mb_id',$this->input->post('id'));
		$this->db->update('member', $data);

		// $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Penduduk Berhasil Diubah!</div>');
		if ($this->input->post('category') == 'AHLI HUKUM'){
			redirect('admin/ahliHukum');
		} else {
			redirect('admin/member');
		}
 		
	}

	public function getAllBerita(){
		return $this->db->get('berita')->result_array();
	}

	public function getTotalPesan(){
		return $this->db->get_where('user_chat_messages',['recipient' => 'admin'])->num_rows();
	}

	public function getLastPesan(){
		// $this->db->select('*');
		$this->db->order_by('id','desc');
		$this->db->limit(1);
		return $this->db->get_where('user_chat_messages',['recipient' => 'admin'])->row_array();
		// return $this->db->get('user_chat_messages')->limit(1)->row_array();
	}
}