<div class="content-wrapper">
    <section class="content-header">
      <h1>
      Data Sidebar 
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="http://localhost/phpmyadmin/"><i class="fa fa-dashboard"></i> Database</a></li>
        <li class="active">Data Sidebar</li>
      </ol>
    </section>

    <section class="content">

    <button class="btn btn-primary" data-toggle="modal" data-target="#inputSidebar"><i class="fa fa-plus"></i> Tambah Data Sidebar</button>

        <table class="table table-bordered table-hover">
            <tr>
                <th>ID Sidebar</th>
                <th>Keterangan Sidebar</th>
                <th>Path</th>
                <th>Icon</th>
                <th>Parrent</th>
                <th>Parrent ID</th>
                <th colspan="2">Aksi</th>
            </tr>

            <?php $no=1?>

            <?php foreach ($sidebar as $sidebar):?>

            <tr>
                <td><?php echo $sidebar->id_sidebar ?></td>
                <td><?php echo $sidebar->desc_sidebar ?></td>
                <td><?php echo $sidebar->path ?></td>
                <td><?php echo $sidebar->icon ?></td>
                <td><?php echo $sidebar->parrent ?></td>
                <td><?php echo $sidebar->parrent_id ?></td>
                <td onclick="javascript: return confirm('Anda Yakin Menghapus ?')"><?php echo anchor('admin/hapus_sidebar/'.$sidebar->id_sidebar,'<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?></td>
                <td><div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div></td>
            </tr>
            <?php endforeach; ?>
        </table>

    </section>
    
</div>