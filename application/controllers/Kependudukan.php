<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kependudukan extends CI_Controller {

	public function __construct(){
		parent::__construct();
		is_logged_in();
		$this->load->model('Kependudukan_model','penduduk');
	}

	// Penduduk
	public function index(){
		$data['title'] = 'Data Penduduk';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		

		$data['penduduk'] = $this->penduduk->getAllData();

		if ($this->input->post('keyword')) {
			$data['penduduk'] = $this->penduduk->cariPenduduk();
		}
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('kependudukan/index', $data);
		$this->load->view('templates/footer');
	}

	public function tambah(){
		$data['title'] = 'Tambah Data Penduduk';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$data['penduduk'] = $this->penduduk->getAllData();
		$data['nama'] = $this->session->userdata('name');

		$this->form_validation->set_rules('nik', 'NIK', 'required|trim');
		$this->form_validation->set_rules('nokk', 'No KK', 'required|trim');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('password', 'Password 1', 'required|trim|matches[password1]',['matches' => 'Password tidak sama']);
		$this->form_validation->set_rules('password1', 'Password 2', 'required|trim|matches[password]');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('kependudukan/tambah', $data);
			$this->load->view('templates/footer');
		} else {
			$this->penduduk->addPenduduk();
			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Penduduk Berhasil Ditambahkan!</div>');

			if($_POST['password'] <> ''){
				// echo "Tambah User";
				$this->penduduk->tambahUser();
				$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Akun Berhasil Ditambahkan!</div>');
			}
			redirect('kependudukan');
		}
	}

	public function ubahPenduduk($nik){
		$data['title'] = 'Ubah Data Penduduk';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$data['penduduk'] = $this->penduduk->getPendudukById($nik);
		$data['fUser'] = $this->penduduk->getUserById($nik);

		if (empty($data['fUser'])){
			$data['flagUser'] = 'Belum Ada Akun';
		} else {
			$data['flagUser'] = 'Sudah Ada Akun';
		}

		//echo $nik;

		$this->form_validation->set_rules('nokk', 'NIK', 'required');
		// $this->form_validation->set_rules('nama', 'Nama', 'required');
		// $this->form_validation->set_rules('password', 'Password 1', 'required|trim|matches[password1]',['matches' => 'Password tidak sama']);
		// $this->form_validation->set_rules('password1', 'Password 2', 'required|trim|matches[password]');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('kependudukan/ubah', $data);
			$this->load->view('templates/footer');
		} else {
			$this->penduduk->ubahPenduduk($nik);
		}
	}

	public function hapusPenduduk($nik){
		$this->penduduk->hapusPenduduk($nik);
	}

	// Dokumen
	public function dokumen($nik){
		$data['title'] = 'Daftar Dokumen';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$data['dokumen'] = $this->penduduk->getDokumenByNik($nik);
		$data['dp'] = $this->penduduk->getPendudukById($nik);
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('dokumen/index', $data);
		$this->load->view('templates/footer');
	}

	public function tambahDokumen(){
		$data['title'] = 'Daftar Dokumen';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('dokumen/tambah', $data);
		$this->load->view('templates/footer');
	}

	public function upload() 
    {
    	$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $config['upload_path'] = './assets/dokumen/'.$this->input->post('nik').'/';
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 2000;

        // folder untuk dokumen
		if((file_exists('./assets/dokumen/'.$this->input->post('nik')))&&(is_dir('./assets/dokumen/'.$this->input->post('nik')))) { 
		 } else { 
		 	mkdir('./assets/dokumen/'.$this->input->post('nik'));
		}
 
 
        $this->load->library('upload', $config);
 
        if (!$this->upload->do_upload('profile_pic')) 
        {
			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Gagal Upload Dokumen!</div>');
        } 
        else 
        {
            $data = array('image_metadata' => $this->upload->data());

            $dataDokumen = [
            	'dd_dp_nik' => $this->input->post('nik', true),
				'dd_jenis' => $this->input->post('jenisSurat', true),
				'dd_dokumen' => $data['image_metadata']['file_name'],
            ];

            // var_dump($dataDokumen);
            // var_dump(array('image_metadata' => $this->upload->data()));
            // echo $data['image_metadata']['file_name'];
            $this->db->insert('data_dokumen',$dataDokumen);

            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Berhasil Upload Dokumen!</div>');
            
        }

        redirect('Kependudukan/dokumen/'. $this->input->post('nik'));
    }

    public function hapusDokumen($id,$nik){
    	$this->db->where('dd_id', $id);
		$this->db->delete('data_dokumen');

		redirect('Kependudukan/dokumen/'. $nik);
    }

    // CHAT MESSAGE
    public function Pesan($receipt){
    	$data['title'] = 'Pesan';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['pesan'] = $this->db->query("select * from (select id,message_content as pesan1,'' as pesan2,username,message_time,recipient from user_chat_messages where username = '".$data['user']['username']."' and recipient = '".$receipt."' union all select id,'',message_content,username,message_time,recipient from user_chat_messages where username = '".$receipt."' and recipient = '".$data['user']['username']."' ) pesan order by message_time asc")->result_array();
		// var_dump($data['pesan']);
		$data['receipt'] = $receipt;

		$data['penduduk'] = $this->penduduk->getAllData();

		$this->form_validation->set_rules('inputPesan', 'NIK', 'required');

		if ($this->form_validation->run() == false) {
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('kependudukan/pesan', $data);
		$this->load->view('templates/footer');
		} else {
			$dataDokumen = [
            	'message_content' => $this->input->post('inputPesan', true),
            	'username' => $data['user']['username'],
            	'recipient' => $this->input->post('inputRcpt', true)
            ];
			$this->db->insert('user_chat_messages',$dataDokumen);
			redirect('Kependudukan/pesan/'.$receipt);
		}
    }


}