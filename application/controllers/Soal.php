<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Soal extends CI_Controller {

	public function __construct(){
		parent::__construct();
		is_logged_in();
		$this->load->model('Soal_model','soal');
		$this->load->model('Kuis_model','kuis');
	}

    // function _remap($param){
    //     if ($param === 'khusus' || $param === 'umum' || $param === 'sd' || $param === 'smp' || $param === 'sma' || $param === 'smk'){
    //         $this->index($param);
    //     } else {
    //         $this->default_method();
    //     }
    // }

	public function index(){
		$this->list('khusus');
	}

	public function list($category){
		$data['title'] = 'Kelola Soal ' . strtoupper($category);
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$data['category'] = $category;
		
		$data['soal'] = $this->soal->getAllSoal($category);

		if ($this->input->post('keyword')) {
			$data['soal'] = $this->kuis->cariSoal();
		}

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('soal/index', $data);
		$this->load->view('templates/footer');
    }

	public function tambahSoal(){
		$data['title'] = 'Tambah Soal [' . strtoupper($this->input->get('category'))."]";
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['category'] = $this->input->get('category');
		
		
		$this->form_validation->set_rules('soal', 'Soal', 'required');

		$data['modul'] = $this->soal->getAllModul($this->input->post('category'));
		$data['mapel'] = $this->soal->getAllMapel();

		if ($this->form_validation->run() == false) {
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('soal/tambah', $data);
		$this->load->view('templates/footer');
		} else {
			$id_category = 0;
			if ($this->input->post('id_category') == 'khusus') {
				$id_category = 1;
			} else if ($this->input->post('id_category') == 'umum') {
				$id_category = 2;
			} else if ($this->input->post('id_category') == 'sd') {
				$id_category = 3;
			} else if ($this->input->post('id_category') == 'smp') {
				$id_category = 4;
			} else if ($this->input->post('id_category') == 'sma') {
				$id_category = 5;
			} else if ($this->input->post('id_category') == 'smk') {
				$id_category = 6;
			}

			// $data['id_category'] = $id_category;

			$frmData = [
				'sl_id_category' => $id_category,
				'sl_id_mapel' => $this->input->post('mapel',true),
				'sl_kelas' => $this->input->post('kelas',true),
				'sl_category' => $this->input->post('modul',true),
				'sl_soal' => $this->input->post('soal',true),
				'sl_a' => $this->input->post('a',true),
				'sl_b' => $this->input->post('b',true),
				'sl_c' => $this->input->post('c',true),
				'sl_d' => $this->input->post('d',true),
				'sl_e' => $this->input->post('e',true),
				'sl_jawaban' => $this->input->post('kunci',true)
			];

			$this->soal->tambahSoal($frmData);
			redirect('soal/list/'.$data['category']);
		}
	}

	public function tryout($category){
		$data['title'] = 'Kelola Try Out ' . strtoupper($category);
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$data['category'] = $category;
		
		$data['soal'] = $this->soal->getAllTryOut($category);

		if ($this->input->post('keyword')) {
			$data['soal'] = $this->kuis->cariSoal();
		}

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('soal/tryout', $data);
		$this->load->view('templates/footer');
    }

	public function tambahTryOut(){
		$data['title'] = 'Tambah Try Out [' . strtoupper($this->input->get('category'))."]";
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['category'] = $this->input->get('category');
		
		
		$this->form_validation->set_rules('soal', 'Soal', 'required');

		$data['modul'] = $this->soal->getAllModul($this->input->post('category'));

		if ($this->form_validation->run() == false) {
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('soal/tambah_tryout', $data);
		$this->load->view('templates/footer');
		} else {
			$category = $this->input->post('id_category');
			$id_category = 0;
			if ($this->input->post('id_category') == 'khusus') {
				$id_category = 1;
			} else if ($this->input->post('id_category') == 'umum') {
				$id_category = 2;
			} else if ($this->input->post('id_category') == 'sd') {
				$id_category = 3;
			} else if ($this->input->post('id_category') == 'smp') {
				$id_category = 4;
			} else if ($this->input->post('id_category') == 'sma') {
				$id_category = 5;
			} else if ($this->input->post('id_category') == 'smk') {
				$id_category = 6;
			}

			// $data['id_category'] = $id_category;

			$frmData = [
				'to_category' => $id_category,
				'to_id_modul' => $this->input->post('modul',true),
				'to_kelas' => $this->input->post('kelas',true),
				'to_soal' => $this->input->post('soal',true),
				'to_a' => $this->input->post('a',true),
				'to_b' => $this->input->post('b',true),
				'to_c' => $this->input->post('c',true),
				'to_d' => $this->input->post('d',true),
				'to_e' => $this->input->post('e',true),
				'to_jawaban' => $this->input->post('kunci',true)
			];

			$this->soal->tambahTryOut($frmData);
			redirect('soal/tryout/'.$category);
		}
	}
}