<?php

if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {
    header( "Location: ../index.php" );
    die();
}

include("../config.php");

session_start();

if(isset($_POST['submit'])) {

    // Check checkbox
    if(empty($_POST['checkboxDokumen'])) {
        $status_dokumen = 0;
    }
    else {
        $status_dokumen = 1;
    }
    
    $id_pesanan_ruangan = $_POST['id_pesanan_ruangan'];
    $status_pesanan = $_POST['status_pesanan'];

    // jika status_pesanan == Disetujui, update jadwal_sewa_ruangan
    if($status_pesanan == 'Disetujui') {
        // get last id
        $sqlLastIDJadwal = "
            SELECT MAX(id_jadwal_sewa_ruangan) AS lastID
            FROM jadwal_sewa_ruangan;
        ";

        $resultLastIDJadwal = mysqli_query($database, $sqlLastIDJadwal);
        $lastIDJadwal = $resultLastIDJadwal->fetch_assoc()['lastID'] + 1;

        $tanggal = $_POST['tanggal'];
        $waktu_mulai = $_POST['waktu_mulai'];
        $waktu_selesai = $_POST['waktu_selesai'];
        $id_ruangan = $_POST['id_ruangan'];

        // insert new data
        $sqlNewOrder = "
            INSERT INTO jadwal_sewa_ruangan VALUES($lastIDJadwal, '$tanggal', '$waktu_mulai', '$waktu_selesai', $id_ruangan);
        ";

        $resultNewOrder = mysqli_query($database, $sqlNewOrder);
    }

    // update data
    $sqlUpdateData = "
        UPDATE pesanan_ruangan
        SET status_dokumen = $status_dokumen, status_pesanan='$status_pesanan'
        WHERE id_pesanan_ruangan=$id_pesanan_ruangan;
    ";

    $resultUpdateData = mysqli_query($database, $sqlUpdateData);

    // jika berhasil kembali ke list admin
    if($resultUpdateData) {
        header("Location: ../res/admin.php?update=success");
        exit();
    }
    else {
        header("Location: ../res/admin.php?update=failed");
        exit();
    }
}

?>