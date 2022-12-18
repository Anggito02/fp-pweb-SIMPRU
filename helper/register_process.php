<?php

if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {
    header( "Location: ../index.php" );
    die();
}

include("../config.php");

session_start();

// cek jika data sudah di submit
if( isset($_POST['submit']) ) {
    // ambil data dr formulir
    $namaDepan = $_POST['namaDepan'];
    $namaBelakang = $_POST['namaBelakang'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $retype_password = $_POST['retype_password'];
    $email = $_POST['email'];
    $noTelp = $_POST['noTelp'];
    $nip = $_POST['nip'];
    $jabatan = $_POST['jabatan'];
    $tmp_nama_foto = $_FILES['foto']['name'];
    $tmp_file_dir = $_FILES['foto']['tmp_name'];

    // cek kesamaan password
    if($password != $retype_password) {
        header("Location: ../res/register.php?retype=failed");
        exit();
    }

    // cek ketersediaan username
    $sqlUsername = "
        SELECT username
        FROM akun
        WHERE username= _utf8 '$username' COLLATE utf8_bin;
    ";
    $resultUsername = mysqli_query($database, $sqlUsername);

    // jika username sudah dipakai
    if(mysqli_fetch_assoc($resultUsername)) {
        // tolak
        header("Location: ../res/register.php?username=unavail");
        exit();
    }

    // jika username belum dipakai
    // ambil id terakhir
    $sqlLastID = "
        SELECT MAX(id_akun) AS 'lastID' FROM akun;
    ";
    $resultLastID = mysqli_query($database, $sqlLastID);
    $lastID = $resultLastID->fetch_assoc()['lastID'] + 1;

    // proses nama foto
    $nama_foto = date('dmYHis')."-".$tmp_nama_foto;

    // file dir foto
    $path_foto = "../uploaded_files/img/foto_tanda_pengenal/".$nama_foto;

    // cek apakah foto sudah terupload pada database
    if(move_uploaded_file($tmp_file_dir, $path_foto)) {
        // buat query
        $sqlInsert = "
            INSERT INTO akun(id_akun, tipe_akun, akun_dibuat, nama_depan, nama_belakang, username, password, email, no_telp, nip, jabatan, foto_tanda_pengenal)
            VALUES ($lastID, 'user', NOW(), '$namaDepan', '$namaBelakang', '$username', '$password', '$email', '$noTelp', '$nip', '$jabatan', '$path_foto');
        ";
        $resultInsert = mysqli_query($database, $sqlInsert);

        if($resultInsert) {
            $_SESSION['username'] = $username;
            header("Location: ../index.php?register=success");
        }
        else {
            header("Location: ../res/register.php?register=failed");
        }
    }
}

?>