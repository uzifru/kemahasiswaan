<?php
if(!isset($_SESSION)) {
     session_start();
}
if (isset($_SESSION['username']) and ($_SESSION['password'])):
?>
<script src="https://cdn.ckeditor.com/4.11.2/standard/ckeditor.js"></script>
<section class="content">
      <style>.placeholder-h4 {font-size:18px; font-weight:600;} .has-help sup{color:blue;cursor:help;}</style>
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
                <div class="box-header form-inline form-group">
                  <label for="fsNama">Nama Fasilitas</label>
                  <input type="text" class="form-control placeholder-h4" id="fsNama" name='fsNama' maxlength='45' placeholder="Nama Fasilitas" required>
                </div>
                <!-- fsNama -->
                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <label for='fupload'>Foto</label>
                    <figure style="padding:12px;">
                      <img src="../images/fasilitas/178164f81917b8e87073295a635588de.png" alt="foto fasilitas" width="100%" id="fsFoto" />
                      <figcaption>
                        <input type='file' name='fupload' id='fupload' onchange="preview(this, '#fsFoto');" required>
                      </figcaption>
                    </figure>
                  </div>
                  <!-- foto -->
                  <!-- rincian start -->
                  <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <div class="row">
                      <div class="form-group">
                        <label for="desk">Deskripsi</label>
                        <textarea name="fsDeskripsi" id="fsDeskripsi" rows="9" class="form-control" placeholder="Deskripsi tentang fasilitas"></textarea>
                      </div>
                      <!-- table start -->
                      <table class="table table-hover table-bordered">
                        <caption><b>Bea Sewa</b></caption>
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Kategori</th>
                            <th>Biaya</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $no = 0;
                          $kategori = $con->query("SELECT trKpId as ID, trKpNama as NAMA, trKpDeskripsi as DESK FROM r_kategori_peminjaman ORDER BY ID ASC");

                          while ($kat = $kategori->fetch_assoc()):
                          ?>
                          <tr>
                            <td><?php echo ++$no; ?></td>
                            <td>
                              <span title="<?php echo $kat['DESK']; ?>" class="has-help">
                                <?php echo $kat['NAMA']; ?><sup>?</sup>
                              </span>
                            </td>
                            <td>
                              <?php
                              $k_id = 'k_' . $kat['ID'];
                              echo "<input type='number' min='0' step='1000' class='form-control' id='$k_id' name='$k_id' required>";
                              ?>
                            </td>
                          </tr>
                          <?php endwhile; ?>
                        </tbody>
                      </table>
                      <!-- table end -->
                    </div>
                    <!-- /.row -->
                  </div>
                  <!-- rincian end -->
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <input type="submit" name='posting' class='btn btn-info' value="Tambah">
                <input type="button" name='batal' class='btn btn-default' value='Batal' onclick="window.location=('home.php?page=fasilitas')">
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.row -->
        <script>
          function preview(input, img_id) {
            if (input.files && input.files[0]) {
              var reader = new FileReader();
              reader.onload = function(e) {
                $(img_id).attr('src', e.target.result);
              }
              reader.readAsDataURL(input.files[0]);
            }
          }
        </script>
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