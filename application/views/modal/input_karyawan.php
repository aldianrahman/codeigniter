<!-- Button trigger modal -->
    

    <!-- Modal -->
    <div class="modal fade" id="inputKaryawan" tabindex="-1" role="dialog" aria-labelledby="inputKaryawanLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="inputKaryawanLabel">Form Input Data Karyawan</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="post" action="<?php echo base_url().'karyawan/tambah_karyawan'; ?>">

              <div class="form-group">
                <label for="">Nama Karyawan</label>
                <input type="text" name="nama_karyawan" class="form-control">
              </div>

              <div class="form-group">
                <label for="">Tanggal Lahir</label>
                <input type="date" name="tgl_lahir" class="form-control">
              </div>

              <div class="form-group">
                <label for="">Alamat</label>
                <input type="text" name="alamat_karyawan" class="form-control">
              </div>

              <div class="form-group">
                <label for="kode_jabatan">Kode Jabatan</label>
                <select name="kode_jabatan" class="form-control">
                
                  <?php foreach($jabatan as $jbt): ?>

                  <option value="<?php echo $jbt->kode_jabatan ?>"><?php echo $jbt->desc_jabatan ?></option>

                  <?php endforeach;?>
                

                    <!-- <option value="2">Jabatan 2</option>
                    <option value="3">Jabatan 3</option> -->
                    <!-- Tambahkan opsi lain sesuai dengan kode jabatan yang ada -->

                </select>
            </div>

              <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
              <button type="submit" class="btn btn-primary">Simpan</button>

            </form>
          </div>
        </div>
      </div>
    </div>