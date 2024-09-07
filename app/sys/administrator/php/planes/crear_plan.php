<?php

	require_once '../../../conexion.php';

	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	date_default_timezone_set('America/Santiago');

	$json = array();

	$nombre = $_POST["nombre"];
	$usuarios = $_POST["usuarios"];
	$cajas = $_POST["cajas"];
	$valor = $_POST["valor"];
	$sql = "INSERT INTO planes VALUES 
	(null,'$nombre', 'S', '$usuarios', '$cajas', '$valor');";
	$res = $conexion->query($sql);


	if($res)
	{
		$json = array(
			"registrar_plan" => true, 
			"titulo" => "Excelente",
			"mensaje" => "Plan registrado correctamente.",
			"icono" => "success"
		);
	}
	else
	{
		$error = $conexion->error;
		$json = array(
			"registrar_plan" => false, 
			"titulo" => "Excelente",
			"mensaje" => "Error al agregar plan: $error",
			"icono" => "success"
		);
	}

	echo json_encode($json);
?>