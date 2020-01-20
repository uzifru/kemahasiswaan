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
              <h3 class="box-title">Tambah Fasilitas </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method='post' enctype="multipart/form-data" action='content/aksi/tambahfasilitas.php'>
              <div class="box-body">
                <div class="form-group">
                  <label for="judul">Nama Fasilitas</label>
                  <input type="text" class="form-control" id="fsNama" name='fsNama' placeholder="Nama Fasilitas" required>
                </div>
                <div class="form-group">
                  <label for="desk">Deskripsi</label>
                  <textarea id='fsDeskripsi' name="fsDeskripsi"></textarea>
                </div>
                <div class="form-group">
                  <label for="foto">Foto</label>
                  <input type="file" name='fupload' id="fsFoto" placeholder='Masukan foto' required>
                  <p class="help-block">foto fasilitas</p>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <input type="submit" name='posting' class='btn btn-info' value="Posting">
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