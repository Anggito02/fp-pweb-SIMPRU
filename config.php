<?php

if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {
    header( "Location: index.php" );
    die();
}

$server = "localhost:3306";
$user = "simq7123_pweb_simpru";
$password = "Simpru12345";
$nama_database = "db_simpru";

$database = mysqli_connect($server, $user, $password, $nama_database);

if( !$database ) {
    die("Gagal terhubung dengan database: ". mysqli_connect_error());
}

?>