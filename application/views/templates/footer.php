<footer>
  <p class="text-secondary">© Copyright E-Voting SMKN 1 Ciamis 2022</p>
</footer> 
 
 <script src="<?= base_url('assets/'); ?>js/jquery-3.5.1.min.js"></script>
    <script src="<?= base_url('assets/'); ?>js/popper.min.js"></script>
    <script src="<?= base_url('assets/'); ?>js/bootstrap.min.js"></script>

    <script>
      $(document).ready(function() {
        $('.nav-active').on('click', function() {
        $('.nav-active').removeClass('active');
        $(this).addClass('active');
        });
      });
    </script>
  </body>
</html>