<section class="content">
    <div class="box">
        <div class="box-header">
            <?= $this->session->flashdata('message'); ?> 
            <?php sleep(1); unset($_SESSION['message']);?>
            <a href="<?= site_url('admin/user/tambah'); ?>" 
            class="btn bg-maroon"><i class="fa fa-plus-circle"></i> Tambah User</a>          
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Kelas</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Level</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php $no = 1;
                foreach($rows as $row) : 
                ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row->nama_kelas ?></td>
                        <td><?= $row->nama_user ?></td>
                        <td><?= $row->email ?></td>
                        <td>
                            <?php if($row->status == 1 ) {?>
                            <button type="button" class="btn btn-info" ><i class="fa fa-check"></i> Sudah Memilih</button>                             
                            <?php } else { ?>
                                <button type="button" class="btn btn-danger" ><i class="fa fa-pencil"></i> Belum Memilih</button>
                            <?php } ?>
                        </td>
                        <td><?= $row->level ?></td>
                        <td>
                            <a href="<?= site_url('admin/user/edit/' . $row->id_user); ?>" 
                            class="btn btn-sm btn-success">
                            <i class="fa fa-pencil-square-o"></i></a>
                            <a onclick = "return confirm('Yakin hapus?')" href="<?= site_url('admin/user/hapus/' . $row->id_user); ?>" 
                            class="btn btn-sm btn-danger">
                            <i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>