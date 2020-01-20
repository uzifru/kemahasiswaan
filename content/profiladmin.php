<?php
if(!isset($_SESSION)) {
     session_start();
}
if (isset($_SESSION['username']) and ($_SESSION['password'])):
?><?php 
    $namadepan = $_SESSION['namadepan'];
    $namabelakang = $_SESSION['namabelakang'];
    $username = $_SESSION['username'];
?>
<script src="https://cdn.ckeditor.com/4.11.2/standard/ckeditor.js"></script>
<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Profil Admin </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php 
                if(@$_GET['success'] == 1):
                    echo"<p class='bg-success'>Profil Berhasil Di Update, Logout Untuk Mematikan Sesi Dan Lihat Perubahannya!</p>";
                endif;
            ?>
            <form role="form" method='post' enctype="multipart/form-data" action='content/aksi/gantiprofiladmin.php'>
              <div class="box-body">
                <div class="form-group">
                  <label for="judul2">Nama Depan</label>
                  <input type="text" class="form-control" value='<?php echo $namadepan ?>' id="judul2" minlength='5' name='namadepan' placeholder="Nama Depan" required>
                </div>
                <div class="form-group">
                  <label for="judul3">Nama Belakang</label>
                  <input type="text" class="form-control"  value='<?php echo $namabelakang ?>' id="judul3" minlength='5' name='namabelakang' placeholder="Nama Belakang Anda" required>
                </div>
                <div class="form-group">
                  <label for="judul1">Username</label>
                  <input type="text" class="form-control" value='<?php echo $username ?>' id="judul1" minlength='5' name='username' placeholder="Username Untuk Login" required>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <input type="submit" name='posting' class='btn btn-info' value="Update Profil">
              </div>
            </form>
          </div>
    </div>
    </div>
</section>
<script>
    CKEDITOR.replace( 'deskripsi' );
</script>
<?php 
else:
  echo "<script>;window.location=('index.php');</script>"; 
endif;
?>