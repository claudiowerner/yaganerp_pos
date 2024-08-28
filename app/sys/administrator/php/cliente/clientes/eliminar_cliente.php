<?php

	date_default_timezone_set('America/Santiago');
	require_once '../../../../conexion.php';
	//require_once '../correo.php';

	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	$id = $_POST["id"];

	/* -------------------------------------- ELIMINACIÓN DE CLIENTE ------------------------------------------ */

	$sql = "UPDATE cliente SET estado = 'N' WHERE id = $id";
	$res = $conexion->query($sql);

	$json = array();

	if($res)
	{
		$json = array(
			"eliminacion" => true, 
			"titulo" => "Excelente", 
			"mensaje" => "Cliente eliminado correctamente", 
			"icono" => "success"
		);
	}
	else
	{
		$json = array(
			"eliminacion" => false, 
			"titulo" => "Error", 
			"mensaje" => "Error al eliminar cliente", 
			"icono" => "error"
		);
	}
	echo json_encode($json);
?>