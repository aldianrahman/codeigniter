<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Data Karyawan
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url()?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Data Karyawan</li>
        </ol>
    </section>

    <section class="content">
        <?php echo $this->session->flashdata('message_hapus_karyawan'); ?>
        <?php echo $this->session->flashdata('message_tambah_karyawan'); ?>
        <?php echo $this->session->flashdata('message_update_karyawan'); ?>
        <?php echo $this->session->flashdata('message_aktivasi_karyawan'); ?>
        
        
        <button class="btn btn-primary" data-toggle="modal" data-target="#inputKaryawan">
            <i class="fa fa-plus"></i> Tambah Data Karyawan
        </button>
        <a href="<?php echo base_url('karyawan/print') ?>" class="btn btn-danger">
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

        <div class="navbar-form navbar-right">
            <?php echo form_open('karyawan/search') ?>

            <input type="text" name="keyword" class="form-control" placeholder="Search..">
            <button type="submit" class="btn btn-success">Cari</button>
            
            <?php echo form_close() ?>
        </div>

        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>NIK</th>
                    <th>Email Karyawan</th>
                    <th>Nama Karyawan</th>
                    <th>Tanggal Lahir</th>
                    <th>Alamat</th>
                    <th>Jabatan</th>
                    <th>Jenis Kelamin</th>
                    <th colspan="3" style="text-align: center;">Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php $no=1?>
                <?php foreach ($karyawan as $krw):?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $krw->nik_karyawan ?></td>
                        <td><?php echo $krw->email_karyawan ?></td>
                        <td><?php echo $krw->nama_karyawan ?></td>
                        <td><?= date("j F Y", strtotime($krw->tgl_lahir)) ?></td>
                        <td><?php echo $krw->alamat_karyawan ?></td>
                        <td><?php echo $krw->desc_jabatan ?></td>
                        <td><?php echo $krw->jenis_kelamin ?></td>
                        <td style="text-align: center;">
                            <?php echo anchor('karyawan/detail/'.$krw->id_karyawan,'<i class="fa fa-search-plus"></i>', 'class="btn btn-success btn-sm"') ?>
                        </td>
                        <td style="text-align: center;" onclick="return confirm('Anda Yakin Menghapus ?')">
                            <?php echo anchor('karyawan/hapus/'.$krw->id_karyawan,'<i class="fa fa-trash"></i>', 'class="btn btn-danger btn-sm"') ?>
                        </td>
                        <td style="text-align: center;">
                            <?php echo anchor('karyawan/edit/'.$krw->id_karyawan,'<i class="fa fa-edit"></i>', 'class="btn btn-primary btn-sm"') ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </section>
</div>
