<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'core/Master.php';

class Admin extends Master {

	 public function __construct() {
		parent::__construct();
		// Common functionality for all controllers
	}

	public function index(){
		$this->cek_session();
	 }

	public function dashboard(){ //role = 1
		
		if($this->session_destroy()==0){
			redirect('auth/login');
		}else{
			$data['count_acc_friend'] 	= $this->m_karyawan->count_acc_friend($this->id_karyawan());

				$where = array(
					'id_karyawan' => $this->id_karyawan()
				);
				// $data['last_login'] = $this->m_karyawan->last_login($auth->id_karyawan);
				$data['karyawan_online'] = $this->m_karyawan->get_karyawan_online();
				$data['ui_karyawan'] 	= $this->m_karyawan->get_ui_karaywan($where);
				$data['count_user'] 	= $this->m_karyawan->count_karyawan();
				$data['count_user_online'] 	= $this->m_karyawan->count_karyawan_online();
				$data['sidebar'] 		= $this->m_sidebar->data_sidebar($this->role_karyawan())->result();
				$data['notif_sidebar'] 	= $this->m_sidebar->notif_sidebar();
				$data['count_supplier'] = $this->m_data->count_supplier();
				


				$this->load->view('templates/header',$data);
				$this->load->view('templates/sidebar',$data);
				$this->load->view('v_dashboard',$data);
				$this->load->view('templates/footer');
		}
	}

	public function karyawan(){//role 1 dan 2
		
		
		$data['count_acc_friend'] 	= $this->m_karyawan->count_acc_friend($this->id_karyawan());

		$where = array(
			'id_karyawan' => $this->id_karyawan()
		);
		// $data['last_login'] = $this->m_karyawan->last_login($auth->id_karyawan);
		$data['karyawan_online'] = $this->m_karyawan->get_karyawan_online();
		$data['ui_karyawan'] 	= $this->m_karyawan->get_ui_karaywan($where);
		$data['count_user'] 	= $this->m_karyawan->count_karyawan();
		$data['count_user_online'] 	= $this->m_karyawan->count_karyawan_online();
		$data['sidebar'] 		= $this->m_sidebar->data_sidebar($this->role_karyawan())->result();
		$data['notif_sidebar'] 	= $this->m_sidebar->notif_sidebar();
		$data['karyawan'] = $this->m_karyawan->detail_karyawan_with_jabatan_where_id($where);
		


		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('detail/detail_karyawan',$data);
		$this->load->view('templates/footer');

			
		
	}

	public function sidebar(){
		
		if ($this->id_karyawan() === null) {
			redirect('auth/login');
		}else{

			if($this->role_karyawan() != 1){
				redirect('auth/login');
			}else{

				$data['count_acc_friend'] 	= $this->m_karyawan->count_acc_friend($this->id_karyawan());

				$where = array(
					'id_karyawan' => $this->id_karyawan()
				);
				$data['ui_karyawan'] 	= $this->m_karyawan->get_ui_karaywan($where);
				$data['sidebar'] = $this->m_sidebar->data_sidebar($this->role_karyawan())->result();
				$data['notif_sidebar'] = $this->m_sidebar->notif_sidebar();
				$data['parrent_sidebar'] = $this->m_sidebar->parrent_sidebar()->result();
				$data['count_user_online'] 	= $this->m_karyawan->count_karyawan_online();
				$data['karyawan_online'] = $this->m_karyawan->get_karyawan_online();
				




				$this->load->view('templates/header',$data);;
				$this->load->view('templates/sidebar',$data);
				$this->load->view('v_sidebar',$data);
				$this->load->view('modal/input_sidebar');
				$this->load->view('templates/footer');
			
			}
		}


		
	}

