<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Scada&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/style.css">
    <style>
      .img-circle {
        display: block;
        border-radius: 50%;
        margin: 20px auto;
        padding: 30px;
      }
    </style>
  </head>
  <body>

  <nav class="navbar navbar-expand-lg navbar-light 
  shadow-sm p-3 mb-5 bg-white rounded fixed-top">
  <div class="container">
  <a class="navbar-brand text-primary" href="#"><h3><b>E-VOTING</b></h3></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <?php if($this->session->userdata('id') != NULL) : ?>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link nav-active active" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link nav-active" href="#sec2">Voting</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?= $this->session->userdata('nama'); ?> 
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="<?= site_url('auth/logout'); ?>">Logout</a>
          </div>
        </li>
      </ul>
    </div>
  <?php endif; ?>
  </div>
</nav>