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
              <h3 class="box-title">Data Fasilitas</h3>
            </div>
            <div class="box-header">
              <a href="home.php?page=tambahfasilitas"><input type="button" class='btn btn-success' value="Tambah Fasilitas"></a>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nama</th>
                  <th>Deskripsi</th>
                  <th>Foto</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                    $query =  $con->query("select * from fasilitas");
                    while($fasilitas = @mysqli_fetch_assoc($query)):
                ?>
                <tr>
                  <td><?php echo $fasilitas['fsNama'];?></td>
                  <td><?php echo $fasilitas['fsDeskripsi'];?></td>
                  <td align='center'>
                     <?php 
                        if($fasilitas['fsFoto'] != ''):
                     ?>
                      <img src="../images/fasilitas/<?php echo $fasilitas['fsFoto'];?>"width='50px' height='50px' alt="">
                     <?php 
                        else:
                            echo"Tidak Tersedia";
                        endif;
                     ?>
                  </td>
                  <td>
                    <a href="home.php?page=editfasilitas&fsId=<?php echo $fasilitas['fsId']?>"><i class='fa fa-edit'></i></a>
                     | <a href="content/aksi/editdeletefasilitas.php?aksi=hapus&fsId=<?php echo $fasilitas['fsId']?>"><i class='fa fa-trash'></i></a>
                  </td>
                </tr>
                <?php 
                    endwhile;
                ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Nama</th>
                  <th>Deskripsi</th>
                  <th>Foto</th>
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