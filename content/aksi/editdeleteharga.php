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
    $aksi = @$_GET['aksi'];
    $aslina = @$_GET['aslina'];
    $idd = @$_GET['idd'];

    if(@$_POST['posting']):
        if($aksi == '' and $kode != ''):
            $nama = $_POST['hsFasilitas'];
            $kategori = $_POST['hsKategori'];
            $harga = $_POST['hsHarga'];
            $query =  $con->query("update harga_sewa set
                hsFasilitas  = '$nama', hsKategori = '$kategori', hsHarga = '$harga'
                ");
            header('Location: ../../home.php?page=hargasewa');
        endif;
    elseif($aksi = 'hapus' and $id != ''):
            $query =  $con->query("DELETE FROM r_kategori_peminjaman
            where hsFasilitas = '$nama'
            ");
         header('Location: ../../home.php?page=hargasewa');
    endif;
?>
<?php 
else:
  echo "<script>;window.location=('index.php');</script>"; 
endif;
?>