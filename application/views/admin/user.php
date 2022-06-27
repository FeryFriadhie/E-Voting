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
        <?= form_open_multipart('admin/user/uploaddata'); ?>
            <div class="form-row">
                <div class="col-md-3">
                   <input type="file" class="form-control-file" id="importexcel" name="importexcel" accept=".xlsx, .xls">
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-warning"><i class="fa fa-plus-circle"></i> Import User</button>
                </div>
            </div>
        <?= form_close(); ?>
        </div>
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
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
                            <div class="dropdown">
                                <a id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-ellipsis-v"></i></a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item btn btn-sm btn-success" href="<?= site_url('admin/user/edit/' . $row->id_user); ?>" >
                                    <i class="fa fa-pencil-square-o"></i></a>
                                    <a class="dropdown-item btn btn-sm btn-danger" onclick = "return confirm('Yakin hapus?')" href="<?= site_url('admin/user/hapus/' . $row->id_user); ?>" >
                                    <i class="fa fa-trash"></i></a>
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