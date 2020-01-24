<?php
if(!isset($_SESSION)) {
     session_start();
}
if (isset($_SESSION['username']) and ($_SESSION['password'])):
?>
<?php 
    include "../../config/config.php";
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
            if (move_uploaded_file($lokasi_file, $folder)):
                // Tambah fasilitas
                $fasilitas = $con->prepare("INSERT INTO fasilitas VALUES(NULL,?,?,?)");
                $fasilitas->bind_param('sss', $namafs, $deskripsi, $nama_file);
                $fasilitas->execute();
                $fsId = $con->insert_id;
                // Ambil kategori peminjaman dari database
                $kategori = $con->query("SELECT trKpId as ID from r_kategori_peminjaman ORDER BY ID ASC");
                while ($kat = $kategori->fetch_assoc()) {
                    $kategori_id[] = $kat['ID'];
                }
                // Tambah harga
                $harga = $con->prepare("INSERT INTO harga_sewa VALUES($fsId,?,?)");
                foreach($kategori_id as $k_id) {
                    $harga->bind_param('ii', $k_id, $_POST['k_' . $k_id]);
                    $harga->execute();
                }
                $harga->close();
            endif;

        header('Location: ../../home.php?page=fasilitas');
        endif;
?>
<?php 
else:
  echo "<script>;window.location=('index.php');</script>"; 
endif;
?>