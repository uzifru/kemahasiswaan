<?php
  include "config/config.php";

  $username = $_POST['username'];
  $password = $_POST['password'];
  $password = md5($password); 
    

  $login  = mysqli_query($con, "SELECT * FROM user WHERE username = '$username' AND password='$password'");
  $row    = mysqli_fetch_array($login);

  if ((@$row['username']) AND (@$row['password']))
  {
    session_start();
    $_SESSION['username']     = $row['username'];
    $_SESSION['id']           = $row['id'];
    $_SESSION['password']     = $row['password'];
    $_SESSION['namadepan']    = $row['nama_depan'];
    $_SESSION['namabelakang'] = $row['nama_belakang'];
  
    header("Location:home.php");
  }
  else
  {
    header("Location:index.php");
  }
?>