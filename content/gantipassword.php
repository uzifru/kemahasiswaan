<?php
if(!isset($_SESSION)) {
     session_start();
}
if (isset($_SESSION['username']) and ($_SESSION['password'])):
?>
<script src="https://cdn.ckeditor.com/4.11.2/standard/ckeditor.js"></script>
<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Ganti Password </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
           
            <form role="form" method='post' enctype="multipart/form-data" action='content/aksi/gantipassword.php'>
              <div class="box-body">
                <?php 
                    if(@$_GET['error'] == 1):
                        echo"<p class='bg-danger'>Password dan konfir password harus Sama</p>";
                    elseif(@$_GET['success'] == 1):
                        echo"<p class='bg-success'>Password Berhasil Di Ubah</p>";
                    endif;
                ?>
                <div class="form-group">
                  <label for="judul2">Password Baru</label>
                  <input type="password" class="form-control" id="judul2" minlength='5' name='password' placeholder="Password Baru" required>
                </div>


                <div class="form-group">
                  <label for="judul3">Konfir Password Baru</label>
                  <input type="password" class="form-control" id="judul3" minlength='5' name='konfirpassword' placeholder="Konfir Password Baru" required>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <input type="submit" name='posting' class='btn btn-info' value="Ganti Password">
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