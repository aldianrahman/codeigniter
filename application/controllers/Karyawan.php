<?php

    class Karyawan extends CI_Controller{

        public function index(){

            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('v_karyawan');
            $this->load->view('templates/footer');
            

        }

        public function list(){
            $data['karyawan'] = $this->m_karyawan->get_karyawan_with_jabatan();
            $data['jabatan'] = $this->m_karyawan->tampil_jabatan()->result();
            
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('v_karyawan',$data);
            $this->load->view('templates/footer');
            $this->load->view('modal/input_karyawan');
        }

        public function jabatan(){

            $data['jabatan'] = $this->m_karyawan->tampil_jabatan()->result();

            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('v_jabatan',$data);
            $this->load->view('templates/footer');
            $this->load->view('modal/input_jabatan');

        }

        public function tambah_karyawan(){
            $nama       = $this->input->post('nama_karyawan');
            $tgl_lahir  = $this->input->post('tgl_lahir');
            $alamat     = $this->input->post('alamat_karyawan');
            $jabatan    = $this->input->post('kode_jabatan');

            $data       = array(
                'nama_karyawan'     => $nama,
                'tgl_lahir'         => $tgl_lahir,
                'alamat_karyawan'   => $alamat,
                'kode_jabatan'      => $jabatan
            );

            $this->m_karyawan->input_data($data,'tb_karyawan');
            redirect('karyawan/list');
        }

        public function tambah_jabatan(){

            $jabatan    = $this->input->post('desc_jabatan');
            $gaji       = $this->input->post('gaji_jabatan');

            $data       = array(
                'desc_jabatan' => $jabatan,
                'gaji_jabatan' => $gaji
            );

            $this->m_karyawan->input_jabatan($data,'tb_jabatan');
            redirect('karyawan/jabatan');

        }

    }

?>