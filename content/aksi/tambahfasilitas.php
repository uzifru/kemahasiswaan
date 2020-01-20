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

        if(isset($_POST['posting'])):
            $namafs = $_POST['fsNama'];
            $deskripsi = $_POST['fsDeskripsi'];

            // Baca lokasi file sementar dan nama file dari form (fupload)
            $lokasi_file = $_FILES['fupload']['tmp_name'];
            $nama_file   = $_FILES['fupload']['name'];
            // Tentukan folder untuk menyimpan file
            $folder = "../../images/fasilitas/$nama_file";
            // Apabila file berhasil di upload
            if (move_uploaded_file($lokasi_file,"$folder")):
            $cekid = $con->query("select fsId from fasilitas order by fsId desc limit 1");
            $cekid2 = $cekid->fetch_assoc();
            $idnya  = $cekid2['fsId']+1;
                $query = "INSERT INTO fasilitas (fsNama, fsDeskripsi, fsFoto)
                            VALUES('$namafs', '$deskripsi', '$nama_file')";
                mysqli_query($con, $query);
            endif;

        header('Location: ../../home.php?page=fasilitas');
        endif;
?>
<?php 
else:
  echo "<script>;window.location=('index.php');</script>"; 
endif;
?>