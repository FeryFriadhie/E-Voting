<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?></title>
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/bootstrap.min.css">
</head>
<body>
<section>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2 align="center">Perolehan Suara</h2>
      </div>
    </div>
  </div>
  <canvas id="chartHasilPerolehanSuara" width="300" height="100"></canvas>
</section>
<div class="col-md-10">
<script src="<?= base_url('assets/'); ?>js/Chart.min.js"></script>
<script>
const ctx = document.getElementById('chartHasilPerolehanSuara').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Calon No.1 OSIS', 'Calon No.2 OSIS', 'Calon No.3 OSIS'],
        datasets: [{
            label: '# Hasil Perolehan Suara',
            data: [
              <?= $kandidat1osis ?>,
              <?= $kandidat2osis ?>,
              <?= $kandidat3osis ?>,
            ],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>
  <div class="col">
    <a  class="btn btn-info" href="<?= site_url('admin/dashboard'); ?>">Kembali</a>  
  </div>       
</div>
</body>
</html>


