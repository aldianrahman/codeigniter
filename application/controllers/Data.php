<?php
    require_once APPPATH . 'core/Master.php';

    class Data extends Master{


        public function __construct()
        {
            parent::__construct();
            
        }
   
        public function index(){
   
           
           $role_user = $this->session->userdata('role_user');
   
           if($role_user == 1){
               redirect('admin');
           }else{
               redirect('auth/logout');
           }
   
        }

        public function supplier(){
            if($this->role_karyawan() == 1){
                
                $role_user = $this->session->userdata('role_user');
        
        
                $where = array(
                    'id_karyawan' => $this->id_karyawan()
                );
        
                $data['karyawan_online'] = $this->m_karyawan->get_karyawan_online();
                $data['ui_karyawan'] 	= $this->m_karyawan->get_ui_karaywan($where);
                $data['count_user'] 	= $this->m_karyawan->count_karyawan();
                $data['count_user_online'] 	= $this->m_karyawan->count_karyawan_online();
                $data['sidebar'] 		= $this->m_sidebar->data_sidebar($role_user)->result();
                $data['notif_sidebar'] 	= $this->m_sidebar->notif_sidebar();
                $data['karyawan'] = $this->m_karyawan->detail_karyawan_with_jabatan_where_id($where);
                $data['count_acc_friend'] 	= $this->m_karyawan->count_acc_friend($this->id_karyawan());
                

        
        
                $this->load->view('templates/header',$data);
                $this->load->view('templates/sidebar',$data);
                $this->load->view('v_supplier',$data);
                $this->load->view('templates/footer');
            }else{
                redirect('auth/login_exist');
            }
        }

        public function data_supplier(){
            if($this->role_karyawan() == 1){
                $data['data_supplier'] = $this->m_data->tampil_supplier()->result();
                echo json_encode($data);
            }else{
                redirect('auth/login_exist');
            }
            
        }

        

    
        



    }

?>