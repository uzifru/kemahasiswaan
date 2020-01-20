<?php
if(!isset($_SESSION)) {
     session_start();
}
if (isset($_SESSION['username']) and ($_SESSION['password'])):
?><?php 
    include"../../config/config.php";
   
    $id = $_SESSION['id'];

        if(isset($_POST['posting'])):
            $namajk = $_POST['trJkNama'];
            $query = "INSERT INTO r_jenis_kegiatan (trJKNama)
                            VALUES('$namajk')";
                mysqli_query($con, $query);

        header('Location: ../../home.php?page=jeniskegiatan');
    endif;
?>
<?php 
else:
  echo "<script>;window.location=('index.php');</script>"; 
endif;
?>