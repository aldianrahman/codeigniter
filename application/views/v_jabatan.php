<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Data Jabatan 
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="http://localhost/phpmyadmin/"><i class="fa fa-dashboard"></i> Database</a></li>
        <li class="active">Data Jabatan</li>
      </ol>
    </section>

    <section class="content">
    <?php echo $this->session->flashdata('message_tambah_jabatan'); ?>

    <button class="btn btn-primary" data-toggle="modal" data-target="#inputJabatan"><i class="fa fa-plus"></i> Tambah Data Jabatan</button>

        <table class="table table-bordered table-hover">
            <tr>
                <th>No.</th>
                <th>ID Jabatan</th>
                <th>Keterangan Jabatan</th>
                <th>Gaji</th>
                <th colspan="2">Aksi</th>
            </tr>

            <?php $no=1?>

            <?php foreach ($jabatan as $jbt):?>

            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $jbt->kode_jabatan ?></td>
                <td><?php echo $jbt->desc_jabatan ?></td>
                <td><?php echo 'Rp. ' . number_format($jbt->gaji_jabatan, 0, ',', '.') . ',-'; ?></td>
                <td onclick="javascript: return confirm('Anda Yakin Menghapus ?')"><?php echo anchor('karyawan/hapus_jabatan/'.$jbt->kode_jabatan,'<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?></td>
                <td><div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div></td>
            </tr>
            <?php endforeach; ?>
        </table>

    </section>
    
</div>