<?php

	require "../../../../../php/headers.php"; 

	$id_us = $_SESSION['user']['id'];
	$nombre = $_SESSION['user']["nombre"];
	$id_cl = $_SESSION['user']["id_cl"];

	$nomCaja = $_POST['nomCaja'];
	$id_temp = 0;

	$hoy = getDate();

	$fecha = $hoy["year"]."-".$hoy["mon"]."-".$hoy["mday"]." ".$hoy["hours"].":".$hoy["minutes"].":".$hoy["seconds"];

	require_once '../../../../../conexion.php';
	
	//obtener ID de temporada abierta
	$sql = 
	"SELECT id 
	FROM temporada 
	WHERE id_cl = $id_cl 
	AND estado = 'S'";

	$res = $conexion->query($sql);
	$id = $res->fetch_assoc();
	$id_temp = $id["id"];

	//query
	$sql = 
	"INSERT INTO cierre_caja 
	VALUES (
		null, 
		'$id_cl',
		'$nomCaja', 
		$id_temp,
		'$id_us', 
		'$fecha', 
		'0000-00-00 00:00:00', 
		'A', 
		'0', 
		'$fecha'
	);";
	$resultado = $conexion->query($sql);;

	if($resultado)
	{
		echo "Registro de caja creado correctamente";
	}
	else
	{
		echo "Error al crear registro de caja: ".mysqli_error($conexion);
	}
?>
