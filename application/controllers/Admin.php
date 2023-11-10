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
	public function dashboard()
	{

		$data['count_user'] = $this->m_karyawan->count_karyawan();
		$data['sidebar'] = $this->m_sidebar->data_sidebar()->result();
		$data['notif_sidebar'] = $this->m_sidebar->notif_sidebar();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar',$data);
		$this->load->view('v_dashboard',$data);
        $this->load->view('templates/footer');
        
	}

	public function sidebar(){
		$data['sidebar'] = $this->m_sidebar->data_sidebar()->result();
		$data['notif_sidebar'] = $this->m_sidebar->notif_sidebar();
		$data['parrent_sidebar'] = $this->m_sidebar->parrent_sidebar()->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar',$data);
		$this->load->view('v_sidebar',$data);
		$this->load->view('modal/input_sidebar');
        $this->load->view('templates/footer');
	}

	public function tambah_sidebar(){

		$desc 			= $this->input->post('desc_sidebar');
		$path 			= $this->input->post('path');
		$icon 			= $this->input->post('icon');
		$parrent 		= $this->input->post('parrent');
		$parrent_id 	= $this->input->post('parrent_id');

		$data = array(
			'desc_sidebar' 		=> $desc,
			'path' 				=> $path,
			'icon'				=> $icon,
			'parrent'			=> $parrent,
			'parrent_id'		=> $parrent_id,
			'status_sidebar'	=> 1
		);

		$this->m_sidebar->tambah_sidebar($data,'tb_sidebar');
		redirect('admin/sidebar');

	}

	public function hapus_sidebar($id){

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
