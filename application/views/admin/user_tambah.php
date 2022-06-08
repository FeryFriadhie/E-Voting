<section class="content">
    <div class="box">
            <div class="box-header">
            <h3 class="box-title"><?= $title ?></h3>
            <?= $this->session->flashdata('message'); ?> 
            <?php sleep(1); unset($_SESSION['message']);?>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form action="<?= site_url('admin/user/simpan'); ?>" method="post">
                <div class="form-group">
                    <label for="id_kelas">Kelas</label>
                    <select type="text" name="id_kelas" id="id_kelas" class="form-control">
                    <?php foreach($kelas as $kls) : ?>
                        <option value="<?= $kls->id ?>"><?= $kls->nama ?></option>
                    <?php endforeach; ?>    
                    </select>    
                </div>
                    <div class="form-group">
                        <label for="nama">Nama *</label>
                        <input type="text" name="nama" id="nama" class="form-control" required>
                    </div>
                    <!-- diganti dengan nis -->
                    <div class="form-group">
                        <label for="email">Email *</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password *</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="level">Level</label>
                        <select type="text" name="level" id="level" class="form-control" required>
                            <option value="admin">Admin</option>
                            <option value="siswa">Siswa</option>
                        </select>
                    </div>
            
                <a href="<?= site_url('admin/user'); ?>" class="btn bg-maroon"><i class="fa fa-arrow-left">
                </i> Kembali</a>
                <button type="submit" class="btn bg-navy"><i class="fa fa-save"></i> Simpan</button>
            </form>
            </div>
    </div>
</section>
