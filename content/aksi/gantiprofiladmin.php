<?php
if(!isset($_SESSION)) {
     session_start();
}
if (isset($_SESSION['username']) and ($_SESSION['password'])):
?>
<?php 
    session_start();
    $id = $_SESSION['id'];

    include"../../../config/config.php";
    
    $namadepan = $_POST['namadepan'];
    $namabelakang = $_POST['namabelakang'];
    $username = $_POST['username'];

    if(@$_POST['posting']):
            $con->query("UPDATE user SET 
                nama_depan = '$namadepan',
                nama_belakang = '$namabelakang',
                username = '$username'
             WHERE id = $id");
            header('Location: ../../home.php?page=profiladmin&success=1');
    endif;
?>
<?php 
else:
  echo "<script>;window.location=('index.php');</script>"; 
endif;
?>