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
              <h3 class="box-title">Tambah harga sewa</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method='post' enctype="multipart/form-data" action='content/aksi/tambahharga.php'>
              <div class="box-body">
                <div class="form-group">
                  <label>Nama Fasilitas</label><br>
                  <div class="col-sm-5">
                    <select class="form-control" id="hsFasilitas" name="hsFasilitas" required>
                      <option value=""></option>
                      <?php
                        $query_fs =  $con->query("select * from fasilitas order by fsId ASC");
                        while($fs = $query_fs->fetch_assoc()):
                          echo"<option value=\"$fs[fsId]\"> $fs[fsNama] </option>";
                        endwhile;
                      ?>
                    </select>
                  </div>
                </div>
                <br>
                <div class="form-group">
                  <label>Kategori</label><br>
                  <div class="col-sm-5">
                    <select class="form-control" id="hsKategori" name="hsKategori" required>
                      <option value=""></option>
                      <?php
                        $query =  $con->query("select * from r_kategori_peminjaman order by trKpId ASC");
                        while($kp = $query->fetch_assoc()):
                          echo"<option value=\"$kp[trKpId]\"> $kp[trKpNama] </option>";
                        endwhile;
                      ?>
                    </select>
                  </div>
                </div><br>
                <div class="form-group">
                  <label for="harga">Harga Sewa</label><br>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" id="hsHarga" name='hsHarga' placeholder="Harga Sewa" required>
                  </div>
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