<?php
if(!isset($_SESSION)) {
     session_start();
}
if (isset($_SESSION['username']) and ($_SESSION['password'])):
?>
    <!-- Main content --><br><br><br><br><br><br><br>
    <section class="content">
      <div class="error-page">
        <h2 class="headline text-yellow"> 404</h2>

        <div class="error-content">
          <h3><i class="fa fa-warning text-yellow"></i> Oops! Halaman Tidak Tersedia</h3>

          <p>
            Halaman Yang Anda Maksud Tidak Tersedia Atau Sudah Kadaluarsa.
            <a href="?">Kembali Ke Beranda</a> 
          </p>
        </div>
        <!-- /.error-content -->
      </div>
      <!-- /.error-page -->
    </section>
<?php 
else:
  echo "<script>;window.location=('index.php');</script>"; 
endif;
?>