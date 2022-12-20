<?php

if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {
    header( "Location: ../index.php" );
    die();
}

include("../config.php");

// ambil data list pemesanan
if(isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    $sqlDataPesananUser = "
    SELECT Ruangan_id_ruangan, status_pesanan, status_dokumen, waktu_mulai_pesan, waktu_selesai_pesan, ruanganSubTable.nama_ruangan AS nama_ruangan
    FROM pesanan_ruangan,
        (
            SELECT id_ruangan, nama_ruangan
            FROM ruangan
        ) AS ruanganSubTable,
        (
            SELECT id_akun
            FROM akun
            WHERE username='$username'
        ) AS akunSubTable
    WHERE Ruangan_id_ruangan=ruanganSubTable.id_ruangan AND Akun_id_akun=id_akun
    ORDER BY waktu_mulai_pesan;
    ";

    $resultDataPesananUser = mysqli_query($database, $sqlDataPesananUser);
}

?>