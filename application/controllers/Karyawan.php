<?php
    require_once APPPATH . 'core/Master.php';
    class Karyawan extends Master{

        public function __construct()
	 {
		 parent::__construct();
		 $id_karyawan = $this->session->userdata('id_karyawan');
	 }

        public function index(){

            $id_karyawan = $this->session->userdata('id_karyawan');
            $role_user = $this->session->userdata('role_user');
                
                if ($id_karyawan === null) {
                    redirect('auth/login');
                } else {

                    if($role_user != 1){
                        redirect('auth/login');
                    }else{

                        $id_karyawan = $this->session->userdata('id_karyawan');
                        $role_user = $this->session->userdata('role_user');
                
                
                        $where = array(
                            'id_karyawan' => $id_karyawan
                        );
                
                        $data['karyawan_online'] = $this->m_karyawan->get_karyawan_online();
                        $data['ui_karyawan'] 	= $this->m_karyawan->get_ui_karaywan($where);
                        $data['count_user'] 	= $this->m_karyawan->count_karyawan();
                        $data['count_user_online'] 	= $this->m_karyawan->count_karyawan_online();
                        $data['sidebar'] 		= $this->m_sidebar->data_sidebar($role_user)->result();
                        $data['notif_sidebar'] 	= $this->m_sidebar->notif_sidebar();
                        $data['karyawan'] = $this->m_karyawan->detail_karyawan_with_jabatan_where_id($where);
                        $data['data_supplier'] = $this->m_data->tampil_supplier()->result();
                        $data['count_acc_friend'] 	= $this->m_karyawan->count_acc_friend($id_karyawan);
		                $data['jabatan'] = $this->m_karyawan->tampil_jabatan()->result();
                        


                
                
                        $this->load->view('templates/header',$data);
                        $this->load->view('templates/sidebar',$data);
                        $this->load->view('v_karayawan_new');
                        $this->load->view('templates/footer');
                        $this->load->view('modal/input_karyawan',$data);


                    }

                }
            
        }

        public function jabatan(){

            $id_karyawan = $this->session->userdata('id_karyawan');
            $role_user = $this->session->userdata('role_user');
            if ($id_karyawan === null) {
                    redirect('auth/login');
                } else {

                    if($role_user != 1){
                        redirect('auth/login');
                    }else{
                        $where = array(
                            'id_karyawan' => $id_karyawan
                        );
                        $data['ui_karyawan'] 	= $this->m_karyawan->get_ui_karaywan($where);
        
                        $data['sidebar'] = $this->m_sidebar->data_sidebar($role_user)->result();
                        $data['jabatan'] = $this->m_karyawan->tampil_jabatan()->result();
                        $data['notif_sidebar'] = $this->m_sidebar->notif_sidebar();
                        $data['count_user_online'] 	= $this->m_karyawan->count_karyawan_online();
                        $data['karyawan_online'] = $this->m_karyawan->get_karyawan_online();
                        $data['count_acc_friend'] 	= $this->m_karyawan->count_acc_friend($id_karyawan);
                        

        
        
        
                        $this->load->view('templates/header',$data);;
                        $this->load->view('templates/sidebar',$data);
                        $this->load->view('v_jabatan',$data);
                        $this->load->view('templates/footer');
                        $this->load->view('modal/input_jabatan');
                    }

                    

                }

        }

        public function tambah_karyawan(){

            $id_karyawan = $this->session->userdata('id_karyawan');
            if ($id_karyawan === null) {
                redirect('auth/login');
            } else {

                $nik                = $this->input->post('nik_karyawan');
                $nama               = $this->input->post('nama_karyawan');
                $email              = $this->input->post('email_karyawan');
                $tgl_lahir          = $this->input->post('tgl_lahir');
                $alamat             = $this->input->post('alamat_karyawan');
                $jabatan            = $this->input->post('kode_jabatan');
                $jenis_kelamin      = $this->input->post('jenis_kelamin');
                $role_user          = $this->input->post('role_user');
                $status_karyawan    = 1; // aktif

                $config['upload_path']   = './assets/foto_karyawan/';
                $config['allowed_types'] = 'jpg|png|gif';
                $config['max_size']      = 2048; // 2 MB
                $config['encrypt_name']  = TRUE; // Encrypts the uploaded file's name
            
                // Load the upload library with the provided configuration
                $this->load->library('upload', $config);
            
                // Check if the file input exists and has a name
                if (isset($_FILES['foto_karyawan']) && !empty($_FILES['foto_karyawan']['name'])) {
                    // Try to upload the file
                    if (!$this->upload->do_upload('foto_karyawan')) {
                        // Upload failed, show error message
                        $error = $this->upload->display_errors();
                        echo "Upload Gagal: " . $error;
                    } else {
                        // Upload successful, get file data
                        $uploaded_data = $this->upload->data();
                        $file_name = $uploaded_data['file_name'];

                        
            
                        // Process the uploaded file as needed
                        // ...
            
                        // echo "Upload Berhasil. Nama File: " . $file_name;
                        if($this->m_karyawan->search_nik($nik)){
                            echo "NIK dengan no ".$nik." data sudah ada harap kembali kehalaman sebelumnya.";
                            echo "<br>";
                            echo "<br>";
                            echo "<button onclick=\"location.href='" . base_url() . "karyawan/aktivasi_karyawan/" . $nik . "'\">Aktifkan Kembali</button>";
                        }else{
                            $data       = array(
                                'role_user'         => $role_user,
                                'nik_karyawan'      => $nik,
                                'email_karyawan'    => $email,
                                'nama_karyawan'     => $nama,
                                'tgl_lahir'         => $tgl_lahir,
                                'alamat_karyawan'   => $alamat,
                                'kode_jabatan'      => $jabatan,
                                'kode_status'       => $status_karyawan,
                                'jenis_kelamin'     => $jenis_kelamin,
                                'password'          => '123',
                                'foto_karyawan'     => $file_name,
                                'created_by'        => 'belum ada'
                            );
                
                            $this->m_karyawan->input_data($data,'tb_karyawan');
                            $this->session->set_flashdata('message_tambah_karyawan','
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                                </button>
                                Data Berhasil Ditambahkan!
                            </div>
                            ');
                            redirect('karyawan');
                        }
                    }
                }
                
            }
        }

        public function tambah_jabatan(){
            if($this->role_karyawan() == 1){
                $this->goto_tambah_jabatan();
            }else{
                redirect('auth/login_exist');
            } 
        }

        public function goto_tambah_jabatan(){
            $id_karyawan = $this->session->userdata('id_karyawan');
            if ($id_karyawan === null) {
                redirect('auth/login');
            } else {

                $jabatan    = $this->input->post('desc_jabatan');
                $gaji       = $this->input->post('gaji_jabatan');

                $data       = array(
                    'desc_jabatan' => $jabatan,
                    'gaji_jabatan' => $gaji
                );

                $this->m_karyawan->input_jabatan($data,'tb_jabatan');
                $this->session->set_flashdata('message_tambah_jabatan','
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                                </button>
                                Data Berhasil Ditambahkan!
                            </div>
                            ');
                redirect('karyawan/jabatan');
            }
        }

        public function hapus($id){

            if($this->role_karyawan() == 1){
                $this->goto_hapus($id);
            }else{
                if($id == $this->id_karyawan()){
                    $this->goto_hapus($id);
                }else{
                    redirect('auth/login_exist');
                }
            } 
                
        }

        public function goto_hapus($id){
            $data = array(
                'id_karyawan' => $id
            );

            if($this->m_karyawan->hapus($data,'tb_karyawan')){
                $this->session->set_flashdata('message_hapus_karyawan','
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                            </button>
                            Data Berhasil Dihapus!
                        </div>
                        ');
                redirect('karyawan');
            }else{
                echo "Gagal Hapus Karyawan";
            }
        }

        public function aktivasi_karyawan($nik){

            $id_karyawan = $this->session->userdata('id_karyawan');
            if ($id_karyawan === null) {
                redirect('auth/login');
            } else {

                $this->m_karyawan->aktivasi_karyawan('tb_karyawan',$nik);
                $this->session->set_flashdata('message_aktivasi_karyawan','
                            <div class="alert alert-info alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                                </button>
                                Data Berhasil Diaktivasi!
                            </div>
                            ');
                redirect('karyawan');

            }     
        }

        public function edit($id){

            if($this->role_karyawan() == 1){
                $this->goto_edit($id);
            }else{
                if($id == $this->id_karyawan()){
                    $this->goto_edit($id);
                }else{
                    redirect('auth/login_exist');
                }
            }    

        }

        public function goto_edit($id){
            $where = array(
                'id_karyawan' => $id,
            );
            $where_session = array(
                'id_karyawan' => $this->id_karyawan(),
            );

            $data['ui_karyawan'] 	= $this->m_karyawan->get_ui_karaywan($where_session);


            $data['sidebar'] = $this->m_sidebar->data_sidebar($this->role_karyawan())->result();
            $data['karyawan'] = $this->m_karyawan->get_karyawan_with_jabatan_where_id($where);
            $data['jabatan'] = $this->m_karyawan->tampil_jabatan()->result();
            $data['notif_sidebar'] = $this->m_sidebar->notif_sidebar();
            $data['count_user_online'] 	= $this->m_karyawan->count_karyawan_online();
            $data['karyawan_online'] = $this->m_karyawan->get_karyawan_online();

            
            $data['count_acc_friend'] 	= $this->m_karyawan->count_acc_friend($this->id_karyawan());
            


        
            
            $this->load->view('templates/header',$data);;
            $this->load->view('templates/sidebar',$data);
            $this->load->view('edit/edit_karyawan',$data);
            $this->load->view('templates/footer');
        }

        public function update(){

            $id_karyawan = $this->session->userdata('id_karyawan');
            if ($id_karyawan === null) {
                    redirect('auth/login');
                } else {

                    $id                 = $this->input->post('id_karyawan');
                    $nik                = $this->input->post('nik_karyawan');
                    $nama               = $this->input->post('nama_karyawan');
                    $email              = $this->input->post('email_karyawan');
                    $tgl_lahir          = $this->input->post('tgl_lahir');
                    $alamat             = $this->input->post('alamat_karyawan');
                    $jabatan            = $this->input->post('kode_jabatan');
                    $jenis_kelamin      = $this->input->post('jenis_kelamin');
                    $status_karyawan = 1; // aktif


                    $data       = array(
                        'nik_karyawan'      => $nik,
                        'email_karyawan'    => $email,
                        'nama_karyawan'     => $nama,
                        'tgl_lahir'         => $tgl_lahir,
                        'alamat_karyawan'   => $alamat,
                        'kode_jabatan'      => $jabatan,
                        'kode_status'       => $status_karyawan,
                        'jenis_kelamin'     => $jenis_kelamin,
                        'updated_at'        => 'belum ada'
                    );

                    $where      = array(
                        'id_karyawan'       => $id
                    );

                    $this->m_karyawan->update_data($where,$data,'tb_karyawan');
                    $this->session->set_flashdata('message_update_karyawan','
                                <div class="alert alert-warning alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                                    </button>
                                    Data Berhasil Diupdate!
                                </div>
                                ');
                    redirect('karyawan');
                }
        }

        public function update_karyawan(){

            $id_karyawan = $this->session->userdata('id_karyawan');
            if ($id_karyawan === null) {
                redirect('auth/login');
            } else {
                $id                 = $this->input->post('id_karyawan');
                $nik                = $this->input->post('nik_karyawan');
                $nama               = $this->input->post('nama_karyawan');
                $email              = $this->input->post('email_karyawan');
                $tgl_lahir          = $this->input->post('tgl_lahir');
                $alamat             = $this->input->post('alamat_karyawan');
                $jabatan            = $this->input->post('kode_jabatan');
                $jenis_kelamin      = $this->input->post('jenis_kelamin');
                $status_karyawan = 1; // aktif


                $data       = array(
                    'nik_karyawan'      => $nik,
                    'email_karyawan'    => $email,
                    'nama_karyawan'     => $nama,
                    'tgl_lahir'         => $tgl_lahir,
                    'alamat_karyawan'   => $alamat,
                    'kode_jabatan'      => $jabatan,
                    'kode_status'       => $status_karyawan,
                    'jenis_kelamin'     => $jenis_kelamin,
                    'updated_at'        => 'belum ada'
                );

                $where      = array(
                    'id_karyawan'       => $id
                );

                $this->m_karyawan->update_data($where,$data,'tb_karyawan');
                $this->session->set_flashdata('message_update_karyawan','
                            <div class="alert alert-warning alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                                </button>
                                Data Berhasil Diupdate!
                            </div>
                            ');
                redirect('admin/karyawan');
            }
        }

        public function detail($id){

            $id_karyawan = $this->session->userdata('id_karyawan');
            $role_user = $this->session->userdata('role_user');

            if ($id_karyawan === null) {
                    redirect('auth/login');
                } else {

                    $this->load->model('m_karyawan');

                    $where = array(
                        'id_karyawan' => $id
                    );

                    $where_session = array(
                        'id_karyawan' => $id_karyawan
                    );
                    $data['ui_karyawan'] 	= $this->m_karyawan->get_ui_karaywan($where_session);

                    $detail = $this->m_karyawan->detail_data($where);
                    $data['detail'] = $detail;
                    $data['sidebar'] = $this->m_sidebar->data_sidebar($role_user)->result();
                    $data['karyawan'] = $this->m_karyawan->detail_karyawan_with_jabatan_where_id($where);
                    $data['jabatan'] = $this->m_karyawan->tampil_jabatan()->result();
                    $data['notif_sidebar'] = $this->m_sidebar->notif_sidebar();
                    $data['count_user_online'] 	= $this->m_karyawan->count_karyawan_online();
                    $data['karyawan_online'] = $this->m_karyawan->get_karyawan_online();

                    
                    $data['count_acc_friend'] 	= $this->m_karyawan->count_acc_friend($id_karyawan);
                    



                    
                    $this->load->view('templates/header',$data);;
                    $this->load->view('templates/sidebar',$data);
                    $this->load->view('detail/detail_karyawan',$data);
                    $this->load->view('templates/footer');

                }

        }

        public function print(){
            
            if($this->role_karyawan() == 1){
                $selectedId = array(11,12,13);
                if (empty($selectedId)) {
                    $data['karyawan'] = $this->m_karyawan->get_karyawan_with_jabatan_all();
                    $this->load->view('print/print_karyawan', $data);
                } else {
                    $data['karyawan'] = $this->m_karyawan->get_karyawan_with_jabatan($selectedId);
                    $this->load->view('print/print_karyawan', $data);
                }
            }else{
                redirect('auth/login_exist');
            }
        }

        public function print_detail($id){

            if($this->role_karyawan() == 1){
                $this->goto_print($id);
            }else{
                if($id == $this->id_karyawan()){
                    $this->goto_print($id);
                }else{
                    redirect('auth/login_exist');
                }
            }    
        }

        public function goto_print($id){
            $data['karyawan'] = $this->m_karyawan->print_karyawan_with_jabatan($id)->row();
            $data['list_karyawan'] = $this->m_karyawan->print_karyawan_with_jabatan($id)->result();
            $this->load->view('print/print_karyawan_detail',$data);
        }

        public function export_pdf(){

            if($this->role_karyawan() == 1){
                $selectedId = array(11,12,13);

                $this->load->library('dompdf_gen');
                
                if (empty($selectedId)) {
                    $data['karyawan'] = $this->m_karyawan->get_karyawan_with_jabatan_all();
                } else {
                    $data['karyawan'] = $this->m_karyawan->get_karyawan_with_jabatan($selectedId);
                }

                $this->load->view('export_pdf/laporan_pdf',$data);

                $paper_size = 'A4';
                $orientation = 'landscape';
                $html = $this->output->get_output();
                $this->dompdf->set_paper($paper_size,$orientation);

                $this->dompdf->load_html($html);
                $this->dompdf->render();
                $this->dompdf->stream('Laporan_Karyawan.pdf',array('Attachment' => 0));
            }else{
                redirect('auth/login_exist');
            }


        }

        
        
        public function export_excel(){
            
            if($this->role_karyawan() == 1){
                $selectedId = array(11,12,13);
                
                if (empty($selectedId)) {
                    $data['karyawan'] = $this->m_karyawan->get_karyawan_with_jabatan_all();
                } else {
                    $data['karyawan'] = $this->m_karyawan->get_karyawan_with_jabatan($selectedId);
                }
                require(APPPATH.'PHPExcel-1.8/Classes/PHPExcel.php');
                require(APPPATH.'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

                $object = new PHPExcel();

                $object->getProperties()->setCreator("it.luby@gmail.com");
                $object->getProperties()->setLastModifiedBy("it.luby@gmail.com");
                $object->getProperties()->setTitle("Daftar Karyawan Aktif");

                $object->setActiveSheetIndex(0);

                $object->getActiveSheet()->setCellValue('A1', 'NO');
                $object->getActiveSheet()->setCellValue('B1', 'NIK KARYAWAN');
                $object->getActiveSheet()->setCellValue('C1', 'EMAIL KARYAWAN');
                $object->getActiveSheet()->setCellValue('D1', 'NAMA KARYAWAN');
                $object->getActiveSheet()->setCellValue('E1', 'TANGGAL LAHIR');
                $object->getActiveSheet()->setCellValue('F1', 'ALAMAT');
                $object->getActiveSheet()->setCellValue('G1', 'JABATAN');
                $object->getActiveSheet()->setCellValue('H1', 'JENIS KELAMIN');

                // Header styling
                $headerStyle = array(
                    'font' => array('bold' => true),
                    'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER),
                    'borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN)),
                    'fill' => array('type' => PHPExcel_Style_Fill::FILL_SOLID, 'color' => array('rgb' => 'BFBFBF')),
                );

                $object->getActiveSheet()->getStyle('A1:H1')->applyFromArray($headerStyle);

                // Data styling
                $dataStyle = array(
                    'borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN)),
                );

                $baris = 2;
                $no = 1;

                foreach ($data['karyawan'] as $krw) {
                    $object->getActiveSheet()->setCellValueExplicit('A'.$baris, $no++, PHPExcel_Cell_DataType::TYPE_NUMERIC);
                    $object->getActiveSheet()->setCellValueExplicit('B'.$baris, $krw->nik_karyawan);
                    $object->getActiveSheet()->setCellValueExplicit('C'.$baris, $krw->email_karyawan);
                    $object->getActiveSheet()->setCellValueExplicit('D'.$baris, $krw->nama_karyawan);
                    $object->getActiveSheet()->setCellValueExplicit('E'.$baris, $krw->tgl_lahir);
                    $object->getActiveSheet()->setCellValueExplicit('F'.$baris, $krw->alamat_karyawan);
                    $object->getActiveSheet()->setCellValueExplicit('G'.$baris, $krw->desc_jabatan);
                    $object->getActiveSheet()->setCellValueExplicit('H'.$baris, $krw->jenis_kelamin);

                    $object->getActiveSheet()->getStyle('A'.$baris.':H'.$baris)->applyFromArray($dataStyle);

                    $baris++;
                }

                $filename = "Data Karyawan Aktif.xlsx";
                $object->getActiveSheet()->setTitle("Data Karyawan Aktif");

                header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                header('Content-Disposition: attachment; filename="'.$filename.'"');

                $writer = PHPExcel_IOFactory::createWriter($object, 'Excel2007');
                $writer->save('php://output');
                exit;
            }else{
                redirect('auth/login_exist');
            }

            
            
        }

        public function search(){

            $id_karyawan = $this->session->userdata('id_karyawan');
            $role_user = $this->session->userdata('role_user');

            if ($id_karyawan === null) {
                    redirect('auth/login');
                } else {

                    $where = array(
                        'id_karyawan' => $id_karyawan
                    );
                    $data['ui_karyawan'] 	= $this->m_karyawan->get_ui_karaywan($where);

                    $when = array(
                        'kode_status' => 1
                    );

                    $keyword = $this->input->post('keyword');
                    $data['karyawan'] = $this->m_karyawan->get_keyword($keyword);

                    $data['sidebar'] = $this->m_sidebar->data_sidebar($role_user)->result();
                    $data['jabatan'] = $this->m_karyawan->tampil_jabatan()->result();
                    $data['notif_sidebar'] = $this->m_sidebar->notif_sidebar();
                    $data['count_user_online'] 	= $this->m_karyawan->count_karyawan_online();
                    $data['karyawan_online'] = $this->m_karyawan->get_karyawan_online();

                    
                    $data['count_acc_friend'] 	= $this->m_karyawan->count_acc_friend($id_karyawan);
                    



                    
                    $this->load->view('templates/header',$data);;
                    $this->load->view('templates/sidebar',$data);
                    $this->load->view('v_karyawan',$data);
                    $this->load->view('templates/footer');
                }


        }

        public function profile($id){

            $id_karyawan = $this->session->userdata('id_karyawan');
            $role_user = $this->session->userdata('role_user');
            
            if ($id_karyawan === null) {
                redirect('auth/login');
            } else {

                

                    $where = array(
                        'id_karyawan' => $id_karyawan
                    );

                    $where_data= array(
                        'id_karyawan'=> $id
                    );

                    
                    $data['count_acc_friend'] 	= $this->m_karyawan->count_acc_friend($id_karyawan);

                    
                    $data['ui_karyawan'] 	= $this->m_karyawan->get_ui_karaywan($where);
                    
                    $data['get_ui_profile'] 	= $this->m_karyawan->get_ui_profile($where_data);

                    $data['sidebar'] = $this->m_sidebar->data_sidebar($role_user)->result();
                    $data['karyawan'] = $this->m_karyawan->get_karyawan_profile();
                    $data['jabatan'] = $this->m_karyawan->tampil_jabatan()->result();
                    $data['notif_sidebar'] = $this->m_sidebar->notif_sidebar();
                    $data['count_user_online'] 	= $this->m_karyawan->count_karyawan_online();
                    $data['karyawan_online'] = $this->m_karyawan->get_karyawan_online();
                    $data['about_me'] = $this->m_karyawan->about_me($where_data);
                    $data['acc_friend'] = $this->m_karyawan->acc_friend($id_karyawan);
                    

                    $data['id_karyawan'] = $id_karyawan = $this->session->userdata('id_karyawan');
                    


                    if($id == $id_karyawan){
                        $data['hide_setting'] = true;
                    }else{
                        $data['hide_setting'] = false;
                    }



                    
                    $this->load->view('templates/header',$data);
                    $this->load->view('templates/sidebar',$data);
                    $this->load->view('v_profile',$data);
                    $this->load->view('templates/footer');
                    $this->load->view('modal/input_karyawan');

                

            }


        }

        public function search_profile(){

            $id_karyawan = $this->session->userdata('id_karyawan');
            $role_user = $this->session->userdata('role_user');
            
            if ($id_karyawan === null) {
                redirect('auth/login');
            } else {



                $keyword = $this->input->post('keyword');
                // echo $keyword;

                $data = $this->m_karyawan->search_id($keyword);

                if($data == 'false'){
                    $this->session->set_flashdata('message_profile_not_found','
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                                    </button>
                                    Profil tidak ditemukan!
                                </div>
                                ');
                                redirect('karyawan/profile/'.$id_karyawan);
                }else{
                    redirect('karyawan/profile/'.$data);
                }
            }
        }

        public function insert_about_me(){

            $id_karyawan = $this->session->userdata('id_karyawan');


            $pendidikan_karyawan = $this->input->post('pendidikan_karyawan');
            $lokasi_karyawan = $this->input->post('lokasi_karyawan');
            $skill_karyawan = $this->input->post('skill_karyawan');
            $note_karyawan = $this->input->post('note_karyawan');

            echo $pendidikan_karyawan.'<br>';
            echo $lokasi_karyawan.'<br>';
            echo $skill_karyawan.'<br>';
            echo $note_karyawan.'<br>';

            $data = array(
                'id_karyawan' => $id_karyawan,
                'pendidikan_karyawan' => $pendidikan_karyawan,
                'lokasi_karyawan' => $lokasi_karyawan,
                'skill_karyawan' => $skill_karyawan,
                'note_karyawan' => $note_karyawan
            );

            $this->m_karyawan->input_about_me($data);
            redirect('karyawan/profile/'.$id_karyawan);
            

        }

        public function update_about_me(){

            $id_karyawan = $this->session->userdata('id_karyawan');


            $pendidikan_karyawan = $this->input->post('pendidikan_karyawan');
            $lokasi_karyawan = $this->input->post('lokasi_karyawan');
            $skill_karyawan = $this->input->post('skill_karyawan');
            $note_karyawan = $this->input->post('note_karyawan');

            $where = array(
                'id_karyawan' => $id_karyawan
            );

            $data = array(
                'pendidikan_karyawan' => $pendidikan_karyawan,
                'lokasi_karyawan' => $lokasi_karyawan,
                'skill_karyawan' => $skill_karyawan,
                'note_karyawan' => $note_karyawan
            );

            if( $this->m_karyawan->update_about_me($where,$data) ){
                redirect('karyawan/profile/'.$id_karyawan);
            }else{
                echo "Update Gagal!";
            }
            

        }

        public function tambah_teman($id){

            $id_karyawan = $this->session->userdata('id_karyawan');


            // echo "Id Teman : ".$id .'<br>';
            // echo "Id Saya : ".$id_karyawan;
            $status = 2;

            if($this->m_karyawan->tambah_teman($id_karyawan,$id,$status)){
                redirect('karyawan/profile/'.$id_karyawan);
            }
            
            

        }

        



        
    }

?>