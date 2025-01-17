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

    $unidades = $_POST["unidades"];
    $id_promo = $_POST["id_promo"];

    $sql = "UPDATE promociones SET unidades = '$unidades' WHERE id = $id_promo";
    $res = $conexion->query($sql);

    
?>