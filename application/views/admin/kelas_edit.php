<section class="content">
    <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?= $title ?></h3>        
            </div>
            <!-- /.box-header -->
        <div class="box-body">
                <form action="<?= site_url('admin/kelas/update'); ?>" method="post">
                <input type="hidden" name="id" value="<?= $row->id ?>">
                <table id="table" width="30%">
                    <tr>
                        <td>
                            <div class="form-group">
                                <label for="nama">Nama Kelas *</label>
                                <input type="text" name="nama" id="nama" class="form-control" required
                                value="<?= $row->nama ?>">
                            </div>
                        </td>
                    </tr>
                </table>
                <a href="<?= site_url('admin/kelas'); ?>" class="btn bg-maroon"><i class="fa fa-arrow-left">
                </i> Kembali</a> 
                <button type="submit" class="btn bg-navy"><i class="fa fa-save"></i> Update</button>
            </form>
        </div>
    </div>
</section>