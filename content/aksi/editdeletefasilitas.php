<?php
if(!isset($_SESSION)) {
     session_start();
}
if (isset($_SESSION['username']) and ($_SESSION['password'])):
?>
<?php 
    include"../../config/config.php";
    session_start();
    $id = $_SESSION['id'];

    $kode = filter_var(@$_GET['fsId'], FILTER_SANITIZE_NUMBER_INT);
    $aksi = $_GET['aksi'];
    $aslina = $_GET['aslina'];

    if(isset($_POST['posting'])
    && isset($_POST['fsNama'])
    && isset($_POST['fsDeskripsi'])):
        if($aksi == '' and $kode != ''):
            $namafs = $_POST['fsNama'];
            $deskripsi = $_POST['fsDeskripsi'];

            // Baca lokasi file sementar dan nama file dari form (fupload)
            $lokasi_file = $_FILES['fupload']['tmp_name'];
            $nama_file   = $_FILES['fupload']['name'];
            // Tentukan folder untuk menyimpan file
            $folder = "../../images/fasilitas/";
            // Apabila file berhasil di upload
            if (move_uploaded_file($lokasi_file, $folder . $nama_file)):

            endif;
            
            if($nama_file == ''):
                $u_fasilitas = $con->prepare("UPDATE fasilitas SET
                fsNama      = ?,
                fsDeskripsi = ?
                WHERE fsId  = ?");
                $u_fasilitas->bind_param('ssi', $namafs, $deskripsi, $kode);
            else:
                $q_dulu = $con->prepare("SELECT fsFoto FROM fasilitas WHERE fsId = ?");
                $q_dulu->bind_param('i', $kode);
                $q_dulu->execute();
                $file_dulu = $q_dulu->get_result()->fetch_assoc();
                // Hapus foto dulu
                unlink($folder . $file_dulu['fsFoto']);
                $q_dulu->free_result();

                $u_fasilitas = $con->prepare("UPDATE fasilitas SET
                fsNama      = ?,
                fsDeskripsi = ?,
                fsFoto      = ?
                WHERE fsId  = ?");
                $u_fasilitas->bind_param('sssi', $namafs, $deskripsi, $nama_file, $kode);

            endif;
            $u_fasilitas->execute();
            // Ambil data kategori
            $kategori = $con->query("SELECT trKpId as ID FROM r_kategori_peminjaman ORDER BY ID ASC");
            while ($kat = $kategori->fetch_assoc()) {
                $kategori_id[] = $kat['ID'];
            }

            $u_harga = $con->prepare("UPDATE harga_sewa SET
            hsHarga     = ?
            WHERE (hsFasilitas = ? AND hsKategori = ?)");
            // Update bea sewa
            foreach($kategori_id as $k_id) {
                $u_harga->bind_param('iii', $_POST['k_' . $k_id], $kode, $k_id);
                $u_harga->execute();
            }
            $u_harga->close();
            header('Location: ../../home.php?page=fasilitas');
        endif;
    elseif($aksi == 'hapus' and $id != ''):
            $g_foto = $con->query("SELECT fsFoto FROM fasilitas WHERE fsId = $kode");
            $d_foto = $g_foto->fetch_assoc();
            $d_fs = "DELETE FROM fasilitas WHERE fsId = $kode";
            $d_hs = "DELETE FROM harga_sewa WHERE hsFasilitas = $kode";
            // Hapus foto
            if ($con->query($d_fs)) {
                unlink($d_foto['fsFoto']);
                $con->query($d_hs);
            }
            header('Location: ../../home.php?page=fasilitas');
    endif;
?>

<?php 
else:
  echo "<script>;window.location=('index.php');</script>"; 
endif;
?>