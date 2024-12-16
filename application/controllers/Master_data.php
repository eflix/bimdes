<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_data extends CI_Controller {

	public function __construct(){
		parent::__construct();
		// is_logged_in();
        $this->load->model('Master_data_model','master_data');
	}

	public function index(){
        redirect(base_url('master_data/mapel'));
	}


	public function mapel(){
		$data['title'] = 'Mata Pelajaran';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['mapel'] = $this->master_data->getAllMapel();

        $this->form_validation->set_rules('mapel', 'Mapel', 'required');

		if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('master_data/mapel', $data);
            $this->load->view('templates/footer');
        } else {
            $dataFrm = [
                'mata_pelajaran' => $this->input->post('mapel', true)
            ];

            $this->master_data->tambahMapel($dataFrm);
            redirect(base_url('master_data/mapel'));
        }
	}

}