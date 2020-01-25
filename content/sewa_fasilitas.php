<?php
if(!isset($_SESSION)) {
     session_start();
}
if (isset($_SESSION['username']) and ($_SESSION['password'])):
?>
    <section class="content">
      <style>label.has-required::after {content:' *';color:red;}</style>
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h2 class="box-title">Sewa Fasilitas</h2>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="content/aksi/sewafasilitas.php" method="post" enctype="multipart/form-data" class="form-horizontal">
              <fieldset class="box-body" id="fset_kegiatan">
                <div class="col-md-3"></div>
                <legend class="col-md-8"><h4>Informasi Kegiatan</h4></legend>
                <div class="form-group">
                  <?php
                  $data_fs = $con->query("SELECT
                  fsId AS ID,
                  fsNama AS NAMA,
                  IF(
                    LENGTH(LEFT(fsDeskripsi, '100')) = 100,
                    CONCAT(LEFT(fsDeskripsi, '100'), '...'),
                    LEFT(fsDeskripsi, '100')
                  ) AS DESK
                  FROM fasilitas
                  ORDER BY fsNama ASC");
                  ?>
                  <label for="fasilitas" class="col-md-3 control-label has-required">Nama Fasilitas</label>
                  <div class="col-md-8">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-home"></i></span>
                      <select name="fasilitas" id="fasilitas" class="form-control select2">
                        <?php
                        while ($fasilitas = $data_fs->fetch_assoc()) {
                          echo "<option value='${fasilitas['ID']}' title='${fasilitas['DESK']}'>${fasilitas['NAMA']}</option>";
                          }
                        ?>
                      </select>
                    </div>
                  </div>
                </div>
                <!-- / fasilitas -->
                <div class="form-group">
                  <?php
                  $data_kp = $con->query("SELECT
                  trKpId AS ID,
                  trKpNama AS NAMA,
                  IF(
                    LENGTH(LEFT(trKpDeskripsi, '60')) = 60,
                    CONCAT(LEFT(trKpDeskripsi, '60'), '...'),
                    LEFT(trKpDeskripsi, '60')
                  ) AS DESK
                  FROM r_kategori_peminjaman
                  ORDER BY trKpId ASC");
                  ?>
                  <label for="kategori" class="col-md-3 control-label has-required">Kategori</label>
                  <div class="col-md-8">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-tags"></i></span>
                      <select name="kategori" id="kategori" class="form-control select2">
                        <?php
                        while ($kategori = $data_kp->fetch_assoc()) {
                          echo "<option value='${kategori['ID']}' title='${kategori['DESK']}'>${kategori['NAMA']}</option>";
                        }
                        ?>
                      </select>
                      <span class="input-group-addon" style="font-weight:600;">Rp</span>
                      <pre class="input-group-addon" id="beasewa" style="width:11rem;max-width:30%;min-width:11rem;text-align:right;"></pre>
                    </div>
                    <small class="help-block hidden-xs" style="display:inline-block;">Kategori menentukan bea sewa fasilitas</small>
                    <small class="help-block" style="width:10rem;float:right;">Bea Sewa</small>
                  </div>
                </div>
                <!-- / kategori -->
                <div class="form-group">
                  <label for="kegiatan" class="col-md-3 control-label has-required">Kegiatan</label>
                  <div class="col-md-8">
                    <div class="input-group"><span class="input-group-addon"><i class="fa fa-circle-o"></i></span>
                      <input type="text" name="kegiatan" id="kegiatan" class="form-control" required>
                    </div>
                    <small class="help-block">Jenis kegiatan dan/atau nama kegiatan</small>
                  </div>
                </div>
                <!-- / kegiatan -->
                <div class="form-group">
                  <label for="tanggal_pelaksanaan" class="col-md-3 control-label has-required">Tanggal Pelaksanaan</label>
                  <div class="col-md-8">
                    <div class="input-daterange input-group" id="tanggal_pelaksanaan">
                      <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                      <input type="text" class="input-md form-control" name="tanggal_mulai" id="tanggal_mulai" placeholder="mulai">
                      <span class="input-group-addon">sampai</span>
                      <input type="text" name="tanggal_selesai" id="tanggal_selesai" class="input-md form-control" placeholder="selesai">
                    </div>
                    <!-- /.input-group -->
                    <div class="help-block" id="tanggal_bentrok" hidden></div>
                  </div>
                </div>
                <!-- tanggal pelaksanaan -->
              </fieldset>
              <!-- /.box-body -->
              <fieldset class="box-body" id="fset_kontak">
                <div class="col-md-3"></div>
                <legend class="col-md-8"><h4>Informasi Kontak</h4></legend>
                <div class="form-group">
                  <label for="nama_peminjam" class="col-md-3 control-label has-required">Nama Penyewa</label>
                  <div class="col-md-8">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-users"></i></span>
                      <input type="text" name="nama_peminjam" id="nama_peminjam" class="form-control" maxlength='250' required>
                    </div>
                  </div>
                </div>
                <!-- / peminjam -->
                <div class="form-group">
                  <label for="no_telepon" class="col-md-3 control-label">No. Telepon</label>
                  <div class="col-md-8">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                      <input type="tel" name="no_telepon" id="no_telepon" class="form-control" pattern="^(?:0|\(?\+?\d{2,3}\)?\s?)?(?:[\-\s]?\d{3,5}){2,4}$">
                    </div>
                    <!-- /.input-group -->
                  </div>
                </div>
                <!-- telepon -->
                <div class="form-group">
                  <label for="email" class="col-md-3 control-label">Alamat Surel</label>
                  <div class="col-md-8">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
                      <input type="email" name="email" id="email" class="form-control" placeholder="name@domain.com">
                    </div>
                    <!-- /.input-group -->
                  </div>
                </div>
                <!-- email -->
              </fieldset>
              <!-- /.box-body -->
              <div class="box-body">
                <div class="col-md-3"></div>
                <legend class="col-md-8"><h4>Informasi Tambahan</h4></legend>
                <div class="form-group">
                  <label for="catatan" class="col-md-3 control-label">Catatan</label>
                  <div class="col-md-8">
                    <textarea name="catatan" id="catatan" rows="9" class="form-control textarea" style="width:100%;line-height:18px;"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="surat" class="col-md-3 control-label">Berkas Lampiran</label>
                  <div class="col-md-8">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-file"></i></span>
                      <input type="file" name="surat" id="surat" accept="application/pdf">
                    </div>
                    <small class="help-block">Dapat berupa surat keterangan peminjaman dari lembaga terkait</small>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <div class="help-block"><span style="color:red;">*</span> Wajib diisi</div>
                <input type="submit" name='posting' class='btn btn-info' value="Sewa">
                <input type="button" name='batal' class='btn btn-default' value='Batal' onclick="window.location=('home.php?page=riwayatPeminjaman')">
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.row -->
      </div>
    </section>
<?php 
else:
  echo "<script>;window.location=('index.php');</script>"; 
endif;
?>