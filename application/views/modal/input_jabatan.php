<!-- Modal -->
<div class="modal fade" id="inputJabatan" tabindex="-1" role="dialog" aria-labelledby="inputJabatanLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="inputJabatanLabel">Form Input Data Jabatan</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
          <form method="post" action="<?php echo base_url().'karyawan/tambah_jabatan'; ?>" onsubmit="return validateForm();">

            <div class="form-group">
              <label for="desc_jabatan">Jabatan</label>
              <input type="text" name="desc_jabatan" id="desc_jabatan" class="form-control">
            </div>

            <div class="form-group">
              <label for="gaji_jabatan">Gaji</label>
              <input type="text" name="gaji_jabatan" id="gaji_jabatan" class="form-control">
            </div>

            <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
            </form>

            

          </div>
        </div>
      </div>
    </div>

<script>
  function validateForm() {
  var jabatan = document.getElementById("desc_jabatan").value;
  var gaji = document.getElementById("gaji_jabatan").value;

  if (jabatan === "") {
    alert("Harap isi Jabatan");
    return false; // Menghentikan pengiriman formulir jika ada bidang yang kosong
  }else if(gaji === ""){
    alert("Harap isi Gaji");
    return false;
  }

  // Lanjutkan dengan pengiriman formulir jika semua bidang terisi
  return true;
  }
</script>

    

