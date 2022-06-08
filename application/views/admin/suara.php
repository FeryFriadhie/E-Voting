<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?= $title ?></h3>
            <?= $this->session->flashdata('message'); ?> 
            <?php sleep(1); unset($_SESSION['message']); ?>       
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama User</th>
                        <th>Nama Kandidat</th>
                        <th>Created</th>
                    </tr>
                </thead>
                <tbody>
                <?php $no = 1;
                foreach($rows as $row) : 
                ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row->nama_user ?></td>
                        <td><?= $row->nama_kandidat ?></td>
                        <td><?= $row->created ?></td>

                        <td>
                            <a href="<?= site_url('admin/suara/hapus/' . $row->id_suara); ?>" 
                            class="btn btn-sm btn-danger" onclick="return confirm ('Yakin Hapus?') ">
                            <i class="fa fa-trash-o"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>