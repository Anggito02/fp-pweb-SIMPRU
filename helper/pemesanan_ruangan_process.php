<?php

if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {
    header( "Location: ../index.php" );
    die();
}

include("../config.php");

session_start();

// jika username tidak ada -> suruh login
if(!isset($_SESSION['username'])) {
    header("Location: ../index.php");
    exit();
}

if(isset($_POST['submit'])) {
    // ambil data dari formulir
    $tanggalPemakaian = $_POST['tanggalPemakaian'];
    $jamMulai = $tanggalPemakaian." ".$_POST['jamMulai'].":00";
    $jamSelesai = $tanggalPemakaian." ".$_POST['jamSelesai'].":00";
    $username = $_POST['username'];
    $namaRuangan = $_POST['namaRuangan'];

    // Set Pemesanan pada database
    // get id terakhir
    $sqlLastID = "
        SELECT MAX(id_pesanan_ruangan) AS 'lastID' FROM pesanan_ruangan;
    ";

    $resultLastID = mysqli_query($database, $sqlLastID);
    $lastID = $resultLastID->fetch_assoc()['lastID'] + 1;

    // get akun id
    $sqlAkunID = "
        SELECT id_akun FROM akun WHERE username='$username';
    ";
    
    $resultAkunID = mysqli_query($database, $sqlAkunID);
    $akunID = $resultAkunID->fetch_assoc()['id_akun'];

    // get ruangan id
    $sqlRuanganID = "
        SELECT id_ruangan FROM ruangan WHERE nama_ruangan='$namaRuangan';
    ";

    $resultRuanganID = mysqli_query($database, $sqlRuanganID);
    $ruanganID = $resultRuanganID->fetch_assoc()['id_ruangan'];

    // Buat Query
    $sqlPesananRuangan = "
        INSERT INTO pesanan_ruangan VALUES($lastID, 'Pengecekan Dokumen', 0, '$jamMulai', '$jamSelesai', $akunID, $ruanganID);
    ";

    $resultPesananRuangan = mysqli_query($database, $sqlPesananRuangan);

    if($resultPesananRuangan) {
        header("Location: ../res/home.php?pemesanan=success");
        exit();
    }
    else {
        header("Location: ../res/buat_pesanan_ruangan.php?pemesanan=failed");
        exit();
    }
}


?>