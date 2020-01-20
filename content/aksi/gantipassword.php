<?php
if(!isset($_SESSION)) {
     session_start();
}
if (isset($_SESSION['username']) and ($_SESSION['password'])):
?>
<?php 
    session_start();

    $id = $_SESSION['id'];
    $pass = $_SESSION['password'];
    include"../../../config/config.php";
    
    $passwordbaru = $_POST['password'];
    $passwordbaru2 = $_POST['konfirpassword'];

    if(@$_POST['posting']):
        if($passwordbaru == $passwordbaru2):
            $passbar = md5($passwordbaru);
            $con->query("UPDATE user SET password = '$passbar' WHERE id = $id");
            header('Location: ../../home.php?page=gantipassword&success=1');
          else:
            header('Location: ../../home.php?page=gantipassword&error=1');
        endif;
    endif;
?>
<?php 
else:
  echo "<script>;window.location=('index.php');</script>"; 
endif;
?>