<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokumen extends CI_Controller {

	public function __construct(){
		parent::__construct();
		// is_logged_in();
		// $this->load->model('Dokumen_model','dokumen');
		// $this->load->library('pdf');
	}

	public function index(){
	// 	$data['title'] = 'Daftar Dokumen';
	// 	$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

	// 	$data['dokumen'] = $this->dokumen->getAllData();
		
	// 	$this->load->view('templates/header', $data);
	// 	$this->load->view('templates/sidebar', $data);
	// 	$this->load->view('templates/topbar', $data);
	// 	$this->load->view('dokumen/index', $data);
	// 	$this->load->view('templates/footer');
	// }
		$this->load->view('dokumen/imageupload_form');
	}

	public function upload() 
    {
        $config['upload_path'] = './upload/';
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 2000;
 
 
        $this->load->library('upload', $config);
 
        if (!$this->upload->do_upload('profile_pic')) 
        {
            $error = array('error' => $this->upload->display_errors());
 
            $this->load->view('dokumen/imageupload_form', $error);
        } 
        else 
        {
            $data = array('image_metadata' => $this->upload->data());
 
            $this->load->view('dokumen/imageupload_success', $data);
        }
    }

}