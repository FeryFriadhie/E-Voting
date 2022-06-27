<section class="content">
    <div class="box">
        <div class="box-header">
            <?= $this->session->flashdata('message'); ?> 
            <?php sleep(1); unset($_SESSION['message']);?>
            <a href="<?= site_url('admin/kelas/tambah'); ?>" 
            class="btn bg-maroon"><i class="fa fa-plus-circle"></i> Tambah Kelas</a>          
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kelas</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php $no = 1;
                foreach($rows as $row) : 
                ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row->nama ?></td>
                        <td>
                            <div class="dropdown">
                                <a id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-ellipsis-v"></i></a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item btn btn-sm btn-success" href="<?= site_url('admin/kelas/edit/' . $row->id); ?>" >
                                    <i class="fa fa-pencil-square-o"></i></a>
                                    <a class="dropdown-item btn btn-sm btn-danger" href="<?= site_url('admin/kelas/hapus/' . $row->id); ?>" 
                                    onclick="return confirm ('Yakin Hapus?') ">
                                    <i class="fa fa-trash-o"></i></a>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>