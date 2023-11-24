<!-- /.content-wrapper -->
<footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo base_url()?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url()?>assets/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url()?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="<?php echo base_url()?>assets/bower_components/raphael/raphael.min.js"></script>
<script src="<?php echo base_url()?>assets/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url()?>assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo base_url()?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url()?>assets/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url()?>assets/bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo base_url()?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url()?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url()?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url()?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url()?>assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url()?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url()?>assets/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url()?>assets/dist/js/demo.js"></script>

<!-- DataTables -->
<script src="<?php echo base_url() ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>

<!-- page script -->
<script>
  $(document).ready(function () {
    $('#datatables-dt').DataTable({
      "scrollX" : true,
        "ajax": {
            "url": "data_jabatan", // Ganti dengan URL ke controller dan method yang menyajikan data
            "type": "POST", // Sesuaikan dengan metode pengiriman data yang digunakan oleh Anda
            "dataType": "json",
            "dataSrc": "data_jabatan"
        },
        "columns": [
            { "data": "kode_jabatan" },
            { "data": "desc_jabatan" },
            { "data": "gaji_jabatan" },
            { "data": "recruitment" },
        ]
    });
  });
</script>

<script>
  $(document).ready(function () {
    $('#myTable').DataTable({
      "scrollX" : true,
        "ajax": {
            "url": "data_supplier", // Ganti dengan URL ke controller dan method yang menyajikan data
            "type": "POST", // Sesuaikan dengan metode pengiriman data yang digunakan oleh Anda
            "dataType": "json",
            "dataSrc": "data_supplier"
        },
        "columns": [
            { "data": "id_supplier" },
            { "data": "company" },
            { "data": "vendor_id" },
            { "data": "nama_vendor" },
            { "data": "alamat_vendor" },
            { "data": "kota_vendor" },
            { "data": "provinsi_vendor" },
            { "data": "kode_pos_vendor" },
            { "data": "negara_vendor" },
            { "data": "npwp_vendor" },
            { "data": "top_vendor" },
            { "data": "fax_vendor" },
            { "data": "currency_vendor" },
            { "data": "created_at" },
            { "data": "created_by" },
            { "data": "updated_at" },
            { "data": "updated_by" },
            { "data": "npwp_region_vendor" },
            { "data": "ship_via_code_vendor" },
            { "data": "approved_vendor" },
            { "data": "status_vendor" },
            // ... Lanjutkan menambahkan kolom sesuai kebutuhan
        ]
    });
  });
</script>

<script> 
  // Initialize the DataTable 
	  var tabel = null;
    $(document).ready(function() {
        tabel = $('#table-karyawan').DataTable({
            "processing": true,
            "responsive":true,
            "serverSide": true,
            "scrollX" : true,
            "ordering": true, // Set true agar bisa di sorting
            "order": [[ 0, 'asc' ]], // Default sortingnya berdasarkan kolom / field ke 0 (paling pertama)
            "ajax":
            {
                "url": "<?= base_url('datatables/view_data');?>", // URL file untuk proses select datanya
                "type": "POST"
            },
            "deferRender": true,
            "aLengthMenu": [[5, 10, 50],[ 5, 10, 50]], // Combobox Limit
            "columns": [
                {
                  "data": "id_karyawan","sortable": false,
                  render: function (data, type, row, meta) {
                    // Generate unique ID for each checkbox
                    var checkboxId = "karyawanCheckbox_" + meta.row;

                    return '<input value=' + data + ' type="checkbox" id="' + checkboxId + '" onchange="ambilIdKaryawan(\'' + checkboxId + '\')">';
                  }
                },
                {"data": 'id_karyawan',"sortable": false, 
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }  
                },
                { "data": "id_karyawan" }, // Tampilkan judul
                { "data": "nik_karyawan" },  // Tampilkan kategori
                { 
                "data": "email_karyawan",  
                // "render": function(data, type, row, meta) {
                //     // Memformat angka menjadi mata uang Rupiah
                //     return 'Rp. ' + parseInt(data).toLocaleString('id-ID');
                // }
                },  // Tampilkan penulis
                { "data": "nama_karyawan",
                    // render: function(data, type, row, meta) {
                    //     if (data == 0) {
                    //         return '<button type="button" class="btn btn-danger">Tutup</button>';
                    //     } else if (data == 1) {
                    //         return '<button type="button" class="btn btn-success">Buka</button>';
                    //     } else {
                    //         return 'Undefined';
                    //     }
                    // }
                },  // Tampilkan penulis
                { "data": "tgl_lahir",
                    // "render": 
                    // function( data, type, row, meta ) {
                    //     return '<a href="show/'+data+'">Show</a>';
                    // }
                },
                { "data": "alamat_karyawan" },  // Tampilkan kategori
                { "data": "kode_jabatan" },  // Tampilkan kategori
                { "data": "kode_status" },  // Tampilkan kategori
                { "data": "jenis_kelamin" },  // Tampilkan kategori
                { "data": "foto_karyawan" },  // Tampilkan kategori
                { "data": "password" },  // Tampilkan kategori
                { "data": "role_user" },  // Tampilkan kategori
                { "data": "created_at" },  // Tampilkan kategori
                { "data": "created_by" },  // Tampilkan kategori
                { "data": "updated_at" },  // Tampilkan kategori
                { "data": "updated_by" },  // Tampilkan kategori
                { "data": "last_login" },  // Tampilkan kategori
                { "data": "status_login" },  // Tampilkan kategori
                { "data": "id_karyawan",
                    "render": 
                    function( data, type, row, meta ) {
                        return '<a href="<?php echo base_url() ?>karyawan/detail/'+data+'" class="btn btn-success btn-sm"><i class="fa fa-search"></i></a> <a href="<?php echo base_url() ?>karyawan/edit/'+data+'" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a> <a href="<?php echo base_url() ?>karyawan/hapus/'+data+'" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a> ';
                    } 
                },  // Tampilkan kategori
            ],
        });
    });
