<?php
include "../config/config.php";

if (isset($_POST['aksi'])) {
    switch ($_POST['aksi']) {
        case 'bea':
            if (isset($_POST['id']) && $_POST['id'] != '') {
                $harga = array();
                $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);

                $result = $con->query("SELECT hsKategori, hsHarga FROM harga_sewa WHERE hsFasilitas = ${id}");

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $harga[$row['hsKategori']] = number_format($row['hsHarga'], 2, ',', '.');
                    }
                }
                $result->close();

                header("application/json; charset=utf-8");
                echo json_encode($harga);
            }
            break;
        case 'jadwal':
            if (isset($_POST['id']) && $_POST['id'] != '') {
                $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
                $jadwal = [];

                $result = $con->query("SELECT rpFasilitas, rpKegiatan, rpTanggalMulai, rpTanggalSelesai
                FROM riwayat_peminjaman
                WHERE rpFasilitas = ${id} AND (rpTanggalMulai > NOW())");

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $jadwal[] = array(
                            "kegiatan" => $row['rpKegiatan'],
                            "mulai"    => $row['rpTanggalMulai'],
                            "selesai"  => $row['rpTanggalSelesai']
                        );
                    }
                }
                $result->close();

                $jadwal[] = (string) $id;
                header("application/json; charset=utf-8");
                echo json_encode($jadwal);
            }
            break;
        default:
            echo "nangtung di kariungan, ngadeg di karageman";
            break;
    }
}
?>