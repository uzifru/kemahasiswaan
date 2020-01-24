<?php
if(!isset($_SESSION)) {
     session_start();
     require_once "../config/config.php";
}
if (isset($_SESSION['username']) and ($_SESSION['password'])):
?> <!-- Main content -->
 <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
          <!-- /.box -->
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Riwayat Peminjaman</h3>
            </div>
            <div class="box-header">
              <a href="home.php?page=sewafasilitas">
                <input type="button" class='btn btn-success' value='Sewa Fasilitas'>
              </a>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Fasilitas</th>
                  <th>Kategori</th>
                  <th>Kegiatan</th>
                  <th>Nama Peminjam</th>
                  <th>No HP</th>
                  <th>Email</th>
                  <th>Catatan</th>
                  <th>Tanggal Sewa</th>
                  <th>Tanggal Mulai</th>
                  <th>Tanggal Selesai</th>
                  <th>Surat Peminjaman</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                    $no=1;
                    $rp =  $con->query("SELECT
                    rpId AS ID,
                    fsNama AS FASILITAS,
                    trKpNama as KATEGORI,
                    trKpDeskripsi AS KADES,
                    rpKegiatan AS KEGIATAN,
                    rpNamaPeminjam AS PENYEWA,

                    rpNoTelepon AS NOTEL,
                    rpEmail AS EMAIL,
                    rpCatatan AS CATATAN,

                    DATE_FORMAT(rpTanggalSewa, '%d %b %Y - %H:%i:%S') AS TSEWA,
                    DATE_FORMAT(rpTanggalMulai, '%d %b %Y') AS TMULAI,
                    DATE_FORMAT(rpTanggalSelesai, '%d %b %Y') AS TSELESAI,

                    rpSuratPeminjaman AS SURAT

                    FROM riwayat_peminjaman
                    JOIN fasilitas ON rpFasilitas = fsId
                    JOIN r_kategori_peminjaman ON rpKategori = trKpId");
                    while($data = $rp->fetch_assoc()):
                  ?>
                  <tr>
                    <td><?php echo $no++;?></td>
                    <td><?php echo $data['FASILITAS'];?></td>
                    <td title="<?php echo $data[KADES] ?>"><?php echo $data['KATEGORI'];?></td>
                    <td><?php echo $data['KEGIATAN'];?></td>
                    <td><?php echo $data['PENYEWA'];?></td>
                    <td><?php echo $data['NOTEL'];?></td>
                    <td><?php echo $data['EMAIL'];?></td>
                    <td><?php echo $data['CATATAN'];?></td>
                    <td><?php echo $data['TSEWA'];?></td>
                    <td><?php echo $data['TMULAI'];?></td>
                    <td><?php echo $data['TSELESAI'];?></td>
                    <td align='center'>
                      <?php if($data['SURAT'] != ''): ?>
                      <a href="content/downloadfile.php?filename=<?php echo $data['SURAT'];?>">
                        <i class='fa fa-download'> Unduh</i>
                      </a>
                      <?php 
                      else:
                        echo"-";
                      endif;
                      ?>
                    </td>
                    <td>
                      <a href="home.php?page=edit_penyewaan&id=<?php echo $data['ID']?>"><i class='fa fa-edit'></i></a>
                       | <a href="content/aksi/editdeletepenyewaan.php?aksi=hapus&id=<?php echo $data[ID] ?>"><i class='fa fa-trash'></i></a>
                    </td>
                  </tr>
                  <?php 
                      endwhile;
                  ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Nama Fasilitas</th>
                  <th>Kategori</th>
                  <th>Kegiatan</th>
                  <th>Nama Peminjam</th>
                  <th>No HP</th>
                  <th>Email</th>
                  <th>Catatan</th>
                  <th>Tanggal Sewa</th>
                  <th>Tanggal Mulai</th>
                  <th>Tanggal Selesai</th>
                  <th>Surat Peminjaman</th>
                  <th>Aksi</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
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