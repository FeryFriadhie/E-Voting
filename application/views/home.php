<section class="sec1" id="sec1">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h2 class="display-4 text-primary mt-5 h2-sec1">Hallo <?= $this->session->userdata('nama'); ?><br></h2>
        <h5 class="text-secondary p-sec1">Ayo! gunakan hak suara kamu untuk <br> menentukan Ketua dan Wakil Ketua OSIS & MPK</h5>
      </div>
      <div class="col-md-6">
        <img src="<?= base_url('assets/'); ?>image/hero1.png" alt="tampilan" class="img-fluid">
      </div>
    </div>
  </div>
</section>

<section class="sec2" id="sec2">
<div class="container">
  <div class="row">
    <div class="col-md-12">
    <h2 class="display-4 text-primary mt-5 h2-sec2 text-center">Voting</h2>
    <h4 class="display-5 text-secondary mt-3  h4-sec2 text-center mb-5">Calon Ketua & Wakil Ketua OSIS MPK</h4>
    </div>
  </div>

    <div class="row">
        <?php foreach ($kandidat as $knd ) : ?>    
        <div class="col-md-4">
            <div class="card mb-5" style="width: 18rem;">
                <img src="<?= base_url('assets/image/' . $knd->foto); ?> " class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title text-center text-primary font-weight-bold"><?= $knd->nama_kandidat ?></h5>
                    <p class="card-text text-center text-secondary"><?= $knd->nama_calon ?></p>
                    <div class="d-flex justify-content-between">
                        <a href="<?= site_url('home/visimisi/'. $knd->id); ?>" class="btn btn-primary btn-xs mr-3">Lihat Visi & Misi</a>

                        <?php if($user->status == 0) : ?>
                          <a href="#" class="btn btn-success btn-xs ml-3" data-nama_kandidat="<?= $knd->nama_kandidat ?>" data-id_user="<?= $this->session->userdata('id'); ?>
                        ">Pilih <?= $knd->nama_kandidat ?></a>
                            <?php else : ?>
                              <button href="#" class="btn btn-success btn-xs ml-3" disabled>Pilih <?= $knd->nama_kandidat ?></button>
                        <?php endif; ?>
                        
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
</section>

<!-- Modal Login -->
<div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Form Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= site_url('auth/login'); ?>" method="post">
          <div class="form-group">
            <label for="email1" class="text-secondary">Email *</label>
            <input type="email" name="email1" id="email1" class="form-control" placeholder="example@gmail.com" required>
          </div>
          <div class="form-group">
            <label for="password1" class="text-secondary">Password *</label>
            <input type="password" name="password1" id="password1" class="form-control" required>
          </div>
          <button type="submit" class=" btn btn-primary">Sign in</button>
        </form>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>