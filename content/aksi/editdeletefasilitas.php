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

    $kode = @$_GET['fsId'];
    $aksi = $_GET['aksi'];
    $aslina = $_GET['aslina'];

    if($_POST['posting']):
        if($aksi == '' and $kode != ''):
                $namafs = $_POST['fsNama'];
                $deskripsi = $_POST['fsDeskripsi'];

                // Baca lokasi file sementar dan nama file dari form (fupload)
                    $lokasi_file = $_FILES['fupload']['tmp_name'];
                    $nama_file   = $_FILES['fupload']['name'];
                    // Tentukan folder untuk menyimpan file
                    $folder = "../../images/fasilitas/$nama_file";
                    // Apabila file berhasil di upload
                    if (move_uploaded_file($lokasi_file,"$folder")):

                    endif;
            
            if($nama_file == ''):
                $query =  $con->query("update fasilitas set
                fsNama  = '$namafs',
                fsDeskripsi  = '$deskripsi'
                where fsId = $kode
                ");
            else:
                $query =  $con->query("update fasilitas set
                fsNama  = '$namafs',
                fsDeskripsi  = '$deskripsi',
                fsFoto = '$nama_file'

                where fsId = $kode
                ");
            endif;
            header('Location: ../../home.php?page=fasilitas');
        endif;
    elseif($aksi = 'hapus' and $id != ''):
            $query =  $con->query("DELETE FROM fasilitas
            where fsId = $kode
            ");
            header('Location: ../../home.php?page=fasilitas');
    endif;
?>

<?php 
else:
  echo "<script>;window.location=('index.php');</script>"; 
endif;
?>