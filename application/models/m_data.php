<?php

    class m_data extends CI_Model{

        public function tampil_supplier(){

            return $this->db->get('tb_supplier');

        }

        public function count_supplier() {
            $where = array(
                'status_vendor' => 1
            );
        
            $this->db->where($where);
            return $this->db->count_all_results('tb_supplier');
        }
        
    }

?>