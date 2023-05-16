<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Android extends CI_Controller {

	public function __construct(){
		parent::__construct();
		is_logged_in();
		$this->load->model('Android_model','android');
	}

    public function index() {
		$data['title'] = 'index';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		//echo "Admin";
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('android/index', $data);
		$this->load->view('templates/footer');
	}

    public function berita() {
		$data['title'] = 'Berita';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        
        $data['berita'] = $this->android->getAllBerita();
        // var_dump($data['berita']);  

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('android/berita', $data);
		$this->load->view('templates/footer');
	}

    public function tambahBerita() 
    {
    	$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $config['upload_path'] = './assets/img/berita/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = 5000;
 
        $this->load->library('upload', $config);
 
        if (!$this->upload->do_upload('profile_pic')) 
        {
        	// echo "Gagal Upload";
			$error = array('error' => $this->upload->display_errors());
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Gagal Upload Dokumen! ('. $error['error'].')</div>');
			
			//var_dump($error);	
			echo $error['error'];
        } 
        else 
        {
            $data = array('image_metadata' => $this->upload->data());
			// var_dump($data);
            // echo "Berhasil Upload";

            $data = [
            	'bt_judul' => $this->input->post('judul', true),
				'bt_konten' => $this->input->post('konten', true),
				'bt_gambar' => $data['image_metadata']['file_name'],
            ];
            $this->db->insert('berita',$data);
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Berhasil Upload Dokumen!</div>');
            
        }

        redirect('android/berita');
    }

    public function ubahBerita($id){
        $data['title'] = 'Berita';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        
        $data['berita'] = $this->android->getBeritaById($id);
        // var_dump($data['berita']);  

        $this->form_validation->set_rules('judul', 'Judul', 'required');

		if ($this->form_validation->run() == false) {
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('android/ubahBerita', $data);
		$this->load->view('templates/footer');
        } else {
            $data = [
            	'bt_judul' => $this->input->post('judul', true),
				'bt_konten' => $this->input->post('konten', true)
            ];

			$this->db->where('bt_id',$id);
			$this->db->update('berita',$data);

            $config['upload_path'] = './assets/img/berita/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = 5000;
            $this->load->library('upload', $config);
    
            if (!$this->upload->do_upload('profile_pic')) 
            {
                // echo "Gagal Upload";
                $error = array('error' => $this->upload->display_errors());
                // $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Gagal Tambah Slide Show! ('. $error['error'].')</div>');
                
                //var_dump($error);	
                echo $error['error'];
            } 
            else 
            {
                $data = array('image_metadata' => $this->upload->data());
                // var_dump($data);
                // echo "Berhasil Upload";

                $data = [
                    'bt_gambar' => $data['image_metadata']['file_name']
                ];
                $this->db->where('bt_id',$id);
			    $this->db->update('berita',$data);
                

                $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Berhasil Ubah Berita</div>');
                
            }

            redirect('android/berita');
        }
        
    }

    public function hapusBerita($id,$gambar){
        unlink('./assets/img/berita/'.$gambar);
        
        $this->db->where('bt_id', $id);
		$this->db->delete('berita');
		
		redirect('android/berita');
    }

    public function slideShow(){
        $data['title'] = 'Slide Show';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        
        $data['slideShow'] = $this->android->getAllSlider();
        // var_dump($data['berita']);  

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('android/slideShow', $data);
		$this->load->view('templates/footer');
    }

    public function tambahSlideShow() 
    {
    	$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $config['upload_path'] = './assets/img/header/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = 5000;
        // $config['file_name'] = $this->input->post('nama');
        
        // unlink($config['upload_path'].$this->input->post('nama'));
 
        $this->load->library('upload', $config);
 
        if (!$this->upload->do_upload('profile_pic')) 
        {
        	// echo "Gagal Upload";
			$error = array('error' => $this->upload->display_errors());
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Gagal Tambah Slide Show! ('. $error['error'].')</div>');
			
			//var_dump($error);	
			echo $error['error'];
        } 
        else 
        {
            $data = array('image_metadata' => $this->upload->data());
			// var_dump($data);
            // echo "Berhasil Upload";

            $data = [
            	'kh_judul' => $this->input->post('judul', true),
				'kh_nama' => $data['image_metadata']['file_name']
            ];
            $this->db->insert('konten_header',$data);
			

            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Berhasil Tambah Slide Show!</div>');
            
        }

        redirect('android/slideShow');
    }

    public function ubahSlideShow() 
    {
    	$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $config['upload_path'] = './assets/img/header/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = 5000;
        $config['file_name'] = $this->input->post('nama');
        
        unlink($config['upload_path'].$this->input->post('nama'));
 
        $this->load->library('upload', $config);
 
        if (!$this->upload->do_upload('profile_pic')) 
        {
        	// echo "Gagal Upload";
			$error = array('error' => $this->upload->display_errors());
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Gagal Ubah Slide Show! ('. $error['error'].')</div>');
			
			//var_dump($error);	
			echo $error['error'];
        } 
        else 
        {
            $data = array('image_metadata' => $this->upload->data());
			// var_dump($data);
            // echo "Berhasil Upload";

            // $data = [
            // 	'bt_judul' => $this->input->post('judul', true),
			// 	'bt_konten' => $this->input->post('konten', true),
			// 	'bt_gambar' => $data['image_metadata']['file_name'],
            // ];
            // $this->db->insert('berita',$data);
			

            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Berhasil Ubah Slide Show!</div>');
            
        }

        redirect('android/slideShow');
    }

    public function hapusSlideShow($id,$nama){
        unlink('./assets/img/header/'.$nama);
        
        $this->db->where('kh_id', $id);
		$this->db->delete('konten_header');
		
		redirect('android/slideShow');
    }

	public function Icon(){
        $data['title'] = 'Icon';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        
        $data['icon'] = $this->android->getAllIcon();
        // var_dump($data['berita']);  

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('android/icon', $data);
		$this->load->view('templates/footer');
    }

	public function ubahIcon() 
    {
    	$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $config['upload_path'] = './assets/img/android_icon/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = 5000;
        $config['file_name'] = $this->input->post('nama');
        
        unlink($config['upload_path'].$this->input->post('nama'));
 
        $this->load->library('upload', $config);
 
        if (!$this->upload->do_upload('profile_pic')) 
        {
        	// echo "Gagal Upload";
			$error = array('error' => $this->upload->display_errors());
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Gagal Ubah Icon! ('. $error['error'].')</div>');
			
        } 
        else 
        {
            $data = array('image_metadata' => $this->upload->data());
			

            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Berhasil Ubah Icon!</div>');
            
        }
        redirect('android/Icon');
    }

}

