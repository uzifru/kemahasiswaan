<?php
if(!isset($_SESSION)) {
     session_start();
}
if (isset($_SESSION['username']) and ($_SESSION['password'])):
?><?php 
    include"../../config/config.php";
   
    $id = $_SESSION['id'];

        if(isset($_POST['posting'])):
            $namakp = $_POST['trKpNama'];
            $desc = $_POST['trKpDeskripsi']
            $query = "INSERT INTO r_kategori_peminjaman (trKpNama,trKpDeskripsi)
                            VALUES('$namakp','$desc')";
                mysqli_query($con, $query);

        header('Location: ../../home.php?page=kategoriPeminjaman');
    endif;
?>
<?php 
else:
  echo "<script>;window.location=('index.php');</script>"; 
endif;
?>