 <!-- Left side column. contains the logo and sidebar -->


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Supplier
        <!-- <small>advanced tables</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url().'data/supplier' ?>"><i class="fa fa-dashboard"></i> Supplier</a></li>
        <li class="active">Data Supplier</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <button class="btn btn-primary" data-toggle="modal" data-target="#inputSupplier">
            <i class="fa fa-plus"></i> Tambah Data Supplier
        </button>
        <a href="<?php echo base_url('data/tambah_supplier') ?>" class="btn btn-danger">
            <i class="fa fa-print"></i> Print
        </a>

        <div class="dropdown inline">
            <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                <i class="fa fa-download"></i> Export
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li><a href="<?php echo base_url('data/export_supplier_pdf') ?>">PDF</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="<?php echo base_url('karyawan/export_supplier_excel') ?>">Excel</a></li>
            </ul>
        </div>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Supplier</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <table id="table-artikel" class="display nowrap" style="width: 100%">
              <thead>
                  <tr>
                      <th>No</th>
                      <th>Kode Jabatan</th>
                      <th>Deskripsi Jabatan</th>
                      <th>Gaji Jabatan</th>
                      <th>Recruitment</th>
                      <th>Action</th>
                  </tr>
              </thead>
              <tbody>
                  <!-- Table body content will be loaded dynamically by DataTables -->
              </tbody>
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
  