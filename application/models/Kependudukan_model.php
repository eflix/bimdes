<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kependudukan_model extends CI_Model {

	// Penduduk
	public function getAllData(){
		return $query = $this->db->get('data_penduduk')->result_array();
	}

	public function addPenduduk(){
		$data = [
			'dp_nik' => $this->input->post('nik', true),
			'dp_no_kk' => $this->input->post('nokk', true),
			'dp_nama' => $this->input->post('nama', true),
			'dp_gender' => $this->input->post('gender', true),
			'dp_tempat_lahir' => $this->input->post('tempatLahir',true),
			'dp_tanggal_lahir' => date('Y-m-d', strtotime($this->input->post('tglLahir'))),
			'dp_alamat' => $this->input->post('alamat',true),
			'dp_desa' => $this->input->post('desa',true),
			'dp_kelurahan' => $this->input->post('kelurahan',true),
			'dp_kecamatan' => $this->input->post('kecamatan',true),
			'dp_kabupaten' => $this->input->post('kabupaten',true),
			'dp_provinsi' => $this->input->post('provinsi',true),
			'dp_agama' => $this->input->post('agama',true),
			'dp_status_perkawinan' => $this->input->post('statusPerkawinan',true),
			'dp_pekerjaan' => $this->input->post('pekerjaan',true),
			'dp_kewarganegaraan' => $this->input->post('kewarganegaraan',true),
			'created_dt' => date('Y-m-d'),
			'created_by' => $this->input->post('staff',true)
		];

		$this->db->insert('data_penduduk',$data);

		// folder untuk dokumen
		if((file_exists(base_url('assets/dokumen/'.$this->input->post('nik'))))&&(is_dir(base_url('assets/dokumen/'.$this->input->post('nik'))))) { 
		 	// echo "Dokumen Sudah ada";
		 } else { 
		 //memasukan fungsi mkdir 
		 	// echo "berhasil buat folder ".$this->input->post('nik');
		 	// mkdir (base_url('assets/dokumen/'.$this->input->post('nik')));
		 	mkdir('./assets/dokumen/'.$this->input->post('nik'));
		}
		// redirect('kependudukan');
	}

	public function getPendudukById($nik){
		return $query = $this->db->get_where('data_penduduk',['dp_nik' => $nik])->row_array();
	}

	public function ubahPenduduk(){
		if ($this->input->post('password') <> ''   && $this->input->post('password1') <> '') {
			if ($this->input->post('password') == $this->input->post('password1')) {

				$data = [
					"password" => password_hash($this->input->post('password'),PASSWORD_DEFAULT)
					];
				$this->db->where('username',$this->input->post('nik'));
				$this->db->update('user', $data);

			} else
			{
				$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Pasword Tidak Sama</div>');
				redirect('kependudukan/ubahPenduduk/'.$this->input->post('nik'));

			}
						
		} else {
			redirect('kependudukan/ubahPenduduk/'.$this->input->post('nik'));
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Password Kosong</div>');
		}

		$data = [
			'dp_no_kk' => $this->input->post('nokk', true),
			'dp_nama' => $this->input->post('nama', true),
			'dp_gender' => $this->input->post('gender', true),
			'dp_tempat_lahir' => $this->input->post('tempatLahir',true),
			'dp_tanggal_lahir' => date('Y-m-d', strtotime($this->input->post('tglLahir'))),
			'dp_alamat' => $this->input->post('alamat',true),
			'dp_desa' => $this->input->post('desa',true),
			'dp_kelurahan' => $this->input->post('kelurahan',true),
			'dp_kecamatan' => $this->input->post('kecamatan',true),
			'dp_kabupaten' => $this->input->post('kabupaten',true),
			'dp_provinsi' => $this->input->post('provinsi',true),
			'dp_agama' => $this->input->post('agama',true),
			'dp_status_perkawinan' => $this->input->post('statusPerkawinan',true),
			'dp_pekerjaan' => $this->input->post('pekerjaan',true),
			'dp_kewarganegaraan' => $this->input->post('kewarganegaraan',true)
		];
		$this->db->where('dp_nik',$this->input->post('nik'));
		$this->db->update('data_penduduk', $data);

		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Penduduk Berhasil Diubah!</div>');
		redirect('kependudukan');
	}

	public function hapusPenduduk($nik){
		$this->db->where('dp_nik', $nik);
		$this->db->delete('data_penduduk');

		$this->db->where('username', $nik);
		$this->db->delete('user');

		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data Berhasil Dihapus!</div>');
		redirect('kependudukan');
	}

	public function cariPenduduk(){
		$keyword = $this->input->post('keyword', true);
		$this->db->like('dp_nama', $keyword);
		$this->db->or_like('dp_nik', $keyword);
		$this->db->or_like('dp_no_kk', $keyword);
		return $this->db->get('data_penduduk')->result_array();
	}

	// User
	public function tambahUser(){
		$data = [
				"name" => htmlspecialchars($this->input->post('nama', true)),
				"email" => '',
				"image" => 'default.jpg',
				"username" => $this->input->post('nik', true),
				"password" => password_hash($this->input->post('password'),PASSWORD_DEFAULT),
				"role_id" => 2,
				"is_active" => 1,
				"date_created" => date('Y-m-d')
			];

			$this->db->insert('user', $data);
	}

	public function getUserById($nik){
		return $query = $this->db->get_where('user',['username' => $nik])->row_array();
	}

	public function ubahUser (){
		$data = [
				"password" => password_hash($this->input->post('password'),PASSWORD_DEFAULT)
			];
			$this->db->where('username',$this->input->post('nik'));
			$this->db->update('data_penduduk', $data);
	}

	// Dokumen

	public function getDokumenByNik($nik){
		return $query = $this->db->get_where('data_dokumen',['dd_dp_nik' => $nik])->result_array();
	}

}