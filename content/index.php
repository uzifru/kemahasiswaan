<?php
if(!isset($_SESSION)) {
     session_start();
}
if (isset($_SESSION['username']) and ($_SESSION['password'])):
?>
<script language="JavaScript">
	window.location = "../index.php";
</script>
<?php 
else:
  echo "<script>;window.location=('../../index.php');</script>"; 
endif;
?>