<?php
if(!isset($_SESSION)) {
     session_start();
}
if (isset($_SESSION['username']) and ($_SESSION['password'])):
?><script src="https://cdn.ckeditor.com/4.11.2/standard/ckeditor.js"></script>
<?php 
  $id = filter_var($_GET['fsId'], FILTER_SANITIZE_NUMBER_INT);
  // Ambil data fasilitas
  $data = $con->prepare("SELECT fsId as FID, fsNama AS NAMA, fsDeskripsi AS DESK, fsFoto as FOTO FROM fasilitas WHERE fsId = ? LIMIT 1");
  $data->bind_param('i', $id);
  $data->execute();
  $data_r = $data->get_result();
  // id yang dimaksud tidak ada
  if ($data_r->num_rows != 1)
    echo "<script>window.location=('home.php?page=fasilitas')</script>";
  else $fasilitas = $data_r->fetch_assoc();
?>
<section class="content">
  <style>.placeholder-h4 {font-size:18px; font-weight:600;}</style>
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border"><h3 class="box-title">Edit Fasilitas</h3></div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" method='post' enctype="multipart/form-data" action='content/aksi/editdeletefasilitas.php?fsId=<?php echo $id ?>'>
          <div class="box-body">
            <div class="box-header form-inline form-group">
              <label for="fsNama">Nama Fasilitas </label>
              <input type="text" class="form-control placeholder-h4" id="fsNama" name="fsNama" maxlength="45" value="<?php echo $fasilitas['NAMA']; ?>" placeholder="nama" required>
            </div>
            <!-- nama -->
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <label for='fupload'>Foto</label>
                <figure style="padding:12px;">
                  <img src="<?php echo '../images/fasilitas/' . $fasilitas['FOTO']; ?>" alt="<?php echo $fasilitas['NAMA'] ?>" width="100%" id='fsFoto' />
                  <figcaption>
                    <input type='file' name='fupload' id='fupload' onchange="preview(this, '#fsFoto', '#reset');">
                    <input type='button' name='reset' id='reset' value='Reset Foto' onclick="reset_preview('#fupload', '#fsFoto')" hidden >
                  </figcaption>
                </figure>
              </div>
              <!-- foto -->
              <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                <div class="row">
                  <div class="form-group">
                    <label for="desk">Deskripsi</label>
                    <textarea class='form-control' id='fsDeskripsi' name='fsDeskripsi' rows='9' ><?php echo $fasilitas['DESK']; ?></textarea>
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
                        $fsId = $fasilitas['FID'];
                        $no = 0;
                        $harga = $con->query("SELECT
                        trKpId as ID,
                        trKpNama as NAMA,
                        trKpDeskripsi as DESK,
                        hsHarga as HARGA
                        FROM r_kategori_peminjaman
                        LEFT JOIN harga_sewa
                        ON trKpId = hsKategori
                        WHERE harga_sewa.hsFasilitas = $fsId
                        ORDER BY ID ASC");

                        while($bea = $harga->fetch_assoc()):
                      ?>
                      <tr>
                        <td><?php echo ++$no ?></td>
                        <td>
                          <span title="<?php echo $bea['DESK']; ?>">
                            <?php echo $bea['NAMA']; ?>
                            <sup style="color:blue;cursor:help;">?</sup>
                          <span>
                        </td>
                        <td><?php
                        $k_id = 'k_' . $bea['ID'];
                        echo "<input type='number' min='0' step='1000' class='form-control' id='$k_id' name='$k_id' value='$bea[HARGA]' required>";
                        ?>
                        </td>
                      </tr>
                      <?php endwhile; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <!-- keterangan -->
            <div class="box-footer">
              <input type="submit" name='posting' class='btn btn-info' value="Perbarui">
              <input type="button" name='batal' class='btn btn-default' value='Batal' onclick="window.location=('home.php?page=fasilitas')" >
            </div>
          </div>
          <!-- /.box-body -->
        </form>
        <!-- form end -->
      </div>
      <!-- /.box -->
    </div>
  </div>
  <!-- /.row -->
  <script>
    var iCurrent = document.getElementById('fsFoto').getAttribute('src');
    function reset_preview(input, img_id) {
      $(img_id).attr('src', iCurrent);
      $(input).replaceWith($(input).val('').clone(True));
    }
    function preview(input, img_id, reset_id) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
          $(img_id).attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
        $(reset_id).show();
      }
    }
  </script>
</section>
<script>
    CKEDITOR.replace( 'deskripsi' );
</script>
<?php 
else:
  echo "<script>;window.location=('index.php');</script>"; 
endif;
?>