<div class="card">
    <div class="card-header"> 
        <h4> Select One Table</h4>
    </div>
    <div class="card-body">
        <table class="table table-striped table-bordered" id="table-artikel">
            <thead>
                <tr>
                    <th> No. </th>
                    <th> ID Jabatan</th>
                    <th> Keterangan Jabatan </th>
                    <th> Gaji Jabatan </th>
                    <th> Recruitment </th>
                    <th> Aksi </th>

                    
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>
<!-- Optional JavaScript -->
<script>
    var tabel = null;
    $(document).ready(function() {
        tabel = $('#table-artikel').DataTable({
            "processing": true,
            "responsive":true,
            "serverSide": true,
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
                {"data": 'kode_jabatan',"sortable": false, 
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }  
                },
                { "data": "kode_jabatan" }, // Tampilkan judul
                { "data": "desc_jabatan" },  // Tampilkan kategori
                { 
                "data": "gaji_jabatan",  
                "render": function(data, type, row, meta) {
                    // Memformat angka menjadi mata uang Rupiah
                    return 'Rp. ' + parseInt(data).toLocaleString('id-ID');
                }
            },  // Tampilkan penulis
            { "data": "recruitment",
                    render: function(data, type, row, meta) {
                        if (data == 0) {
                            return '<button type="button" class="btn btn-danger">Tutup</button>';
                        } else if (data == 1) {
                            return '<button type="button" class="btn btn-success">Buka</button>';
                        } else {
                            return 'Undefined';
                        }
                    }
                },  // Tampilkan penulis
                { "data": "kode_jabatan",
                    "render": 
                    function( data, type, row, meta ) {
                        return '<a href="show/'+data+'">Show</a>';
                    }
                },
            ],
        });
    });
</script>