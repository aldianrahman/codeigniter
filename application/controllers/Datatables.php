<?php

    class Datatables extends CI_Controller
    {
        public function __construct()
        {  
            parent::__construct();
            $this->load->model('M_Datatables');
        }

        public function index()
        {
            $this->load->view('home');
        }

        public function onetable()
        {
            $this->load->view('onetable');

        }

        public function tablewhere()
        {
            $this->load->view('tablewhere');

        }

        public function tablequery()
        {
            $this->load->view('tablequery');

        }

        function view_data()
        {
            $tables = "tb_karyawan";
            $search = array(
                'id_karyawan',
                'nik_karyawan',
                'email_karyawan',
                'nama_karyawan',
                'tgl_lahir',
                'alamat_karyawan',
                'kode_jabatan',
                'kode_status',
                'jenis_kelamin',
                'foto_karyawan',
                'password',
                'role_user',
                'created_at',
                'created_by',
                'updated_at',
                'updated_by',
                'last_login',
                'status_login',
            );
            // jika memakai IS NULL pada where sql
            $isWhere = null;
            $where  = array('kode_status' => 1);
            // $isWhere = 'artikel.deleted_at IS NULL';
            header('Content-Type: application/json');
            echo $this->M_Datatables->get_tables_where($tables,$search,$where,$isWhere);
        }

        function view_data_where()
        {
            $tables = "artikel";
            $search = array('judul','kategori','penulis','tgl_posting');
            $where  = array('kategori' => 'php');
            // jika memakai IS NULL pada where sql
            $isWhere = null;
            // $isWhere = 'artikel.deleted_at IS NULL';
            header('Content-Type: application/json');
            echo $this->M_Datatables->get_tables_where($tables,$search,$where,$isWhere);
        }

        function view_data_query()
        {
            $query  = "SELECT kategori.nama_kategori AS nama_kategori, subkat.* FROM subkat 
                       JOIN kategori ON subkat.id_kategori = kategori.id_kategori";
            $search = array('nama_kategori','subkat','tgl_add');
            $where  = null; 
            // $where  = array('nama_kategori' => 'Tutorial');
            
            // jika memakai IS NULL pada where sql
            $isWhere = null;
            // $isWhere = 'artikel.deleted_at IS NULL';
            header('Content-Type: application/json');
            echo $this->M_Datatables->get_tables_query($query,$search,$where,$isWhere);
        }
    }
?>