</script> 

<script>
  // Inisialisasi array untuk menyimpan id_karyawan yang tercentang
  var selectedKaryawan = [];

  function ambilIdKaryawan(checkboxId,checkboxAll = false) {
    // Mendapatkan elemen checkbox
    var checkbox = document.getElementById(checkboxId);
    var valueKaryawan = checkbox.value;  // Gantilah dengan nilai id_karyawan yang sesuai

    // Jika checkbox dicentang, tambahkan nilai id_karyawan ke dalam array
    if (checkbox.checked) {
      console.log("Id Karyawan yang diambil:", valueKaryawan);
      selectedKaryawan.push(valueKaryawan);
    } else {
      // Jika checkbox tidak dicentang, hapus nilai id_karyawan dari array (jika ada)
      var index = selectedKaryawan.indexOf(valueKaryawan);
      if (index !== -1) {
        selectedKaryawan.splice(index, 1);
      }
    }

    // Menampilkan array id_karyawan yang tercentang saat ini

    // Lakukan tindakan lain dengan array id_karyawan
    // Misalnya, kirim array ini ke server atau lakukan operasi lain.
  }

  function handlePrintButtonClick() {
    // Assuming you want to print when at least one employee is selected
    if (selectedKaryawan.length > 0) {
      console.log("Id Karyawan yang tercentang:", selectedKaryawan);
    } else {
      // Inform the user that no employees are selected
      console.log('No employees selected for printing');
    }

  }

  var btnPrint = document.getElementById('btnPrint');
  btnPrint.addEventListener('click', handlePrintButtonClick);


  var checkboxAll = document.getElementById('all');

  // Tambahkan event listener untuk menanggapi perubahan status checkbox
  checkboxAll.addEventListener('change', function () {
    // Ambil nilai (value) checkbox
    var checkboxValue = checkboxAll.checked;

    // Mendapatkan semua elemen checkbox dalam dokumen
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');

    // Mengatur properti checked dari setiap checkbox sesuai dengan nilai checkboxValue
    checkboxes.forEach(function (checkbox) {
      checkbox.checked = checkboxValue;

      // Jika checkbox dicentang, tambahkan nilai id_karyawan ke dalam array
      if (checkboxValue) {
        var valueKaryawan = checkbox.value;
        selectedKaryawan.push(valueKaryawan);
      } else {
        // Jika checkbox tidak dicentang, hapus nilai id_karyawan dari array (jika ada)
        var index = selectedKaryawan.indexOf(checkbox.value);
        if (index !== -1) {
          selectedKaryawan.splice(index, 1);
        }
      }
    });

    // Menampilkan array id_karyawan yang tercentang saat ini
    console.log('Id Karyawan yang tercentang saat ini:', selectedKaryawan);
  });




</script>

</body>
</html>
