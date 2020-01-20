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
              <h3 class="box-title">Tambah jenis kegiatan </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method='post' enctype="multipart/form-data" action='content/aksi/tambahjeniskegiatan.php'>
              <div class="box-body">
                <div class="form-group">
                  <label for="judul">Nama kegiatan</label>
                  <input type="text" class="form-control" id="trJkNama" name='trJkNama' placeholder="Nama Kegiatan" required>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <input type="submit" name='posting' class='btn btn-info' value="Posting">
                * Jangan Refresh halaman (Tunggu Sampai Proses Upload Selesai)
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