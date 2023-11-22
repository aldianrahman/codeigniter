<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	 public function __construct()
	 {
		 parent::__construct();
		 $id_karyawan = $this->session->userdata('id_karyawan');
	 }

	 public function index(){

		$id_karyawan = $this->session->userdata('id_karyawan');
		$role_user = $this->session->userdata('role_user');

		if($role_user == 1){
			redirect('admin/dashboard');
		}else{
			redirect('admin/home');
		}

	 }

	public function dashboard()
	{
		$id_karyawan = $this->session->userdata('id_karyawan');
		$role_user = $this->session->userdata('role_user');
		if ($id_karyawan === null ) {
			redirect('auth/login');
		} else {

			if($role_user != 1){
				redirect('auth/login');
			}else{

				if ($this->session->has_userdata('timeout') && time() > $this->session->userdata('timeout')) {
					// Sesuaikan operasi sesuai dengan sesi yang berakhir
					// Misalnya, melakukan logout atau membersihkan data sesi
					$this->session->unset_userdata('timeout');
					$this->session->sess_destroy();
					
					// Redirect atau melakukan operasi lain setelah sesi berakhir
					redirect('auth/login');
				}

				$data['count_acc_friend'] 	= $this->m_karyawan->count_acc_friend($id_karyawan);

				$where = array(
					'id_karyawan' => $id_karyawan
				);
				// $data['last_login'] = $this->m_karyawan->last_login($auth->id_karyawan);
				$data['karyawan_online'] = $this->m_karyawan->get_karyawan_online();
				$data['ui_karyawan'] 	= $this->m_karyawan->get_ui_karaywan($where);
				$data['count_user'] 	= $this->m_karyawan->count_karyawan();
				$data['count_user_online'] 	= $this->m_karyawan->count_karyawan_online();
				$data['sidebar'] 		= $this->m_sidebar->data_sidebar($role_user)->result();
				$data['notif_sidebar'] 	= $this->m_sidebar->notif_sidebar();
				$data['count_supplier'] = $this->m_data->count_supplier();

				$this->load->view('templates/header',$data);
				$this->load->view('templates/sidebar',$data);
				$this->load->view('v_dashboard',$data);
				$this->load->view('templates/footer');

			}
		}		
	}

	public function karyawan()
	{
		$id_karyawan = $this->session->userdata('id_karyawan');
		$role_user = $this->session->userdata('role_user');
		if ($id_karyawan === null ) {
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

			$data['count_acc_friend'] 	= $this->m_karyawan->count_acc_friend($id_karyawan);

			$where = array(
				'id_karyawan' => $id_karyawan
			);
			// $data['last_login'] = $this->m_karyawan->last_login($auth->id_karyawan);
			$data['karyawan_online'] = $this->m_karyawan->get_karyawan_online();
			$data['ui_karyawan'] 	= $this->m_karyawan->get_ui_karaywan($where);
			$data['count_user'] 	= $this->m_karyawan->count_karyawan();
			$data['count_user_online'] 	= $this->m_karyawan->count_karyawan_online();
			$data['sidebar'] 		= $this->m_sidebar->data_sidebar($role_user)->result();
			$data['notif_sidebar'] 	= $this->m_sidebar->notif_sidebar();
			$data['karyawan'] = $this->m_karyawan->detail_karyawan_with_jabatan_where_id($where);

			$this->load->view('templates/header',$data);
			$this->load->view('templates/sidebar',$data);
			$this->load->view('detail/detail_karyawan',$data);
			$this->load->view('templates/footer');
		}		
	}

	public function sidebar(){

		$id_karyawan = $this->session->userdata('id_karyawan');
		$role_user = $this->session->userdata('role_user');
		if ($id_karyawan === null) {
			redirect('auth/login');
		}else{

			if($role_user != 1){
				redirect('auth/login');
			}else{

				$data['count_acc_friend'] 	= $this->m_karyawan->count_acc_friend($id_karyawan);

				$where = array(
					'id_karyawan' => $id_karyawan
				);
				$data['ui_karyawan'] 	= $this->m_karyawan->get_ui_karaywan($where);
				$data['sidebar'] = $this->m_sidebar->data_sidebar($role_user)->result();
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

		$id_karyawan = $this->session->userdata('id_karyawan');
		if ($id_karyawan === null) {
			redirect('auth/login');
		}else{

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

		}

		

	}

	public function hapus_sidebar($id){

		$id_karyawan = $this->session->userdata('id_karyawan');
		if ($id_karyawan === null) {
					redirect('auth/login');
				}else{
					$data = array(
						'id_sidebar' => $id
					);
			
					if($this->m_sidebar->hapus_sidebar($data,'tb_sidebar')){
						redirect('admin/sidebar');
					}else{
						echo "Error Coding Hapus Sidebar";
					}
				}

	}

	public function home(){

		$id_karyawan = $this->session->userdata('id_karyawan');
		$role_user = $this->session->userdata('role_user');
		if ($id_karyawan === null ) {
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
				'id_karyawan' => $id_karyawan
			);
			// $data['last_login'] = $this->m_karyawan->last_login($auth->id_karyawan);
			$data['karyawan_online'] = $this->m_karyawan->get_karyawan_online();
			$data['ui_karyawan'] 	= $this->m_karyawan->get_ui_karaywan($where);
			$data['count_user'] 	= $this->m_karyawan->count_karyawan();
			$data['count_user_online'] 	= $this->m_karyawan->count_karyawan_online();
			$data['sidebar'] 		= $this->m_sidebar->data_sidebar($role_user)->result();
			$data['notif_sidebar'] 	= $this->m_sidebar->notif_sidebar();
			$data['karyawan'] = $this->m_karyawan->detail_karyawan_with_jabatan_where_id($where);
			$data['count_acc_friend'] 	= $this->m_karyawan->count_acc_friend($id_karyawan);

			$this->load->view('templates/header',$data);
			$this->load->view('templates/sidebar',$data);
			$this->load->view('admin/karyawan/home',$data);
			$this->load->view('templates/footer');
		}	

	}

	public function datatables(){

		$id_karyawan = $this->session->userdata('id_karyawan');
		$role_user = $this->session->userdata('role_user');


		$where = array(
			'id_karyawan' => $id_karyawan
		);

		$data['karyawan_online'] = $this->m_karyawan->get_karyawan_online();
		$data['ui_karyawan'] 	= $this->m_karyawan->get_ui_karaywan($where);
		$data['count_user'] 	= $this->m_karyawan->count_karyawan();
		$data['count_user_online'] 	= $this->m_karyawan->count_karyawan_online();
		$data['sidebar'] 		= $this->m_sidebar->data_sidebar($role_user)->result();
		$data['notif_sidebar'] 	= $this->m_sidebar->notif_sidebar();
		$data['karyawan'] = $this->m_karyawan->detail_karyawan_with_jabatan_where_id($where);
		$data['jabatan'] = $this->m_karyawan->tampil_jabatan()->result();
		$data['count_acc_friend'] 	= $this->m_karyawan->count_acc_friend($id_karyawan);


		$this->load->view('templates/header',$data);
		$this->load->view('v_datatables',$data);
		$this->load->view('templates/footer');

	}
}
