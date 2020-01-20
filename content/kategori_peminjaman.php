<?php
if(!isset($_SESSION)) {
     session_start();
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
              <h3 class="box-title">Data kategori peminjaman</h3>
            </div>
            <div class="box-header">
              <a href="home.php?page=tambahKategoriPeminjaman"><input type="button" class='btn btn-success' value="Tambah kategori peminjaman"></a>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Kategori</th>
                  <th>Deskripsi</th>
                  <th>Aksi</th>
                </tr>
                </thead>

                <tbody>
                <?php 
                    $no = 1;
                    $query =  $con->query("select * from r_kategori_peminjaman");
                    while($kp = $query->fetch_assoc()):
                ?>
                <tr>
                  <td><?php echo $no++;?></td>
                  <td><?php echo $kp['trKpNama'];?></td>
                  <td><?php echo $kp['trKpDeskripsi'];?></td>
                  <td>
                    <a href="home.php?page=editKategoriPeminjaman&trKpId=<?php echo $kp['trKpId']?>"><i class='fa fa-edit'></i></a>
                     | <a href="content/aksi/editdeletekategoripeminjaman.php?aksi=hapus&trKpId='<?php echo $kp['trKpId']?>'"><i class='fa fa-trash'></i></a>
                  </td>
                </tr>
                <?php 
                    endwhile;
                ?>
                </tbody>

                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Nama Kategori</th>
                  <th>Deskripsi</th>
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