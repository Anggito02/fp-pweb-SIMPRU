<?php

if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {
    header( "Location: ../index.php" );
    die();
}

include("../config.php");

// ambil data list ruangan
$sqlPesananRuanganUnchecked = "
    SELECT id_pesanan_ruangan, status_pesanan, status_dokumen, waktu_mulai_pesan, waktu_selesai_pesan, ruanganSubTable.id_ruangan AS id_ruangan, ruanganSubTable.nama_ruangan AS nama_ruangan, akunSubTable.username AS username
    FROM pesanan_ruangan,
        (
            SELECT id_ruangan, nama_ruangan
            FROM ruangan
        ) AS ruanganSubTable,
        (
            SELECT id_akun, username
            FROM akun
        ) AS akunSubTable
    WHERE status_pesanan='Pengecekan Dokumen' AND Ruangan_id_ruangan=ruanganSubTable.id_ruangan AND Akun_id_akun=akunSubTable.id_akun
    ORDER BY waktu_mulai_pesan;
";

$resultPesananRuanganUnchecked = mysqli_query($database, $sqlPesananRuanganUnchecked);

?>