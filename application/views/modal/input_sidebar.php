<!-- Modal -->
<div class="modal fade" id="inputSidebar" tabindex="-1" role="dialog" aria-labelledby="inputSidebarLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="inputSidebarLabel">Form Input Data Sidebar</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
          <form method="post" action="<?php echo base_url().'admin/tambah_sidebar'; ?>" onsubmit="return validateForm();">

            <div class="form-group">
              <label for="desc_sidebar">Keterangan Sidebar</label>
              <input type="text" name="desc_sidebar" id="desc_sidebar" class="form-control">
            </div>

            <div class="form-group">
              <label for="path">Path</label>
              <input type="text" name="path" id="path" class="form-control">
            </div>

            <div class="form-group">
              <label for="icon">Icon</label>
              <input type="text" name="icon" id="icon" class="form-control">
            </div>

            <div class="form-group">
                <label for="parrent">Parrent</label>
                <select name="parrent" id="parrent" class="form-control">
                        <option value="<?php echo 0 ?>"><?php echo "Tidak" ?></option>
                        <option value="<?php echo 1 ?>"><?php echo "Ya" ?></option>
                </select>
            </div>

            <div class="form-group">
                <label for="parrent_id">Parrent ID</label>
                <select name="parrent_id" id="parrent_id" class="form-control">
                <option value="0">Tidak</option>
                    <?php foreach($parrent_sidebar as $ps): ?>
                            <option value="<?php echo $ps->id_sidebar ?>"><?php echo $ps->desc_sidebar ?></option>
                    <?php endforeach;?>
                </select>
            </div>

            <div class="form-group">
                <label for="role">Role</label>
                <select name="role" id="role" class="form-control">
                        <option value=1><?php echo "ADMIN" ?></option>
                        <option value=2><?php echo "USER" ?></option>
                </select>
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
  var keterangan = document.getElementById("desc_sidebar").value;
  var path = document.getElementById("path").value;
  var icon = document.getElementById("icon").value;
  var parrent = document.getElementById("parrent").value;
  var parrent_id = document.getElementById("parrent_id").value;

  if (keterangan === "") {
    alert("Harap isi Keterangan");
    return false; // Menghentikan pengiriman formulir jika ada bidang yang kosong
  }else if(path === ""){
    alert("Harap isi Path");
    return false;
  }else if(icon === ""){
    alert("Harap isi Icon");
    return false;
  }else if(parrent === ""){
    alert("Harap isi Parrent");
    return false;
  }else if(parrent_id === ""){
    alert("Harap isi Parrent Id");
    return false;
  }

  // Lanjutkan dengan pengiriman formulir jika semua bidang terisi
  return true;
  }
</script>

    

