<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kuis_model extends CI_Model {
	public function getAllSoal(){
		return $this->db->get('soal')->result_array();
	}

	public function tambahSoal(){
		$data = [
			'sl_category' => $this->input->post('category',true),
			'sl_soal' => $this->input->post('soal',true),
			'sl_a' => $this->input->post('a',true),
			'sl_b' => $this->input->post('b',true),
			'sl_c' => $this->input->post('c',true),
			'sl_d' => $this->input->post('d',true),
			'sl_e' => $this->input->post('e',true),
			'sl_jawaban' => $this->input->post('kunci',true)
		];

		$this->db->insert('soal',$data);
		redirect('kuis');
	}

	public function cariSoal(){
		$keyword = $this->input->post('keyword', true);
		// $this->db->where('mb_category =','ahli hukum' );
		$this->db->like('sl_category', $keyword);
		$this->db->or_like('sl_soal', $keyword);
		$this->db->or_like('sl_a', $keyword);
		$this->db->or_like('sl_b', $keyword);
		$this->db->or_like('sl_c', $keyword);
		$this->db->or_like('sl_d', $keyword);
		$this->db->or_like('sl_e', $keyword);
		
		return $this->db->get('soal')->result_array();
	}

	public function ubahSoal(){
		$data = [
			'sl_soal' => $this->input->post('soal', true),
			'sl_category' => $this->input->post('category', true),
			'sl_a' => $this->input->post('a', true),
			'sl_b' => $this->input->post('b', true),
			'sl_c' => $this->input->post('c', true),
			'sl_d' => $this->input->post('d', true),
			'sl_e' => $this->input->post('e', true),
			'sl_jawaban' => $this->input->post('kunci', true)
		];

		$this->db->where('sl_id',$this->input->post('sl_id'));
		$this->db->update('soal', $data);
	}

	public function getSoalById($id=''){
		return $this->db->get_where('soal',['sl_id' => $id])->row_array();
	}

	public function getAllMateri(){
		return $this->db->get('materi')->result_array();
	}

	public function getMateriById($id){
		return $this->db->get_where('materi',['mt_id' => $id])->row_array();
	}

	public function cariMateri(){
		$keyword = $this->input->post('keyword', true);
		// $this->db->where('mb_category =','ahli hukum' );
		$this->db->like('mt_category', $keyword);
		$this->db->or_like('mt_jenis', $keyword);
		$this->db->or_like('mt_modul', $keyword);
		$this->db->or_like('mt_file', $keyword);
		
		return $this->db->get('materi')->result_array();
	}

	public function getAllPengaturan(){
		return $this->db->get_where('pengaturan_kuis',['pk_id' => 1])->row_array();
	}

	public function getAllModul(){
		return $this->db->get('modul')->result_array();
	}

	public function getAllJenis(){
		return $this->db->get('jenis_materi')->result_array();
	}
}