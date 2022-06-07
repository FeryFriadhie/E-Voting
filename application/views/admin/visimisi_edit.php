<section class="content">
    <div class="box">
            <div class="box-header">
            <h3 class="box-title"><?= $title ?></h3>
            <?= $this->session->flashdata('message'); ?> 
            <?php sleep(1); unset($_SESSION['message']);?>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form action="<?= site_url('admin/visi_misi/update'); ?>" method="post">
                <input type="hidden" name="id" value="<?= $row->id ?>">
                <div class="form-group">
                    <label for="id_kandidat">Nama Kandidat</label>
                    <select type="text" name="id_kandidat" id="id_kandidat" class="form-control">
                    <?php foreach($kandidat as $knd) : ?>
                        <option value="<?= $knd->id ?>" <?= $row->id_kandidat == $knd->id ? 'selected'
                        : ''?>><?= $knd->nama_kandidat ?></option>
                    <?php endforeach; ?>    
                    </select>    
                </div>

                <div class="form-group">
                    <label for="visi">Visi</label>
                    <textarea name="visi" id="visi" class="form-control ckeditor" required>
                    <?= $row->visi ?>
                    </textarea>
                </div>
                <div class="form-group">
                    <label for="misi">Misi</label>
                    <textarea name="misi" id="misi" class="form-control ckeditor" required>
                    <?= $row->misi ?>
                    </textarea>
                </div>
                <a href="<?= site_url('admin/visi_misi'); ?>" class="btn bg-maroon"><i class="fa fa-arrow-left">
                </i> Kembali</a>
                <button type="submit" class="btn bg-navy"><i class="fa fa-save"></i> Update</button>
            </form>
            </div>
    </div>
</section>
