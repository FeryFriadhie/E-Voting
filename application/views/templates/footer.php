<footer>
  <p class="text-secondary">© Copyright E-Voting SMKN 1 Ciamis 2022</p>
</footer> 
 
 <script src="<?= base_url('assets/'); ?>js/jquery-3.5.1.min.js"></script>
    <script src="<?= base_url('assets/'); ?>js/popper.min.js"></script>
    <script src="<?= base_url('assets/'); ?>js/bootstrap.min.js"></script>
    <script src="<?= base_url('assets/'); ?>sweetalert2/package/dist/sweetalert2.all.min.js"></script>

    <script>
      $(document).ready(function() {
        $('.nav-active').on('click', function() {
        $('.nav-active').removeClass('active');
        $(this).addClass('active');
        });

        $('.btn-success').on('click', function () {
            let nama_kandidat = $(this).data('nama_kandidat');
            let id_user = $(this).data('id_user');
            Swal.fire({
      title: 'Apakah anda yakin?',
      icon: 'question',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yakin'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          type: 'post',
          url: '<?= site_url('home/pilih_kandidat'); ?>',
          dataType: 'json',
          data: {
            'nama_kandidat': nama_kandidat,
            'id_user': id_user,
          },
          success: function (result) {
            if (result.success == true) {
                Swal.fire({
                title: 'Terimakasih sudah berpartisipasi',
                icon: 'success',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ok'
              }).then((result) => {
                if (result.isConfirmed) {
                  location.reload();
                }
              })
            }
         }
        })
      }
    })
      });
    });
    </script>
  </body>
</html>