<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kuis extends CI_Controller {

	public function __construct(){
		parent::__construct();
		is_logged_in();
		$this->load->model('Kuis_model','kuis');
		
	}

	public function index(){
		$data['title'] = 'Kelola Soal';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		
		$data['soal'] = $this->kuis->getAllSoal();

		if ($this->input->post('keyword')) {
			$data['soal'] = $this->kuis->cariSoal();
		}

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('kuis/index', $data);
		$this->load->view('templates/footer');
	}

	public function tambahSoal(){
		$data['title'] = 'Tambah Soal';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		
		
		$this->form_validation->set_rules('soal', 'Soal', 'required');

		$data['modul'] = $this->kuis->getAllModul();

		if ($this->form_validation->run() == false) {
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('kuis/tambah', $data);
		$this->load->view('templates/footer');
		} else {
			$this->kuis->tambahSoal();
		}
	}

	public function ubahSoal($id=''){
		$data['title'] = 'Ubah Soal';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		
		
		$this->form_validation->set_rules('soal', 'Soal', 'required');

		$data['modul'] = $this->kuis->getAllModul();
		$data['soal'] = $this->kuis->getSoalById($id);

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('kuis/ubahSoal', $data);
			$this->load->view('templates/footer');
			} else {
				$this->kuis->ubahSoal();
				redirect('kuis');
			}
	}

	public function hapusSoal($id=''){
		$this->db->where('sl_id', $id);
		$this->db->delete('soal');
		
		redirect('kuis');
	}

	public function materi(){
		$data['title'] = 'Materi';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['materi'] = $this->kuis->getAllMateri();

		if ($this->input->post('keyword')) {
			$data['materi'] = $this->kuis->cariMateri();
		}

		$data['modul'] = $this->kuis->getAllModul();
		
		//$this->form_validation->set_rules('soal', 'Soal', 'required');
		
		//if ($this->form_validation->run() == false) {
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('kuis/materi', $data);
		$this->load->view('templates/footer');
		// } else {
		// 	$this->kuis->tambahMateri();
		// }
	}

	public function ubahMateri($id){
		$data['title'] = 'Materi';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['materi'] = $this->kuis->getMateriById($id);

		// var_dump($data['materi']);

		// if ($this->input->post('keyword')) {
		// 	$data['materi'] = $this->kuis->cariMateri();
		// }

		$data['modul'] = $this->kuis->getAllModul();
		
		$this->form_validation->set_rules('modul', 'Modul', 'required');

		if ($this->form_validation->run() == false) {
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('kuis/ubahMateri', $data);
		$this->load->view('templates/footer');
		} else {
			$data = [
            	'mt_category' => $this->input->post('category', true),
				'mt_jenis' => $this->input->post('jenis', true),
				'mt_modul' => $this->input->post('modul', true),
				'mt_notes' => $this->input->post('keterangan', true)
            ];

			$this->db->where('mt_id',$id);
			$this->db->update('materi',$data);

			$config['upload_path'] = './assets/materi/'.$this->input->post('jenis').'/'.$this->input->post('modul');
			$config['allowed_types'] = 'pdf|mp4|jpeg|png|jpg';
			$config['max_size'] = 100000;

			$this->load->library('upload', $config);
 
			if (!$this->upload->do_upload('profile_pic')) 
			{
				// echo "Gagal Upload";
				$error = array('error' => $this->upload->display_errors());
				
			} else 
			{
				$data = array('image_metadata' => $this->upload->data());
				// var_dump($data);
				// echo "Berhasil Upload";

				$data = [
					'mt_file' => $data['image_metadata']['file_name']
				];
	
				$this->db->where('mt_id',$id);
				$this->db->update('materi',$data);

					$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Berhasil Upload Dokumen!</div>');

			}

			$config['upload_path'] = '';

			$configThumb['upload_path'] = './assets/img';
				// $configThumb['allowed_types'] = 'jpg|png|jpeg|PNG|JPG';
				$configThumb['max_size'] = 5000;
	
					$this->load->library('upload', $configThumb);
	
					if (!$this->upload->do_upload('thumbnail'))
					{
						$error = array('error1' => $this->upload->display_errors());
						// $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Gagal Upload Thumnail! ('. $error['error'].')</div>');
						// var_dump($error);
					} else {
						$dataTumb = array('image_metadata' => $this->upload->data());

						$data = [
							'mt_video_tumb' => $dataTumb['image_metadata']['file_name']
						];
			
						$this->db->where('mt_id',$id);
						$this->db->update('materi',$data);
						// var_dump($dataTumb);
					}

			redirect('kuis/materi');
		}
	}

	public function hapusMateri($id,$jenis,$modul,$file){
		$data['del_path'] = './assets/materi/'.$jenis.'/'.$modul.'/'.$file;

		if (file_exists($data['del_path'])){
			// echo 'hapus';
			unlink($data['del_path']);
			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Berhasil Hapus Dokumen!</div>');
		}
		
		if (file_exists($data['del_path'])){
			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Gagal Hapus Dokumen!</div>');
		} else{
			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Berhasil Hapus Dokumen!</div>');
		}

		$this->db->where('mt_id', $id);
		$this->db->delete('materi');
		
		redirect('kuis/materi');
	}

	public function upload() 
    {
    	$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $config['upload_path'] = './assets/materi/'.$this->input->post('jenis').'/'.$this->input->post('modul');
        $config['allowed_types'] = 'pdf|mp4|jpeg|png|jpg|mkv';
        $config['max_size'] = 10000000;

        // folder untuk dokumen
		if((file_exists('./assets/materi/'.$this->input->post('jenis').'/'.$this->input->post('modul')))&&(is_dir('./assets/materi/'.$this->input->post('jenis').'/'.$this->input->post('modul')))) { 
		 } else { 
		 	mkdir('./assets/materi/'.$this->input->post('jenis').'/'.$this->input->post('modul'));
		}
 
 
        $this->load->library('upload', $config);
 
        if (!$this->upload->do_upload('profile_pic')) 
        {
        	// echo "Gagal Upload";
			$error = array('error' => $this->upload->display_errors());

			$disError = "";

			if (strpos($error,"not select a file") > 0 ) {
				$disError = "Ukuran File Maksimal 128MB";
			} else if ( strpos($error,"filetype")> 0) {
				$disError = "Format File Yang di dukung : pdf,mp4,jpeg,png,jpg";
			}

			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Gagal Upload Dokumen! ('. $disError.')</div>');
			
			// var_dump($error);
			// echo $error['error'];
			redirect('kuis/materi');
        } 
        else 
        {
            $data = array('image_metadata' => $this->upload->data());
			// var_dump($data);
            // echo "Berhasil Upload";

			$configThumb['upload_path'] = './assets/materi/thumbnail/';
			// $configThumb['allowed_types'] = 'jpg|png|jpeg|PNG|JPG';
			$configThumb['max_size'] = 5000;

				$this->load->library('upload', $configThumb);

				if (!$this->upload->do_upload('thumbnail'))
				{
					$error = array('error1' => $this->upload->display_errors());
					// $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Gagal Upload Thumnail! ('. $error['error'].')</div>');
					// var_dump($error);
				} else {
					$dataTumb = array('image_metadata' => $this->upload->data());
					// echo '<br>';
					// var_dump($dataTumb);
				}

				if (isset($dataTumb['image_metadata']['file_name'])){
					$thumb =  $dataTumb['image_metadata']['file_name'];
				} else {
					$thumb = '';
				}

            $data = [
            	'mt_category' => $this->input->post('category', true),
				'mt_jenis' => $this->input->post('jenis', true),
				'mt_modul' => $this->input->post('modul', true),
				'mt_file' => $data['image_metadata']['file_name'],
				'mt_notes' => $this->input->post('keterangan', true),
				'mt_video_tumb' => $thumb
            ];

			//$data = ['mt_video_tumb' => ''];

			// if (isset($dataTumb['image_metadata']['file_name'])){
			// 	$data = ['mt_video_tumb' => $dataTumb['image_metadata']['file_name']];
			// } else {
			// 	$data = ['mt_video_tumb' => ''];
			// }

			// var_dump($data);

			//echo $dataTumb['image_metadata']['file_name'];


            $this->db->insert('materi',$data);

            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Berhasil Upload Dokumen!</div>');
			redirect('kuis/materi');
            
        }

		// $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Berhasil Upload Dokumen!</div>');

        // redirect('kuis/materi');
    }

	public function hasilKuis(){
		$data['title'] = 'Hasil';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		
		// $data['pengaturan'] = $this->kuis->getAllPengaturan();
		// var_dump($data['pengaturan']);
		
		// $this->form_validation->set_rules('soal', 'Soal', 'required');

		// if ($this->form_validation->run() == false) {
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('kuis/hasilKuis', $data);
		$this->load->view('templates/footer');
		// } else {
		// 	$this->kuis->tambahMateri();
		// }
	}

	public function pengaturan(){
		$data['title'] = 'Pengaturan';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		
		$data['pengaturan'] = $this->kuis->getAllPengaturan();
		// var_dump($data['pengaturan']);

		$data['modul'] = $this->kuis->getAllModul();
		$data['jenis'] = $this->kuis->getAllJenis();
		
		// $this->form_validation->set_rules('soal', 'Soal', 'required');

		// if ($this->form_validation->run() == false) {
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('kuis/pengaturan', $data);
		$this->load->view('templates/footer');
		// } else {
		// 	$this->kuis->tambahMateri();
		// }
	}

	public function tambahModul(){
		$this->form_validation->set_rules('modulForm', 'Modul', 'required');

		if ($this->form_validation->run() == true) {
			// echo 'Tambah Modul';
			$data = [
				'md_modul' => $this->input->post('modulForm', true)
			];
			$this->db->insert('modul',$data);
		}

		redirect('kuis/pengaturan');
	}

	public function hapusModul($id){
		$this->db->where('md_id', $id);
		$this->db->delete('modul');
		
		redirect('kuis/pengaturan');
	}
	
	public function tambahJenis(){
		$this->form_validation->set_rules('jenis', 'Jenis', 'required');

		if ($this->form_validation->run() == true) {
			// echo 'Tambah Modul';
			$data = [
				'jm_jenis' => $this->input->post('jenis', true)
			];
			$this->db->insert('jenis_materi',$data);
		}

		redirect('kuis/pengaturan');
	}

	public function hapusJenis($id){
		$this->db->where('jm_id', $id);
		$this->db->delete('jenis_materi');

		redirect('kuis/pengaturan');
	}
}