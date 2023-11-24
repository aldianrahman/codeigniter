 <!-- Left side column. contains the logo and sidebar -->


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Karyawan
        <!-- <small>advanced tables</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url() ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data Karayawan</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    
      <?php echo $this->session->flashdata('message_hapus_karyawan'); ?>
          <?php echo $this->session->flashdata('message_tambah_karyawan'); ?>
          <?php echo $this->session->flashdata('message_update_karyawan'); ?>
          <?php echo $this->session->flashdata('message_aktivasi_karyawan'); ?>
          
          
          <button class="btn btn-primary" data-toggle="modal" data-target="#inputKaryawan">
              <i class="fa fa-plus"></i> Tambah Data Karyawan
          </button>
          <a href="#" id="btnPrint" class="btn btn-danger">
              <i class="fa fa-print"></i> Print
          </a>

          <div class="dropdown inline">
              <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                  <i class="fa fa-download"></i> Export
                  <span class="caret"></span>
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                  <li><a href="<?php echo base_url('karyawan/export_pdf') ?>">PDF</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="<?php echo base_url('karyawan/export_excel') ?>">Excel</a></li>
              </ul>
          </div>

      <div class="row">
        <br>
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Karayawan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <table id="table-karyawan" class="display nowrap" style="width: 100%">
              <thead>
                  <tr>
                    <th><input value=0 type="checkbox" id="all"></th>
                    <th>No</th>
                    <th>ID Karyawan</th>
                    <th>NIK Karyawan</th>
                    <th>Email Karyawan</th>
                    <th>Nama Karyawan</th>
                    <th>Tanggal Lahir</th>
                    <th>Alamat Karyawan</th>
                    <th>Kode Jabatan</th>
                    <th>Kode Status</th>
                    <th>Jenis Kelamin</th>
                    <th>Foto Karyawan</th>
                    <th>Password</th>
                    <th>Role User</th>
                    <th>Created At</th>
                    <th>Created By</th>
                    <th>Updated At</th>
                    <th>Updated By</th>
                    <th>Last Login</th>
                    <th>Status Login</th>
                    <th>Aksi</th>
                  </tr>
              </thead>
          </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  