	public function tambah_sidebar(){

		if($this->role_karyawan() == 1){
			$desc 			= $this->input->post('desc_sidebar');
			$path 			= $this->input->post('path');
			$icon 			= $this->input->post('icon');
			$parrent 		= $this->input->post('parrent');
			$role 			= $this->input->post('role');
			$parrent_id 	= $this->input->post('parrent_id');

			$data = array(
				'desc_sidebar' 		=> $desc,
				'path' 				=> $path,
				'icon'				=> $icon,
				'show_to_role_karyawan'				=> $role,
				'parrent'			=> $parrent,
				'parrent_id'		=> $parrent_id,
				'status_sidebar'	=> 1
			);

			$this->m_sidebar->tambah_sidebar($data,'tb_sidebar');
			redirect('admin/sidebar');
		}else{
			redirect('auth/login_exist');
		}    
	}

	public function hapus_sidebar($id){
		if($this->role_karyawan() == 1){
			$data = array(
				'id_sidebar' => $id
			);
	
			if($this->m_sidebar->hapus_sidebar($data,'tb_sidebar')){
				redirect('admin/sidebar');
			}else{
				echo "Error Coding Hapus Sidebar";
			}
		}else{
			redirect('auth/login_exist');
		}
	}

	public function home(){
		if ($this->id_karyawan() === null ) {
			redirect('auth/login');
		} else {

			if ($this->session->has_userdata('timeout') && time() > $this->session->userdata('timeout')) {
				// Sesuaikan operasi sesuai dengan sesi yang berakhir
				// Misalnya, melakukan logout atau membersihkan data sesi
				$this->session->unset_userdata('timeout');
				$this->session->sess_destroy();
				
				// Redirect atau melakukan operasi lain setelah sesi berakhir
				redirect('auth/login');
			}

			$where = array(
				'id_karyawan' => $this->id_karyawan()
			);
			// $data['last_login'] = $this->m_karyawan->last_login($auth->id_karyawan);
			$data['karyawan_online'] = $this->m_karyawan->get_karyawan_online();
			$data['ui_karyawan'] 	= $this->m_karyawan->get_ui_karaywan($where);
			$data['count_user'] 	= $this->m_karyawan->count_karyawan();
			$data['count_user_online'] 	= $this->m_karyawan->count_karyawan_online();
			$data['sidebar'] 		= $this->m_sidebar->data_sidebar($this->role_karyawan())->result();
			$data['notif_sidebar'] 	= $this->m_sidebar->notif_sidebar();
			$data['karyawan'] = $this->m_karyawan->detail_karyawan_with_jabatan_where_id($where);
			$data['count_acc_friend'] 	= $this->m_karyawan->count_acc_friend($this->id_karyawan());
			


			$this->load->view('templates/header',$data);
			$this->load->view('templates/sidebar',$data);
			$this->load->view('admin/karyawan/home',$data);
			$this->load->view('templates/footer');
		}	

	}

	public function datatables(){
		$where = array(
			'id_karyawan' => $this->id_karyawan()
		);

		$data['karyawan_online'] = $this->m_karyawan->get_karyawan_online();
		$data['ui_karyawan'] 	= $this->m_karyawan->get_ui_karaywan($where);
		$data['count_user'] 	= $this->m_karyawan->count_karyawan();
		$data['count_user_online'] 	= $this->m_karyawan->count_karyawan_online();
		$data['sidebar'] 		= $this->m_sidebar->data_sidebar($this->role_karyawan())->result();
		$data['notif_sidebar'] 	= $this->m_sidebar->notif_sidebar();
		$data['karyawan'] = $this->m_karyawan->detail_karyawan_with_jabatan_where_id($where);
		$data['jabatan'] = $this->m_karyawan->tampil_jabatan()->result();
		$data['count_acc_friend'] 	= $this->m_karyawan->count_acc_friend($this->id_karyawan());
		



		$this->load->view('templates/header',$data);
		$this->load->view('v_datatables',$data);
		$this->load->view('templates/footer');

	}

	public function data_jabatan(){
		$data = $this->m_karyawan->tampil_jabatan()->result();
		echo json_encode($data);
	}
}
