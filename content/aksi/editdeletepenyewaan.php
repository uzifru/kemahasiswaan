<?php
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['username']) and isset($_SESSION['password'])):
    include "../../config/config.php";
    session_start();
    $id = $_SESSION['id'];

    $kode = filter_var(@$_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $aksi = $_GET['aksi'];

    if (isset($_POST['posting'])):
    elseif ($aksi == 'hapus' and $id != ''):
        $g_surat = $con->query("SELECT rpSuratPeminjaman FROM riwayat_peminjaman WHERE rpId = $kode");
        $d_surat = $g_surat->fetch_array(MYSQL_NUM)[0];

        $d_riwayat = "DELETE FROM riwayat_peminjaman WHERE rpId = $kode";
        // hapus riwayat
        if ($con->query($d_riwayat)) {
            if(!$d_surat) unlink($d_surat); // Hapus file
        }
        header('Location: ../../home.php?page=riwayatPeminjaman');
    endif;
else:
    echo "<script>window.location=('index.php')</script>";
endif;
?>