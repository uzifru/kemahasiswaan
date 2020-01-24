<?php
if(!isset($_SESSION)) {
     session_start();
}
if (isset($_SESSION['username']) and ($_SESSION['password'])):
?> <!-- Main content -->
  <section class="content">
    <style>pre {white-space:pre-wrap;word-wrap:break-word;}</style>
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-primary">
          <div class="box-header">
            <h3 class="box-title">Data Fasilitas</h3>
          </div>
          <div class="box-header">
            <a href="home.php?page=tambahfasilitas">
              <input type="button" class='btn btn-success' value='Tambah Fasilitas'>
            </a>
          </div>
          <!-- ./box-header -->
          <?php
            include_once "config/fungsi_rupiah.php";
            $data = $con->query("SELECT * FROM fasilitas ORDER BY fsNama ASC");
            while ($fasilitas = $data->fetch_assoc()):
          ?>
          <article class="box-body">
            <h4 class="box-header" style="margin-right:3rem;">
              <b><?php echo $fasilitas['fsNama'] ?></b>
              <div class="pull-right">
                <a href="home.php?page=editfasilitas&fsId=<?php echo $fasilitas['fsId']?>"><i class='fa fa-edit'></i></a>
                |
                <a href="content/aksi/editdeletefasilitas.php?aksi=hapus&fsId=<?php echo $fasilitas['fsId']?>"><i class='fa fa-trash'></i></a>
              </div>
            </h4>
            <!-- title -->
            <div>
              <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <figure style="padding:12px;">
                  <img src="<?php echo '../images/fasilitas/' . $fasilitas['fsFoto']; ?>" alt="<?php echo $fasilitas['fsNama'] ?>" width="100%" />
                </figure>
              </div>
              <!-- foto -->
              <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                <div class="row" style="margin-right:2rem;">
                  <pre ><?php echo $fasilitas['fsDeskripsi']; ?></pre>
                  <table class="table table-hover table-bordered">
                    <caption>Bea Sewa</caption>
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Kategori</th>
                        <th>Biaya</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $fsId = $fasilitas['fsId'];
                        $no = 0;
                        $harga = $con->query("SELECT
                        trKpNama as NAMA,
                        trKpDeskripsi as DESK,
                        hsHarga as HARGA
                        FROM r_kategori_peminjaman
                        LEFT JOIN harga_sewa
                        ON trKpId = hsKategori
                        WHERE harga_sewa.hsFasilitas = $fsId
                        ORDER BY trKpId ASC");

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
                        <td><?php echo format_rupiah($bea['HARGA']); ?></td>
                      </tr>
                      <?php endwhile; ?>
                    </tbody>
                  </table>
                </div>
              </div>
              <!-- deskripsi & bea sewa -->
            </div>
            <!-- keterangan -->
          </article>
          <!-- /.box-body -->
          <?php endwhile; ?>
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
    
  <?php 
else:
  echo "<script>;window.location=('index.php');</script>"; 
endif;
?>