<div class="content-wrapper">
    <section class="content">
        <h4><strong>Detail Data Karyawan</strong></h4>

        <table class="table">

            <tr>
                <td><img src="<?php echo base_url(); ?>assets/foto_karyawan/<?php echo $karyawan->foto_karyawan; ?>" width="90" height="110"></td>
            </tr>

            <tr>
                <th>NIK Karyawan</th>
                <td><?php echo $karyawan->nik_karyawan ?></td>
            </tr>

            <tr>
                <th>Email Karyawan</th>
                <td><?php echo $karyawan->email_karyawan ?></td>
            </tr>

            <tr>
                <th>Nama Karyawan</th>
                <td><?php echo $karyawan->nama_karyawan ?></td>
            </tr>

            <tr>
                <th>Tanggal Lahir</th>
                <td><?= date("j F Y", strtotime($karyawan->tgl_lahir)) ?></td>
            </tr>

            <tr>
                <th>Alamat Karyawan</th>
                <td><?php echo $karyawan->alamat_karyawan ?></td>
            </tr>

            <tr>
                <th>Jabatan</th>
                <td><?php echo $karyawan->desc_jabatan ?></td>
            </tr>

            <tr>
                <th>Gaji</th>
                <td>Rp. <?php echo number_format($karyawan->gaji_jabatan, 0, ',', '.') ?>,-</td>
            </tr>

        </table>

        <a href="<?php echo base_url('karyawan/list') ?>" class="btn btn-primary">Kembali</a>
    </section>
</div>