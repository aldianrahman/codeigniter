<div class="content-wrapper">
    <section class="content">
    <h4><strong>Edit Data Karyawan</strong></h4>

    <?php foreach ($karyawan as $krw) :?>

        <form action="<?php echo base_url().'karyawan/update'; ?>" method="post">

        <div class="form-group">
            <img src="<?php echo base_url(); ?>assets/foto_karyawan/<?php echo $krw->foto_karyawan; ?>" width="90" height="110">
        </div>

        <div class="form-group">
            <label for="">NIK Karyawan</label>
            <input type="hidden" name="id_karyawan" class="form-control" value="<?php echo $krw->id_karyawan ?>" id="">
            <input type="hidden" name="kode_jabatan" class="form-control" value="<?php echo $krw->kode_jabatan ?>" id="">
            <input type="hidden" name="kode_status" class="form-control" value="<?php echo $krw->kode_status ?>" id="">
            <input type="text" name="nik_karyawan" class="form-control" value="<?php echo $krw->nik_karyawan ?>" id="" readonly>
        </div>

        <div class="form-group">
            <label for="">Email Karyawan</label>
            <input type="text" name="email_karyawan" class="form-control" value="<?php echo $krw->email_karyawan ?>" id="">
        </div>

        <div class="form-group">
            <label for="">Nama Karyawan</label>
            <input type="text" name="nama_karyawan" class="form-control" value="<?php echo $krw->nama_karyawan ?>" id="">
        </div>

        <div class="form-group">
            <label for="">Tanggal Lahir</label>
            <input type="date" name="tgl_lahir" class="form-control" value="<?php echo $krw->tgl_lahir ?>" id="">
        </div>

        <div class="form-group">
            <label for="">Alamat</label>
            <input type="text" name="alamat_karyawan" class="form-control" value="<?php echo $krw->alamat_karyawan ?>" id="">
        </div>

        <div class="form-group">
            <label for="">Jabatan</label>
            <input type="text" name="desc_jabatan" class="form-control" value="<?php echo $krw->desc_jabatan ?>" id="" readonly>
        </div>

        <div class="form-group">
            <label for="">Jenis Kelamin</label>
            <input type="text" name="jenis_kelamin" class="form-control" value="<?php echo $krw->jenis_kelamin ?>" id="" readonly>
        </div>        

        <?php endforeach;?>

        <!-- <button class="btn btn-danger" onclick=\"location.href='" . base_url() . "karyawan/aktivasi_karyawan/" . $nik . "'\">Kembali</button> -->
        <a href="<?php echo base_url('karyawan/list') ?>" class="btn btn-danger">Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan</button>

        </form>

    </section>
</div>