<?php
if(!isset($_SESSION)) {
     session_start();
}
if (isset($_SESSION['username']) and ($_SESSION['password'])):
?>
<?php 
    include"../../config/config.php";
    session_start();
    $id = $_SESSION['id'];

    $kode = @$_GET['trKpId'];
    $aksi = @$_GET['aksi'];
    $aslina = @$_GET['aslina'];
    $idd = @$_GET['idd'];

    if(@$_POST['posting']):
        if($aksi == '' and $kode != ''):
            $namakp = $_POST['trKpNama'];
            $desc = $_POST['trKpDeskripsi'];
            $query =  $con->query("update r_kategori_peminjaman set
                trKpNama  = '$namakp', trKpDeskripsi = '$desc'
                where trKpId = $kode
                ");
            header('Location: ../../home.php?page=kategoriPeminjaman');
        endif;
    elseif($aksi = 'hapus' and $id != ''):
            $query =  $con->query("DELETE FROM r_kategori_peminjaman
            where trKpId = $kode
            ");
         header('Location: ../../home.php?page=kategoriPeminjaman');
    endif;
?>
<?php 
else:
  echo "<script>;window.location=('index.php');</script>"; 
endif;
?>