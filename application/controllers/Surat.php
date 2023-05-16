<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat extends CI_Controller {

	public function __construct(){
		parent::__construct();
		is_logged_in();
		$this->load->model('Surat_model','surat');
		$this->load->library('pdf');
	}

	public function index(){
		$data['title'] = 'Daftar Pengajuan';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$data['surat'] = $this->surat->getAllData();
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('surat/index', $data);
		$this->load->view('templates/footer');
	}

	public function tambah(){
		$data['title'] = 'Tambah Pengajuan Surat';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$data['listNama'] = $this->db->get('data_penduduk')->result_array();
		$data['listSurat'] = $this->db->get('daftar_surat')->result_array();
		// var_dump($data['listNama']);

		$this->form_validation->set_rules('nik', 'NIK', 'required');

		if ($this->form_validation->run() == false) {
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('surat/tambah', $data);
		$this->load->view('templates/footer');
		} else{
			$this->surat->addPengajuanSurat();
		} 
	}

	public function hapusPS($id){
		$this->db->where('ps_id', $id);
		$this->db->delete('pengajuan_surat');

		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data Berhasil Dihapus!</div>');
		redirect('Surat');
	}

	public function ubah($id=0){
		$data['title'] = 'Ubah Pengajuan Surat';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['ps'] = $this->surat->getPengajuanById($id);

		$this->form_validation->set_rules('nik', 'NIK', 'required');
		// var_dump($data['ps']);

		if ($this->form_validation->run() == false) {
			// echo "defaukt";
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('surat/ubah', $data);
		$this->load->view('templates/footer');
		} else{
			// echo "ubah";
			$this->surat->ubahPengajuanSurat($id);
		} 
	}

	public function cetak($id = 0,$nik = 0, $idSurat = 0){
		$data['title'] = 'Print Surat';
		$data['subTitle'] = 'Cetak Surat ';

		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$data['ps'] = $this->surat->getPengajuanById($id);

		$data['daftarPengajuan'] = $this->surat->daftarPengajuan();
		// var_dump($data['daftarPengajuan']);
		$data['id'] = $id;
		// echo $id;
		// $data['nik'] = $nik;
		// if ($idSurat <> 0) {
			$data['idSurat'] = $idSurat;
		// }
		
		// if ($nik <> 0) {
			$data['dtpd'] = $this->surat->getPendudukByNik($nik);
			// var_dump($data['dtpd']);
		// }
		
		// $data['subTitle'] = 'Cetak Surat '.$data['ps']['ps_ds_layanan'];

		// echo $id;

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('surat/header_cetak_surat', $data);
		$this->load->view('surat/data_penduduk', $data);
		
		// $this->load->view('surat/daftar_dokumen', $data);
		$this->load->view('surat/nomor_surat', $data);
		// if $data[]
		$this->load->view('surat/tgl_berlaku', $data);
		$this->load->view('surat/footer_cetak_surat', $data);
		$this->load->view('templates/footer');

	}

	public function getPendudukByNik($nik){
		// $data['pendudukByNik'] = $this->surat->getPendudukByNik($nik);
		// echo json_encode($this->surat->getPendudukByNik($_POST['nik']));
		echo json_encode($this->surat->getPendudukByNik($nik));
		// echo $data;
	}

	public function cetakSurat(){
		$data['dpByNik'] = $this->surat->getPendudukByNik($_POST['nik']);
		// echo $_POST['nik'];
		$data['dataSurat'] = $this->db->get_where('daftar_surat',['ds_id' => $_POST['id']])->row_array();
		$this->form_validation->set_rules('nik', 'NIK', 'required');

		$data['ps'] = $this->db->get_where('pengajuan_surat',['ps_ds_id' => $_POST['id'], 'ps_dp_nik' => $_POST['nik'],'ps_status' => 'Diterima'])->row_array();

		$data['noSurat'] = $_POST['noSurat'];
		$data['atasNama'] = $_POST['atasNama'];
		$data['staff'] = $_POST['staff'];
		$data['jabatan'] = $_POST['jabatan'];
		$data['tglAwal'] = $_POST['tglAwal'];
		$data['tglAkhir'] = $_POST['tglAkhir'];
		$data['keperluan'] = $_POST['keperluan'];
		$data['noJamkesos'] = $_POST['noJamkesos'];
		$data['usaha'] = $_POST['usaha'];


		// if ($this->form_validation->run() == false) {
		// 	cetak();
		// } else {
			$this->load->view('surat/templates/header', $data);
			$this->load->view('surat/templates/'.$data['dataSurat']['ds_link'], $data);
		// }
	}

	public function previewSurat($id = 0,$nik = 0, $idSurat = 0){
		$data['dpByNik'] = $this->surat->getPendudukByNik($nik);
		// echo $_POST['nik'];
		$data['dataSurat'] = $this->db->get_where('daftar_surat',['ds_id' => $id])->row_array();
		$this->form_validation->set_rules('nik', 'NIK', 'required');

		$data['ps'] = $this->db->get_where('pengajuan_surat',['ps_ds_id' => $idSurat, 'ps_dp_nik' => $nik])->row_array();

		$data['is'] = $this->db->get_where('identitas_surat',['is_id' => 1])->row_array();

		$data['noSurat'] = '470 / BB /  ,-';
		$data['atasNama'] ='';
		$data['staff'] = $this->session->userdata('name');
		$data['jabatan'] = '';
		// $data['tglAwal'] = $_POST['tglAwal'];
		// $data['tglAkhir'] = $_POST['tglAkhir'];
		// $data['keperluan'] = $_POST['keperluan'];
		// $data['noJamkesos'] = $_POST['noJamkesos'];
		// $data['usaha'] = $_POST['usaha'];


		// if ($this->form_validation->run() == false) {
		// 	cetak();
		// } else {
			$this->load->view('surat/templates/header', $data);
			$this->load->view('surat/templates/'.$data['dataSurat']['ds_link'], $data);
		// }
	}

	public function riwayatSurat(){
		$data['title'] = 'Riwayat Surat';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$data['surat'] = $this->db->get_where('pengajuan_surat', ['ps_status' => 'Diambil'])->result_array();
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('surat/riwayat_surat', $data);
		$this->load->view('templates/footer');
	}

	public function daftarSurat(){
		$data['title'] = 'Print Surat';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$data['daftarSurat'] = $this->surat->daftarSurat();
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('surat/daftarSurat', $data);
		$this->load->view('templates/footer');
	}



}