<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_data extends CI_Controller {

	public function __construct(){
		parent::__construct();
		// is_logged_in();
	}

	public function index(){
        redirect(base_url('master_data/mapel'));
		// $data['title'] = 'My Profile';
		// $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		
		// $this->load->view('templates/header', $data);
		// $this->load->view('templates/sidebar', $data);
		// $this->load->view('templates/topbar', $data);
		// $this->load->view('user/index', $data);
		// $this->load->view('templates/footer');
	}


	public function mapel(){
		$data['title'] = 'My Profile';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('master_data/mapel', $data);
		$this->load->view('templates/footer');
	}

}