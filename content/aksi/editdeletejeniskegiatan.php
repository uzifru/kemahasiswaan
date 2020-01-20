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

    $kode = @$_GET['trJkId'];
    $aksi = @$_GET['aksi'];
    $aslina = @$_GET['aslina'];
    $idd = @$_GET['idd'];

    if(@$_POST['posting']):
        if($aksi == '' and $kode != ''):
            $namajk = $_POST['trJkNama'];
            $query =  $con->query("update r_jenis_kegiatan set
                trJkNama  = '$namajk'
                where trJkId = $kode
                ");
            header('Location: ../../home.php?page=jeniskegiatan');
        endif;
    elseif($aksi = 'hapus' and $id != ''):
            $query =  $con->query("DELETE FROM r_jenis_kegiatan
            where trJkId = $kode
            ");
         header('Location: ../../home.php?page=jeniskegiatan');
    endif;
?>
<?php 
else:
  echo "<script>;window.location=('index.php');</script>"; 
endif;
?>