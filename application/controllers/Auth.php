<?php

    class Auth extends CI_Controller{

        public function login(){

            if($this->session->userdata('id_karyawan')){
                redirect('auth/login_exist');
           }else{
            $this->form_validation->set_rules('email_karyawan', 'Username','required');
            $this->form_validation->set_rules('password', 'Password','required');

            if($this->form_validation->run() == FALSE){

                $this->load->view('login/v_login');
                // $this->load->view('modal/modal_daftar');

            }else{

                $auth = $this->m_auth->cek_login();

                if($auth == FALSE){
                    $this->session->set_flashdata('pesan','
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                            </button>
                            Email dan Password Anda Salah!
                        </div>
                        ');
                        redirect('auth/login');
                }else{

                    $this->m_karyawan->last_login($auth->id_karyawan);

                    $this->session->set_userdata('id_karyawan',$auth->id_karyawan);
                    $this->session->set_userdata('role_user',$auth->role_user);
                    $this->session->set_userdata('timeout', time() + 3600);
                    
                    switch($auth->role_user){
                        case 1 :    redirect('admin/dashboard');
                                    break;
                        case 2 :    redirect('admin/home');
                                    break;
                        default:    break;
                    }
                }
            }
           }


            
        }

        public function logout(){

            $id_karyawan = $this->session->userdata('id_karyawan');
            if($this->m_karyawan->last_logout($id_karyawan)){
                $this->session->sess_destroy();
            

                redirect('auth/login');
    
            }

        }

        public function login_exist(){
            echo "Anda tidak mempunyai akses untuk ke halaman ini";
        }

    }

?>