<?php
if(!isset($_SESSION)) {
     session_start();
}
if (isset($_SESSION['username']) and ($_SESSION['password'])):
?>
<?php 
  
//The name of the folder.
$folder = 'misal';
$get    = @$_GET['namafile'];

//Get a list of all of the file names in the folder.
$files = glob($folder . '/'.$get);

//Loop through the file list.
foreach($files as $file){
    //Make sure that this is a file and not a directory.
    if(is_file($file)){
        //Use the unlink function to delete the file.
        unlink($file);
    }
}
?> 
<?php 
else:
  echo "<script>;window.location=('index.php');</script>"; 
endif;
?>