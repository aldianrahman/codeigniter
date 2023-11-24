<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Karyawan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            text-align: center;
        }

        section {
            margin-top: 20px;
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

        img {
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 5px;
            width: 150px;
            display: block;
            margin: 0 auto;
        }
    </style>
</head>

<body>

    <div class="content">
        <section>
            <h1>Detail Karyawan</h1>

            <img src="<?php echo base_url()?>assets/foto_karyawan/<?php echo $karyawan->foto_karyawan ?>" alt="">

            <table>
                <tr>
                    <td>Nama</td>
                    <td><?php echo $karyawan->nama_karyawan ?></td>
                </tr>
                <tr>
                    <td>NIK</td>
                    <td><?php echo $karyawan->nik_karyawan ?></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td><?php echo $karyawan->alamat_karyawan ?></td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td><?php echo $karyawan->jenis_kelamin ?></td>
                </tr>
                <tr>
                    <td>Tanggal Lahir</td>
                    <td><?= date("j F Y", strtotime($karyawan->tgl_lahir)) ?></td>
                </tr>
                <tr>
                    <td>Email Karyawan</td>
                    <td><?php echo $karyawan->email_karyawan ?></td>
                </tr>
                <tr>
                    <td>Jabatan</td>
                    <td><?php echo $karyawan->desc_jabatan ?></td>
                </tr>
                <tr>
                    <td>Gaji</td>
                    <td><?php echo 'Rp. ' . number_format($karyawan->gaji_jabatan, 0, ',', '.') . ',-' ?></td>
                </tr>
            </table>
        </section>
    </div>

    <script type="text/javascript">
        window.print();
    </script>

</body>

</html>
