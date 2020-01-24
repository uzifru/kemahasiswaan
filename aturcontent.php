<?php 
    $konten = @$_GET['page'];
    if($konten == ''):
        include"content/konten.php";
    elseif($konten == 'logout'):
        include"logout.php";
    elseif($konten == 'gantipassword'):
        include"content/gantipassword.php";
    elseif($konten == 'profiladmin'):
        include"content/profiladmin.php";
    elseif($konten == 'fasilitas'):
        include"content/fasilitas.php";
    elseif($konten == 'tambahfasilitas'):
        include"content/tambah_fasilitas.php";
    elseif($konten == 'editfasilitas'):
        include"content/edit_fasilitas.php";
    elseif($konten == 'riwayatPeminjaman'):
        include"content/riwayat_peminjaman.php"; 
    elseif($konten == 'kategoriPeminjaman'):
        include"content/kategori_peminjaman.php";
    elseif($konten == 'tambahKategoriPeminjaman'):
        include"content/tambah_kategori_peminjaman.php";
    elseif($konten == 'editKategoriPeminjaman'):
        include"content/edit_kategori_peminjaman.php";
    elseif($konten == 'jeniskegiatan'):
        include"content/jenis_kegiatan.php"; 
    elseif($konten == 'tambahjeniskegiatan'):
        include"content/tambah_jenis_kegiatan.php";
    elseif($konten == 'editjeniskegiatan'):
        include"content/edit_jenis_kegiatan.php";
    elseif($konten == 'sewafasilitas'):
        include"content/sewa_fasilitas.php";
    elseif($konten == 'editpeminjaman'):
        include"content/edit_rincian_peminjaman.php";
    else:
        include"content/404.php";
    endif;
?>