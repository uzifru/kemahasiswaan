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
              <h3 class="box-title">Data harga sewa</h3>
            </div>
            <div class="box-header">
              <a href="home.php?page=tambahharga"><input type="button" class='btn btn-success' value="Tambah harga sewa"></a>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Fasilitas</th>
                  <th>Kategori</th>
                  <th>Harga Sewa</th>
                  <th>Aksi</th>
                </tr>
                </thead>

                <tbody>
                <?php 
                    $no = 1;
                    $query =  $con->query("select * from harga_sewa");
                    while($hs = $query->fetch_assoc()):
                ?>
                <tr>
                  <td><?php echo $no++;?></td>
                  <td><?php echo $hs['hsFasilitas'];?></td>
                  <td><?php echo $hs['hsKategori'];?></td>
                  <td><?php echo $hs['hsHarga'];?></td>
                  <td>
                    <a href="home.php?page=editharga&hsFasilitas=<?php echo $hs['hsFasilitas']?>"><i class='fa fa-edit'></i></a>
                     | <a href="content/aksi/editdeleteharga.php?aksi=hapus&hsFasilitas='<?php echo $hs['hsFasilitas']?>'"><i class='fa fa-trash'></i></a>
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
                  <th>Harga Sewa</th>
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