<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?= $title ?></h3>
            <?= $this->session->flashdata('message'); ?> 
            <?php sleep(1); unset($_SESSION['message']);?>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kandidat</th>
                        <th>Nama Calon</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php $no = 1;
                foreach($rows as $row) : 
                ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row->nama_kandidat ?></td>
                        <td><?= $row->nama_calon ?></td>
                        <td>
                            <img src="<?= base_url('assets/image/'.$row->foto); ?>" width="150px">
                        </td>
                        <td>
                            <a href="<?= site_url('admin/kandidat/edit/'. $row->id); ?>" 
                            class="btn btn-sm btn-success">
                            <i class="fa fa-pencil-square-o"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>