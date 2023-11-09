<?php

    class M_karyawan extends CI_Model{

        public function tampil_data(){

            return $this->db->get('tb_karyawan');

        }

        public function tampil_jabatan(){

            return $this->db->get('tb_jabatan');

        }

        public function get_karyawan_with_jabatan(){

            $this->db->select('tb_karyawan.id_karyawan, tb_karyawan.nama_karyawan, tb_karyawan.tgl_lahir, tb_karyawan.alamat_karyawan, tb_karyawan.kode_jabatan, tb_jabatan.desc_jabatan');
            $this->db->from('tb_karyawan');
            $this->db->join('tb_jabatan', 'tb_karyawan.kode_jabatan = tb_jabatan.kode_jabatan', 'inner');
            $query = $this->db->get();
            return $query->result();

        }

        public function input_data($data){
            $this->db->insert('tb_karyawan', $data);
   
        }

        public function input_jabatan($data){
            $this->db->insert('tb_jabatan',$data);
        }

        public function count_karyawan(){

            return $this->db->count_all('tb_karyawan');

        }

    }

?>