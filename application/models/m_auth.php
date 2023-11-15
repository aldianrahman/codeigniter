<?php

    class M_auth extends CI_Model{

        public function cek_login(){

            $email_karyawan     = set_value('email_karyawan');
            $password           = set_value('password');

            $result             = $this->db->where('email_karyawan',$email_karyawan)
                                            ->where('password',$password)
                                            ->where('kode_status',1)
                                            ->where('status_login',0)
                                            ->limit(1)
                                            ->get('tb_karyawan');


            if($result->num_rows() > 0){
                return $result->row();
            }else{
                return array(
                    
                );
            }
        }

    }

?>