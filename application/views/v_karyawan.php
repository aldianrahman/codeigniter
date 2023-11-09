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

    <button class="btn btn-primary" data-toggle="modal" data-target="#inputKaryawan"><i class="fa fa-plus"></i> Tambah Data Karyawan</button>

        <table class="table">
            <tr>
                <th>No.</th>
                <th>Nama Karyawan</th>
                <th>Tanggal Lahir</th>
                <th>Alamat</th>
                <th>Jabatan</th>
            </tr>

            <?php $no=1?>

            <?php foreach ($karyawan as $krw):?>

            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $krw->nama_karyawan ?></td>
                <td><?= date("j F Y", strtotime($krw->tgl_lahir)) ?></td>
                <td><?php echo $krw->alamat_karyawan ?></td>
                <td><?php echo $krw->desc_jabatan ?></td>
            </tr>
            <?php endforeach; ?>
        </table>

    </section>
</div>