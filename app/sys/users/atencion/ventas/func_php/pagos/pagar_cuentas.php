<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);

    error_reporting(E_ALL);

    session_start();
    require_once '../../../../../conexion.php';

    $id_us = $_SESSION['user']['id'];
    $nombre = $_SESSION['user']["nombre"];
    $id_cl = $_SESSION['user']["id_cl"];

    //recepción de array de IDs de venta
    print_r($arr_correlativo = $_POST["array"]);
?>