<?php

    class M_karyawan extends CI_Model{

        public function tampil_data(){

            return $this->db->get('tb_karyawan');

        }

        public function tampil_jabatan(){

            return $this->db->get('tb_jabatan');

        }

        public function get_karyawan_with_jabatan(){

            $status_karyawan = 1;

            $this->db->select('tb_karyawan.id_karyawan,tb_karyawan.nik_karyawan,tb_karyawan.jenis_kelamin,tb_karyawan.email_karyawan, , tb_karyawan.nama_karyawan, tb_karyawan.tgl_lahir, tb_karyawan.alamat_karyawan, tb_karyawan.kode_jabatan, tb_jabatan.desc_jabatan');
            $this->db->from('tb_karyawan');
            $this->db->join('tb_jabatan', 'tb_karyawan.kode_jabatan = tb_jabatan.kode_jabatan', 'inner');
            $this->db->where('kode_status', $status_karyawan);
            $query = $this->db->get();
            return $query->result();

        }

        public function get_karyawan_with_jabatan_where_id($where){

            $status_karyawan = 1;

            $this->db->select('tb_karyawan.id_karyawan,tb_karyawan.foto_karyawan,tb_karyawan.kode_status,tb_karyawan.nik_karyawan,tb_karyawan.jenis_kelamin,tb_karyawan.email_karyawan, , tb_karyawan.nama_karyawan, tb_karyawan.tgl_lahir, tb_karyawan.alamat_karyawan, tb_karyawan.kode_jabatan, tb_jabatan.desc_jabatan');
            $this->db->from('tb_karyawan');
            $this->db->join('tb_jabatan', 'tb_karyawan.kode_jabatan = tb_jabatan.kode_jabatan', 'inner');
            $this->db->where($where);
            $query = $this->db->get();
            return $query->result();

        }

        public function detail_karyawan_with_jabatan_where_id($where){

            $status_karyawan = 1;

            $this->db->select('tb_karyawan.id_karyawan,tb_karyawan.foto_karyawan,tb_jabatan.gaji_jabatan,tb_karyawan.kode_status,tb_karyawan.nik_karyawan,tb_karyawan.jenis_kelamin,tb_karyawan.email_karyawan, , tb_karyawan.nama_karyawan, tb_karyawan.tgl_lahir, tb_karyawan.alamat_karyawan, tb_karyawan.kode_jabatan, tb_jabatan.desc_jabatan');
            $this->db->from('tb_karyawan');
            $this->db->join('tb_jabatan', 'tb_karyawan.kode_jabatan = tb_jabatan.kode_jabatan', 'inner');
            $this->db->where($where);
            $query = $this->db->get();
            return $query->row();

        }

        public function input_data($data){
            $this->db->insert('tb_karyawan', $data);
   
        }

        public function input_jabatan($data){
            $this->db->insert('tb_jabatan',$data);
        }

        public function count_karyawan() {
            $where = array(
                'kode_status' => 1
            );
        
            $this->db->where($where);
            return $this->db->count_all_results('tb_karyawan');
        }

        public function hapus($where,$table){

            date_default_timezone_set("Asia/Jakarta");

            

            $data = array(
                'kode_status' => 0,
                'updated_at' => date("Y-m-d H:i:s"),
                'updated_by' => 'belum ada'
            );

            $this->db->where($where);
            $this->db->update($table,$data);
            return true;

        }

        public function search_nik($nik){

            $this->db->select('nama_karyawan');
            $this->db->where('nik_karyawan', $nik);
            $query = $this->db->get('tb_karyawan');

            if ($query->num_rows() > 0) {
                return true;
            } else {
                return false; // Return false if no matching record is found
            }
            
        }

        public function aktivasi_karyawan($table, $nik) {

            date_default_timezone_set("Asia/Jakarta");


            $where = array(
                'nik_karyawan' => $nik
            );
        
            $data = array(
                'kode_status' => 1,
                'updated_at' => date("Y-m-d H:i:s"),
                'updated_by' => 'belum ada'
            );
        
            // Assuming that $table contains the table name
            $this->db->where($where);
            $this->db->update($table, $data);
        }

        public function edit_data($where,$table){

            return $this->db->get_where($table,$where);

        }

        public function update_data($where,$data,$table){
            
            $this->db->where($where);
            $this->db->update($table,$data);

        }

        public function detail_data($where){

            $query = $this->db->get_where('tb_karyawan', $where)->row();
            return $query;

        }

        public function get_keyword($keyword){

            $this->db->select('*');
            $this->db->from('tb_karyawan');
            $this->db->join('tb_jabatan', 'tb_karyawan.kode_jabatan = tb_jabatan.kode_jabatan', 'inner');
            $this->db->like('nik_karyawan',$keyword);
            $this->db->or_like('email_karyawan',$keyword);
            $this->db->or_like('nama_karyawan',$keyword);
            $this->db->or_like('tgl_lahir',$keyword);
            $this->db->or_like('alamat_karyawan',$keyword);
            $this->db->or_like('jenis_kelamin',$keyword);
            $this->db->or_like('desc_jabatan',$keyword);
            return $this->db->get()->result();

        }

    }

?>