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
                    $rp =  $con->query("select * from riwayat_peminjaman");
                    while($data = $rp->fetch_assoc()):
                  ?>
                  <tr>
                    <td><?php echo $no;?></td>
                    <td><?php echo $data['rpFasilitas'];?></td>
                    <td><?php echo $data['rpKategoriPeminjaman'];?></td>
                    <td><?php echo $data['rpKegiatan'];?></td>
                    <td><?php echo $data['rpNamaPeminjam'];?></td>
                    <td><?php echo $data['rpNoTelepon'];?></td>
                    <td><?php echo $data['rpEmail'];?></td>
                    <td><?php echo $data['rpCatatan'];?></td>
                    <td><?php echo $data['rpTanggalSewa'];?></td>
                    <td><?php echo $data['rpTanggalMulai'];?></td>
                    <td><?php echo $data['rpTanggalSelesai'];?></td>
                    <td align='center'>
                      <?php if($data['rpSuratPeminjaman'] != ''): ?>
                      <a href="content/downloadfile.php?filename=<?php echo $data['rpSuratPeminjaman'];?>">
                        <i class='fa fa-download'> Unduh</i>
                      </a>
                      <?php 
                      else:
                        echo"-";
                      endif;
                      ?>
                    </td>
                    <td>
                      <a href="home.php?page=edit_download&id=<?php echo $data['id']?>"><i class='fa fa-edit'></i></a>
                       | <a href="content/aksi/editdeletedownload.php?aksi=hapus&id=<?php echo $data['nama_file']?>&idd='<?php echo $data['id']?>'"><i class='fa fa-trash'></i></a>
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