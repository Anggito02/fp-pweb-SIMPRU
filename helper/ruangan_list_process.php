<?php

if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {
    header( "Location: ../index.php" );
    die();
}

include("../config.php");

// ambil data list ruangan
$sqlRuangan = "
    SELECT jenis_ruangan, nama_ruangan, kuota_ruangan
    FROM ruangan
    WHERE status_operasional=1;
";

$resultListRuangan = mysqli_query($database, $sqlRuangan);

?>