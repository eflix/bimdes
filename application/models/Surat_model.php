<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_model extends CI_Model {

	public function getAllData(){
		// return $query = $this->db->get('pengajuan_surat')->result_array();
		$this->db->select('*')->from('pengajuan_surat')->join('data_penduduk','ps_dp_nik = dp_nik');
		return $query = $this->db->get()->result_array();
	}

	public function addPengajuanSurat(){
		$query = $this->db->get_where('daftar_surat', ['ds_id' => $this->input->post('idSurat')])->row_array();

		$data = [
			'ps_dp_nik' => $this->input->post('nik', true),
			'ps_status' => 'Diterima',//$this->input->post('status', true),
			'ps_ds_id' => $this->input->post('idSurat', true),
			'ps_ds_kode' => $query['ds_kode'],
			'ps_ds_layanan' => $query['ds_layanan'],
			'ps_keterangan' => $this->input->post('keterangan', true),
			'created_by' => $this->session->userdata('name')
		];

		$this->db->insert('pengajuan_surat',$data);
		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Pengajuan Surat Berhasil Ditambahkan!</div>');
		redirect('surat');
	}

	public function ubahPengajuanSurat(){
		$data = [
			'ps_dp_nik' => $this->input->post('nik', true),
			'ps_status' => $this->input->post('status', true),
			'ps_ds_id' => $this->input->post('idSurat', true),
			'ps_ds_kode' => $this->input->post('kode',true),
			'ps_ds_layanan' => $this->input->post('layanan',true),
			'ps_keterangan' => $this->input->post('keterangan',true)
		];
		// echo $this->input->post('id');

		$this->db->where('ps_id',$this->input->post('id'));
		$this->db->update('pengajuan_surat', $data);

		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Pengajuan Surat Berhasil Diubah!</div>');
		redirect('surat');
	}

	public function getPengajuanById($id){
		return $query = $this->db->get_where('pengajuan_surat', ['ps_id' => $id,'ps_status' => 'Diterima'])->row_array();
	}

	public function daftarPengajuan(){
		$this->db->select('distinct dp_nik,dp_nama,ps_dp_nik',false)->from('pengajuan_surat')->join('data_penduduk','ps_dp_nik = dp_nik')->where('ps_status','Diterima');
		return $query = $this->db->get()->result_array();
	}

	public function getPendudukByNik($nik){
		return $query = $this->db->get_where('data_penduduk', ['dp_nik' => $nik])->row_array();
	}

	public function daftarSurat(){
		return $query = $this->db->get('daftar_surat')->result_array();
	}

}