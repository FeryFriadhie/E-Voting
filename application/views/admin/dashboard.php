<section class="content">
    <div class="row">
        <div class="col-md-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>150</h3>

              <p>Total Users</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">Klik Untuk Info Selanjutnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-md-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>53</h3>

              <p>Total Pemilih</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">Klik Untuk Info Selanjutnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
    </div>
      <div class="row">
        <div class="col-md-12">
          <div class="alert alert-warning alert-dismissible">
                <h4><i class="icon fa fa-warning"></i> Hasil Perolehan Suara</h4>
                <a href="<?= site_url('admin/dashboard'); ?>" class="btn btn-success" style="text-decoration: none;">
                <i class="icon fa fa-refresh"></i> Refresh untuk melihat hasil perolehan suara terbaru</a>
          </div>
        </div>
      </div>
    <canvas id="chartHasilPerolehanSuara" width="400" height="400"></canvas>
</section>

<script>
const ctx = document.getElementById('chartHasilPerolehanSuara').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Calon No.1 OSIS', 'Calon No.2 OSIS', 'Calon No.3 OSIS', 'Calon No.1 MPK', 'Calon No.2 MPK', 'Calon No.3 MPK'],
        datasets: [{
            label: '# Hasil Perolehan Suara',
            data: [12, 19, 25, 29, 33, 14],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
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
