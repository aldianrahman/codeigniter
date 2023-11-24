<?php

    class M_sidebar extends CI_Model{

        public function data_sidebar($role_user){

            if($role_user == 1){
                $where = array(
                    'status_sidebar' => 1,
                );   
            }else{
                $where = array(
                    'status_sidebar' => 1,
                    'show_to_role_karyawan' => $role_user
                );
            }

            $this->db->select('*');
            $this->db->where($where);

            $query = $this->db->get('tb_sidebar');
            return $query;

        }

        public function notif_sidebar(){

            $where = array(
                'parrent_id' => 3,
                'status_sidebar' => 1
            );

            $this->db->where($where);
            $count = $this->db->count_all_results('tb_sidebar');
            return $count;

        }

        public function parrent_sidebar(){

            $this->db->select('id_sidebar, desc_sidebar');
            $this->db->where('parrent', 1);
            $query = $this->db->get('tb_sidebar');
            return $query;

        }

        public function tambah_sidebar($data,$table){
            $this->db->insert($table,$data);
        }

        public function hapus_sidebar($where,$table){

            date_default_timezone_set("Asia/Jakarta");

            

            $data = array(
                'status_sidebar' => 0,
                'updated_at' => date("Y-m-d H:i:s"),
                'updated_by' => 'belum ada'
            );

            $this->db->where($where);
            $this->db->update($table,$data);
            return true;

        }


    }

?>