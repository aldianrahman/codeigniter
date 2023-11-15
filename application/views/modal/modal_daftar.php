<!-- Button trigger modal -->
    

    <!-- Modal -->
    <div class="modal fade" id="inputKaryawan" tabindex="-1" role="dialog" aria-labelledby="inputKaryawanLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="inputKaryawanLabel">Form Recruitment Luby</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
          <!-- <form method="post" action="<?php echo base_url().'karyawan/tambah_karyawan'; ?>" onsubmit="return validateFormKaryawan();"> -->
            <?php echo form_open_multipart('karyawan/tambah_karyawan');?>

            <div class="form-group">
                <label for="foto_karyawan">Role</label>
                <select name="role_user" class="form-control">
                <option value="1">Super Admin</option>
                <option value="2">Karyawan</option>
                <option value="3">Admin</option>
                </select>
            </div>

            <div class="form-group">
                <label for="foto_karyawan">Foto Karyawan</label>
                <input type="file" name="foto_karyawan" class="form-control"required>
            </div>

            <div class="form-group">
                <label for="nik_karyawan">NIK Karyawan</label>
                <input type="text" name="nik_karyawan" class="form-control"required>
            </div>

            <div class="form-group">
                <label for="email_karyawan">Email Karyawan</label>
                <input type="text" name="email_karyawan" class="form-control"required>
            </div>

            <div class="form-group">
                <label for="nama_karyawan">Nama Karyawan</label>
                <input type="text" name="nama_karyawan" class="form-control"required>
            </div>

            <div class="form-group">
                <label for="tgl_lahir">Tanggal Lahir</label>
                <input type="date" name="tgl_lahir" class="form-control"required>
            </div>

            <div class="form-group">
                <label for="alamat_karyawan">Alamat</label>
                <input type="text" name="alamat_karyawan" class="form-control"required>
            </div>

          <div class="form-group">
              <label for="kode_jabatan">Kode Jabatan</label>
              <select name="kode_jabatan" class="form-control">
                  <?php foreach($jabatan as $jbt): ?>
                      <option value="<?php echo $jbt->kode_jabatan ?>"><?php echo $jbt->desc_jabatan ?></option>
                  <?php endforeach;?>
              </select>
          </div>

          <div class="form-group">
              <label for="jenis_kelamin">Jenis Kelamin</label>
              <select name="jenis_kelamin" class="form-control">
                  <option value="Laki-Laki">Laki-Laki</option>
                  <option value="Perempuan">Perempuan</option>
              </select>
          </div>

          <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
          <!-- </form> -->
          <?php echo form_close(); ?>
          </div>
        </div>
      </div>
    </div>

<script>
  function validateFormKaryawan() {
  var nik_karyawan = document.getElementsByName("nik_karyawan")[0].value;
  var email_karyawan = document.getElementsByName("email_karyawan")[0].value;
  var nama_karyawan = document.getElementsByName("nama_karyawan")[0].value;
  var tgl_lahir = document.getElementsByName("tgl_lahir")[0].value;
  var alamat_karyawan = document.getElementsByName("alamat_karyawan")[0].value;
  var jenis_kelamin = document.getElementsByName("jenis_kelamin")[0].value;
  var foto_karyawan = document.getElementsByName("foto_karyawan")[0].value;

  if(role_user===""){
      alert("Harap isi NIK Karyawan");
      return false; // Menghentikan pengiriman formulir jika ada bidang yang kosong
  }else if(nik_karyawan===""){
      alert("Harap isi NIK Karyawan");
      return false; // Menghentikan pengiriman formulir jika ada bidang yang kosong
  }else if (email_karyawan === "") {
      alert("Harap isi Email Karyawan");
      return false; // Menghentikan pengiriman formulir jika ada bidang yang kosong
  }else if (nama_karyawan === "") {
      alert("Harap isi Nama Karyawan");
      return false; // Menghentikan pengiriman formulir jika ada bidang yang kosong
  }else if(tgl_lahir===""){
      alert("Harap isi Tanggal Lahir");
      return false; // Menghentikan pengiriman formulir jika ada bidang yang kosong
  }else if(alamat_karyawan===""){
      alert("Harap isi Alamat Karyawan");
      return false; // Menghentikan pengiriman formulir jika ada bidang yang kosong
  }else if(jenis_kelamin===""){
      alert("Harap isi Jenis Kelamin");
      return false; // Menghentikan pengiriman formulir jika ada bidang yang kosong
  }

  // Lanjutkan dengan pengiriman formulir jika semua bidang terisi
  return true;
  }
</script>
