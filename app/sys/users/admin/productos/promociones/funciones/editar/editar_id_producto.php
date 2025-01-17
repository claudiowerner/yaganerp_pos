<?php


	session_start();
	date_default_timezone_set('America/Santiago');
    require_once '../../../../../../conexion.php';

	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
    $id_us = $_SESSION['user']['id'];
    $nombre = $_SESSION['user']["nombre"];
    $id_cl = $_SESSION['user']["id_cl"];

    $id = $_POST["id_promo"];
    $id_prod = $_POST["id_prod"];

    $sql = "UPDATE promociones SET id_prod = '$id_prod' WHERE id = $id";
    $res = $conexion->query($sql);

    
?>