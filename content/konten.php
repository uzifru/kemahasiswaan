<?php
if(!isset($_SESSION)) {
     session_start();
}
if (isset($_SESSION['username']) and ($_SESSION['password'])):
?>
 <script src="https://cdn.ckeditor.com/4.11.2/standard/ckeditor.js"></script>
    <section class="content">
     <h1>konten pokona mah</h1>
    </section>
    <!-- /.content -->
  <!-- /.content-wrapper -->
<?php 
else:
  echo "<script>;window.location=('index.php');</script>"; 
endif;
?>