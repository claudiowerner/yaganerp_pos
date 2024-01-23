<?php

	session_start();
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);

	error_reporting(E_ALL);
    require_once '../../../../conexion.php';

	$tipo = $_SESSION['user']['tipo_usuario']; 
	$id_us = $_SESSION['user']['id'];
    $nombre = $_SESSION['user']["nombre"];
    $id_cl = $_SESSION['user']["id_cl"];
	
    $caja = $_POST['caja'];
    $id_cierre = $_POST['turno'];
    $monto = $_POST['monto'];

	$sql = 
	"INSERT INTO monto_caja VALUES(
		null,
		$id_cl,
		$caja,
		$id_cierre,
		$monto
	)";
	$res = $conexion->query($sql);
	if($res)
	{
		echo "Registro de monto inicial de caja creado exitosamente";
	}
	else
	{
		echo "Ha ocurrido un error: ".$conexion->error;
	}

?>