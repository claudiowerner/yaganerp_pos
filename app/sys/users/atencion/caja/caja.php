<?php

	session_start();
	date_default_timezone_set('America/Santiago');ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);

	error_reporting(E_ALL);
	require_once '../../../conexion.php';

    $id_us = $_SESSION['user']['id'];
    $nombre = $_SESSION['user']["nombre"];
    $id_cl = $_SESSION['user']["id_cl"];
    
    
	$hora = $_GET['hora'];
	$fecha = $_GET['fecha'];
	
	$sql = "SELECT * FROM cierre_caja WHERE id_cl =$id_cl AND estado = 'A'";
	$r = $conexion->query($sql);
	$turno = 0;
	
	while($row = $r->fetch_array())
	{
		$turno = 1;
	}
	echo $turno;

		
?>