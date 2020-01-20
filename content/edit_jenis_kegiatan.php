<?php
if(!isset($_SESSION)) {
     session_start();
}
if (isset($_SESSION['username']) and ($_SESSION['password'])):
?>
<script src="https://cdn.ckeditor.com/4.11.2/standard/ckeditor.js"></script>
<?php 
    error_reporting(0);
    $id = $_GET['trJkId'];
    $Jk = $con->query("select * from r_jenis_kegiatan where trJkId = $id");
    $query = $Jk->fetch_assoc();
?>
<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Jenis Kegiatan </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method='post' enctype="multipart/form-data" action='content/aksi/editdeletejeniskegiatan.php?trJkId=<?php echo $id ?>'>
              <div class="box-body">
                <div class="form-group">
                  <label for="judul">Nama Kategori</label>
                  <input type="text" class="form-control" id="trJkNama" value='<?php echo $query['trJkNama'] ?>' name='trJkNama' placeholder="Nama Kategori" required>
                </div>
              </div>
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