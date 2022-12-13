<?php

if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {
    header( "Location: ../index.php" );
    die();
}

include("../config.php");

session_start();

session_unset();

session_destroy();

header("Location: ../index.php?logout=true");

?>