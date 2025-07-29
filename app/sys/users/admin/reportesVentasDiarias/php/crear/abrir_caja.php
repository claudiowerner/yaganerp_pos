<?php

	require "../../../../../php/headers.php"; 

	$id_us = $_SESSION['user']['id'];
	$nombre = $_SESSION['user']["nombre"];
	$id_cl = $_SESSION['user']["id_cl"];

	$nomCaja = $_POST['nomCaja'];

	$hoy = getDate();

	$fecha = $hoy["year"]."-".$hoy["mon"]."-".$hoy["mday"]." ".$hoy["hours"].":".$hoy["minutes"].":".$hoy["seconds"];

	require_once '../../../../../conexion.php';
	
	//query
	$sql = 
	"INSERT INTO cierre_caja 
	VALUES (
		null, 
		'$id_cl',
		'$nomCaja', 
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
