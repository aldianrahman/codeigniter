<?php

    class Karyawan extends CI_Controller{

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

                        $where = array(
                            'id_karyawan' => $id_karyawan
                        );
                        $data['ui_karyawan'] 	= $this->m_karyawan->get_ui_karaywan($where);

                        $data['sidebar'] = $this->m_sidebar->data_sidebar($role_user)->result();
                        $data['karyawan'] = $this->m_karyawan->get_karyawan_with_jabatan();
                        $data['jabatan'] = $this->m_karyawan->tampil_jabatan()->result();
                        $data['notif_sidebar'] = $this->m_sidebar->notif_sidebar();
                        $data['count_user_online'] 	= $this->m_karyawan->count_karyawan_online();
                        $data['karyawan_online'] = $this->m_karyawan->get_karyawan_online();


                        
                        $this->load->view('templates/header',$data);
                        $this->load->view('templates/sidebar',$data);
                        $this->load->view('v_karyawan',$data);
                        $this->load->view('templates/footer');
                        $this->load->view('modal/input_karyawan');

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

            $id_karyawan = $this->session->userdata('id_karyawan');
            if ($id_karyawan === null) {
                    redirect('auth/login');
                } else {

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
                        echo "Error Coding Hapus Karyawan";
                    }

                    // $where = array('id_karyawan' => $id);
                    // $this->m_karyawan->hapus($where,'tb_karyawan');
                    // redirect('karyawan');

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

            $id_karyawan = $this->session->userdata('id_karyawan');
            $role_user = $this->session->userdata('role_user');

            
            if ($id_karyawan === null) {
                    redirect('auth/login');
                } else {


                    $where = array(
                        'id_karyawan' => $id,
                    );

                    $data['ui_karyawan'] 	= $this->m_karyawan->get_ui_karaywan($where);


                    $data['sidebar'] = $this->m_sidebar->data_sidebar($role_user)->result();
                    $data['karyawan'] = $this->m_karyawan->get_karyawan_with_jabatan_where_id($where);
                    $data['jabatan'] = $this->m_karyawan->tampil_jabatan()->result();
                    $data['notif_sidebar'] = $this->m_sidebar->notif_sidebar();
                    $data['count_user_online'] 	= $this->m_karyawan->count_karyawan_online();
                    $data['karyawan_online'] = $this->m_karyawan->get_karyawan_online();

                
                    
                    $this->load->view('templates/header',$data);;
                    $this->load->view('templates/sidebar',$data);
                    $this->load->view('edit/edit_karyawan',$data);
                    $this->load->view('templates/footer');

                }
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

                    $detail = $this->m_karyawan->detail_data($where);
                    $data['detail'] = $detail;

                    $where = array(
                        'id_karyawan' => $id_karyawan
                    );
                    $data['ui_karyawan'] 	= $this->m_karyawan->get_ui_karaywan($where);

                    $data['sidebar'] = $this->m_sidebar->data_sidebar($role_user)->result();
                    $data['karyawan'] = $this->m_karyawan->detail_karyawan_with_jabatan_where_id($where);
                    $data['jabatan'] = $this->m_karyawan->tampil_jabatan()->result();
                    $data['notif_sidebar'] = $this->m_sidebar->notif_sidebar();
                    $data['count_user_online'] 	= $this->m_karyawan->count_karyawan_online();
                    $data['karyawan_online'] = $this->m_karyawan->get_karyawan_online();


                    
                    $this->load->view('templates/header',$data);;
                    $this->load->view('templates/sidebar',$data);
                    $this->load->view('detail/detail_karyawan',$data);
                    $this->load->view('templates/footer');

                }

        }

        public function print(){
            $id_karyawan = $this->session->userdata('id_karyawan');
            if ($id_karyawan === null) {
                    redirect('auth/login');
                } else {

                    $data['karyawan'] = $this->m_karyawan->get_karyawan_with_jabatan();

                    $this->load->view('print/print_karyawan',$data);

                }
        }

        public function print_detail($id){
            $id_karyawan = $this->session->userdata('id_karyawan');
            if ($id_karyawan === null) {
                    redirect('auth/login');
                } else {

                    $data['karyawan'] = $this->m_karyawan->print_karyawan_with_jabatan($id_karyawan)->row();
                    $data['list_karyawan'] = $this->m_karyawan->print_karyawan_with_jabatan($id_karyawan)->result();
                    

                    $this->load->view('print/print_karyawan_detail',$data);

                }
        }

        public function export_pdf(){

            $id_karyawan = $this->session->userdata('id_karyawan');
            if ($id_karyawan === null) {
                    redirect('auth/login');
                } else {

                    $this->load->library('dompdf_gen');

                    $data['karyawan'] = $this->m_karyawan->get_karyawan_with_jabatan();

                    $this->load->view('export_pdf/laporan_pdf',$data);

                    $paper_size = 'A4';
                    $orientation = 'landscape';
                    $html = $this->output->get_output();
                    $this->dompdf->set_paper($paper_size,$orientation);

                    $this->dompdf->load_html($html);
                    $this->dompdf->render();
                    $this->dompdf->stream('Laporan_Karyawan.pdf',array('Attachment' => 0));
                }

        }

        
        
        public function export_excel(){

        $id_karyawan = $this->session->userdata('id_karyawan');
        if ($id_karyawan === null) {
                redirect('auth/login');
            } else {

                $data['karyawan'] = $this->m_karyawan->get_karyawan_with_jabatan();

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


                    
                    $this->load->view('templates/header',$data);;
                    $this->load->view('templates/sidebar',$data);
                    $this->load->view('v_karyawan',$data);
                    $this->load->view('templates/footer');
                }


        }

        



        
    }

?>