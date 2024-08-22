<?php


	session_start();
	date_default_timezone_set('America/Santiago');
	require_once '../../../../conexion.php';


	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
    $id_us = $_SESSION['user']['id'];
    $nombre = $_SESSION['user']["nombre"];
    $id_cl = $_SESSION['user']["id_cl"];

    $rut = $_POST['rut'];

	$sql = "SELECT * FROM cuenta_corriente
	WHERE id_cl = $id_cl
	AND estado = 'A'
	AND rut = '$rut'";

	$res = $conexion->query($sql);

	echo $res->num_rows;
	
?>