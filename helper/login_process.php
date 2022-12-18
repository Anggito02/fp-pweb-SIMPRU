<?php

if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {
    header( "Location: ../index.php" );
    die();
}

include("../config.php");

session_start();

if( isset($_POST['submit']) ) {
    // cek username password
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "
        SELECT * FROM Akun
        WHERE username= _utf8 '$username' COLLATE utf8_bin AND
        password= _utf8 '$password' COLLATE utf8_bin;
    ";
    $result = mysqli_query($database, $sql);
    
    // cek apakah akun ditemukan
    if($result->num_rows == 1) {
        $formatted_result = mysqli_fetch_assoc($result);

        // cek tipe akun
        $tipe_akun = $formatted_result['tipe_akun'];

        // set session
        $_SESSION['username'] = $username;

        // jika admin, arahkan ke admin page
        if($tipe_akun == "admin") {
            header("Location: ../res/admin.php");
        }

        // jika user, arahkan ke landing page
        else if($tipe_akun == "user") {
            header("Location: ../index.php?login=success");
        }

        // jika not defined, kembalikan ke login page => error
        else {
            header("Location: ../res/login.php?error=true");
        }
    }
    // jika tidak ditemukan, autentikasi salah
    else {
        header("Location:../res/login.php?auth=failed");
    }
}

?>