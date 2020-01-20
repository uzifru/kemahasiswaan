<?php
if(!isset($_SESSION)) {
     session_start();
}
if (isset($_SESSION['username']) and ($_SESSION['password'])):
?><?php 
    include"../../config/config.php";
   
    $id = $_SESSION['id'];

        if(isset($_POST['posting'])):
            $nama = $_POST['hsFasilitas'];
            $kategori = $_POST['hsKategori'];
            $harga = $_POST['hsHarga'];
            $query = "INSERT INTO harga_sewa (hsFasilitas, hsKategori, hsHarga)
                            VALUES('$nama', '$kategori', '$harga')";
                mysqli_query($con, $query);

        header('Location: ../../home.php?page=harga');
    endif;
?>
<?php 
else:
  echo "<script>;window.location=('index.php');</script>"; 
endif;
?>