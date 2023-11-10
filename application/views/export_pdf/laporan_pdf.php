<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Karyawan Aktif</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        h1 {
            text-align: center;
        }
    </style>
</head><body>

    <h3 style="text_align: center">Daftar Karyawan Aktif</h3>

    <table>
        <tr>
            <th>No.</th>
            <th>NIK</th>
            <th>Email Karyawan</th>
            <th>Nama Karyawan</th>
            <th>Tanggal Lahir</th>
            <th>Alamat</th>
            <th>Jabatan</th>
            <th>Jenis Kelamin</th>
        </tr>

        <?php $no = 1; ?>
        <?php foreach ($karyawan as $krw) : ?>

            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $krw->nik_karyawan ?></td>
                <td><?php echo $krw->email_karyawan ?></td>
                <td><?php echo $krw->nama_karyawan ?></td>
                <td><?= date("j F Y", strtotime($krw->tgl_lahir)) ?></td>
                <td><?php echo $krw->alamat_karyawan ?></td>
                <td><?php echo $krw->desc_jabatan ?></td>
                <td><?php echo $krw->jenis_kelamin ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

</body></html>
