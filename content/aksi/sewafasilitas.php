<?php
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['username']) and ($_SESSION['password'])) {
    include "../../config/config.php";
    session_start();
    $id = $_SESSION['id'];

    // Periksa kehadiran data
    if (isset($_POST['posting'])
    &&  isset($_POST['fasilitas'])
    &&  isset($_POST['kategori'])
    &&  isset($_POST['kegiatan'])
    &&  isset($_POST['nama_peminjam'])
    &&  isset($_POST['tanggal_mulai'])
    &&  isset($_POST['tanggal_selesai'])) {
        // Ambil data wajib
        $data[] = $_POST['fasilitas'];
        $data[] = $_POST['kategori'];
        $data[] = $_POST['kegiatan'];
        $data[] = $_POST['nama_peminjam'];
        $data[] = date('Y-m-d H:i:s', strtotime($_POST['tanggal_mulai']));
        $data[] = date('Y-m-d H:i:s', strtotime($_POST['tanggal_selesai']));
        // Bangun query
        $query = "INSERT INTO riwayat_peminjaman (rpId, rpFasilitas, rpKategori, rpKegiatan, rpNamaPeminjam, rpTanggalSewa, rpTanggalMulai, rpTanggalSelesai";
        $value = " VALUES (NULL,?,?,?,?,NOW(),?,?";
        $param = 'iissss';
        // Data opsional
        if (isset($_POST['no_telepon']) && $_POST['no_telepon'] != '') {
            $data[] = $_POST['no_telepon'];
            $query .= ", rpNoTelepon";
            $value .= ",?";
            $param .= 's';
        }
        if (isset($_POST['email']) && $_POST['email'] != '') {
            $data[] = $_POST['email'];
            $query .= ", rpEmail";
            $value .= ",?";
            $param .= 's';
        }
        if (isset($_POST['catatan']) && $_POST['catatan'] != '') {
            $data[] = $_POST['catatan'];
            $query .= ", rpCatatan";
            $value .= ",?";
            $param .= 's';
        }
        if (isset($_FILES['surat']) && $_FILES['surat']['name'] != '' ) {
            $query .= ", rpSuratPeminjaman";
            $value .= ",?";
            $param .= 's';
            // Handle file
            $lokasi_file = $_FILES['surat']['tmp_name'];
            $nama_file   = $_FILES['surat']['name'];
            $folder      = "../../documents/penyewaan/${nama_file}";
            // Apabila gagal diupload
            if (!move_uploaded_file($lokasi_file, $folder)) die("Gagal Unggah Berkas Surat!");
            $data[]   = $nama_file;
        }
        // Tutup kurungnya jangan sampe ketinggalan nich
        $query .= ") ";
        $value .= ")";
        // Eksekusi query
        $sewa = $con->prepare($query . $value);
        if ($sewa->bind_param($param, ...$data)) {
            if (!$sewa->execute()) die('Illegal argument detected!');
        }
    }
    else {
        die("Isian form kurang/tidak lengkap");
    }
    header('Location: ../../home.php?page=riwayatPeminjaman');
}
else {
    echo "<script>window.location=('index.php');</script>";
}
?>