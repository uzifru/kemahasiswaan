<?php
	@define("HOST","localhost");
	@define("USER","root");
	@define("PASS","");
	@define("DB","kemahasiswaan");
  
	$con = new mysqli(HOST,USER,PASS,DB);

	// Check connection
	if (mysqli_connect_errno())
	  {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  }
?>