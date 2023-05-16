<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct(){
		parent::__construct();
		is_logged_in();
		$this->load->model('Admin_model','admin');
	}

	public function index() {
		$data['title'] = 'Dashboard';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		//echo "Admin";
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('templates/footer');
	}

	public function role() {
		$data['title'] = 'Role';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$data['role'] = $this->db->get('user_role')->result_array();
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/role', $data);
		$this->load->view('templates/footer');
	}

	public function roleAccess($role_id) {
		$data['title'] = 'Role';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$data['role'] = $this->db->get_where('user_role',['id' => $role_id])->row_array();

		$this->db->where('id !=',1);
		$data['menu'] = $this->db->get('user_menu')->result_array();
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/role-access', $data);
		$this->load->view('templates/footer');
	}

	public function changeAccess(){
		$menu_id = $this->input->post('menuId');
		$role_id = $this->input->post('roleId');

		$data = [
			'role_id' => $role_id,
			'menu_id' => $menu_id
		];

		$result = $this->db->get_where('user_access_menu', $data);

		if($result->num_rows() < 1){
			$this->db->insert('user_access_menu', $data);
		} else {
			$this->db->delete('user_access_menu', $data);
		}

		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Access Changed</div>');
	}

	public function identitas(){
		$data['title'] = 'Identitas';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$data['is'] = $this->db->get_where('identitas',['is_id' => 1])->row_array();

			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/identitas', $data);
			$this->load->view('templates/footer');
	}

	public function ubahIdentitas (){
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		// $config['upload_path'] = './assets/img/';
        // $config['allowed_types'] = 'jpg|png';
        // $config['max_size'] = 1500;

        // $this->load->library('upload', $config);

        // $data = array('image_metadata' => $this->upload->data());
 		
 		// if (isset($data['image_metadata']['file_name'])){
 		// 	if (!$this->upload->do_upload('profile_pic')) 
	    //     {
		// 		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Gagal Ubah Identitas!</div>');
	    //     } 
	    //     else 
	    //     {
	    //         $data = array('image_metadata' => $this->upload->data());
	    //         $dataIdentitas = [
	    //         	'is_logo' => $data['image_metadata']['file_name']
	    //         ];

	    //         $this->db->where('is_id',1);
        // 		$this->db->update('identitas_surat',$dataIdentitas);
	            
	    //     }
 		// }


        // ubah identitas data
        $dataIdentitas = [
            	'is_nama' => $this->input->post('nama', true),
				'is_email' => $this->input->post('email', true),
				'is_no_telp' => $this->input->post('telp', true),
				'is_alamat' => $this->input->post('alamat', true)
            ];

        $this->db->where('is_id',1);
        $this->db->update('identitas',$dataIdentitas);

        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Berhasil Ubah Identitas!</div>');

        redirect('admin/identitas');
	}

	public function member(){
		$data['title'] = 'Member';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['member'] = $this->admin->getAllMember();
		// var_dump($data['member']);

		if ($this->input->post('keyword')) {
			$data['member'] = $this->admin->cariMember();
		}

		$this->form_validation->set_rules('nama', 'Nama', 'required');

		if ($this->form_validation->run() == false) {
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/member', $data);
		$this->load->view('templates/footer');
		} else {
			$data = [
            	'mb_nama' => $this->input->post('nama', true),
            	'mb_category' => $this->input->post('category', true),
            	'mb_no_hp' => $this->input->post('nohp', true),
            	'mb_email' => $this->input->post('email', true),
            	'mb_alamat' => $this->input->post('alamat', true),
            	'mb_password' => md5($this->input->post('password', true)),
            	'mb_is_active' => '0'
            ];
			$this->db->insert('member',$data);
			redirect('admin/member/'.$receipt);
		}
	}

	public function ubahStatusMember($id,$isActive){
		// echo $id;
		// echo $isActive;

		if ($isActive == 0){
			$lvActive = 1;
		} else if ($isActive == 1){
			$lvActive = 0;
		}

		$data = [
			'mb_is_active' => $lvActive
		];

		// echo '<br>';
		// echo $lvActive;

		$this->db->where('mb_id',$id);
		$this->db->update('member', $data);

		redirect('admin/member');

	}

	public function ahliHukum(){
		$data['title'] = 'Ahli Hukum';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['ahliHukum'] = $this->admin->getAllAhliHukum();
		// var_dump($data['member']);

		if ($this->input->post('keyword')) {
			$data['ahliHukum'] = $this->admin->cariAhliHukum();
		}

		$this->form_validation->set_rules('nama', 'Nama', 'required');

		if ($this->form_validation->run() == false) {
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/ahliHukum', $data);
		$this->load->view('templates/footer');
		} else {
			$data = [
            	'mb_nama' => $this->input->post('nama', true),
            	'mb_category' => 'AHLI HUKUM',
            	// 'mb_no_hp' => $this->input->post('nohp', true),
            	'mb_email' => $this->input->post('email', true),
            	'mb_alamat' => $this->input->post('alamat', true),
            	'mb_password' => md5($this->input->post('password', true)),
            	'mb_is_active' => '1'
            ];
			$this->db->insert('member',$data);
			redirect('admin/ahliHukum/'.$receipt);
		}
	}

	public function ubahMember($id){
		$data['title'] = 'Ubah ';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		
		$data['member'] = $this->admin->getMemberById($id);
		// var_dump($data['member']);

		$this->form_validation->set_rules('nama', 'Nama', 'required');

		if ($this->form_validation->run() == false) {
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/ubahMember', $data);
		$this->load->view('templates/footer');
		} else {
			$this->admin->ubahMember();
		}

	}

	public function aksesAhliHukum($id){
		$data['title'] = 'Member';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$data['member'] = $this->admin->getMemberById($id);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/aksesAhliHukum', $data);
		$this->load->view('templates/footer');
	}

	public function hapusMember($id){
		$this->db->where('mb_id', $id);
		$this->db->delete('member');
		
		redirect('admin/member');
	}

	public function hapusAhliHukum($id){
		$this->db->where('mb_id', $id);
		$this->db->delete('member');
		
		redirect('admin/ahliHukum');
	}

	// CHAT MESSAGE
    public function Pesan($receipt){
    	$data['title'] = 'Pesan';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['pesan'] = $this->db->query("select * from (select id,message_content as pesan1,'' as pesan2,username,message_time,recipient from user_chat_messages where username = '".$data['user']['username']."' and recipient = '".$receipt."' union all select id,'',message_content,username,message_time,recipient from user_chat_messages where username = '".$receipt."' and recipient = '".$data['user']['username']."' ) pesan order by message_time asc")->result_array();
		// var_dump($data['pesan']);
		$data['receipt'] = $receipt;
		$data['nama'] = $this->db->get_where('member',['mb_no_hp' => $receipt])->row_array();
		// var_dump($data['nama']);

		// $data['penduduk'] = $this->penduduk->getAllData();

		$this->form_validation->set_rules('inputPesan', 'NIK', 'required');

		if ($this->form_validation->run() == false) {
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('kuis/pesan', $data);
		$this->load->view('templates/footer');
		} else {
			$dataDokumen = [
            	'message_content' => $this->input->post('inputPesan', true),
            	'username' => $data['user']['username'],
            	'recipient' => $this->input->post('inputRcpt', true)
            ];
			$this->db->insert('user_chat_messages',$dataDokumen);
			redirect('admin/pesan/'.$receipt);
		}
    }

	public function jmlPesan(){
		$data['jml'] = $this->admin->getTotalPesan();
		echo json_encode( array('jmlPesan' => $data['jml']));
	}

	public function lastPesan(){
		$data['lastpesan'] = $this->admin->getLastPesan();
		echo json_encode( $data['lastpesan']);
	}

	public function android(){
		$data['title'] = 'Android';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$data['berita'] = $this->admin->getAllBerita();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/android', $data);
		$this->load->view('templates/footer');
	}

}