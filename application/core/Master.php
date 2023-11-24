<?php 

    class Master extends CI_Controller{

        public function __construct() {
            parent::__construct();
            // Common functionality for all controllers
        }

        public function session_destroy(){
            if ($this->id_karyawan() === null ) {
                return 0;
            } else {
                if($this->role_karyawan() != 1){
                    return 0;
                }else{
                    if ($this->session->has_userdata('timeout') && time() > $this->session->userdata('timeout')) {
                        // Sesuaikan operasi sesuai dengan sesi yang berakhir
                        // Misalnya, melakukan logout atau membersihkan data sesi
                        $this->session->unset_userdata('timeout');
                        $this->session->sess_destroy();
                        
                        // Redirect atau melakukan operasi lain setelah sesi berakhir
                        return 0;
                    }
    
                    return 1;
    
                }
            }	
        }

        public function cek_session(){
            $id_karyawan = $this->id_karyawan();
            $role_user = $this->role_karyawan();
    
            if ($id_karyawan === null) {
                return redirect('auth/login');
            } else {
                if($role_user == 1){
                    return redirect('admin/dashboard');
                }else{
                    return redirect('admin/home');
                }
            }
    
        }
    
        public function id_karyawan(){
            return $this->session->userdata('id_karyawan');
        }
    
        public function role_karyawan(){
            if ($this->id_karyawan() === null ) {
                redirect('auth/login');
            } else {
                return $this->session->userdata('role_user');
            }
        }

    }

?>