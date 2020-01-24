<?php
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['username']) and ($_SESSION['password'])) {
    include "../../config/config.php";
    session_start();
    $id = $_SESSION['id'];

    if (isset($_GET['filename']) && $_GET['filename'] != '') {
        $nama_file = @$_GET['filename'];
        $filepath  = '../documents/penyewaan/' . $nama_file;

        if (!is_readable($filepath)) die("Berkas tidak ditemukan atau tidak tersedia");
        $size = filesize($filepath);

        if (ini_get('zlib.output_compression')) ini_set('zlib.output_compression', 'Off');

        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="' . $nama_file . '"');
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges: bytes');
        readfile($filepath);
        exit();
    }
    else {
        echo "<script>window.location=('home.php?page=riwayatPeminjaman');</script>";
    }
}
else {
    echo "<script>window.location=('index.php');</script>";
}
?>