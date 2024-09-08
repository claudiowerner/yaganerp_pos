<?php

	require_once '../../../conexion.php';
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	date_default_timezone_set('America/Santiago');
    //obtener fecha
	$hoy = getdate();
	$fecha = $hoy['year']."-".$hoy['mon']."-".$hoy['mday'];
	
	$id = $_POST["id"];
	$nombre = $_POST["nombre"];
	$usuarios = $_POST["usuarios"];
	$cajas = $_POST["cajas"];
	$valor = $_POST["valor"];

	$json = array();


	$sql = "UPDATE planes 
	SET nombre = '$nombre',
	usuarios = '$usuarios', 
	cajas = '$cajas', 
	valor = '$valor' 
	WHERE id = '$id';";
	$res = $conexion->query($sql);
	
	if($res)
	{
		$json = array(
			"editar_plan" => true,
			"titulo" => "Excelente",
			"mensaje" => "Plan editado correctamente",
			"icono" => "success"
		);
	}
	else
	{
		$json = array(
			"editar_plan" => false,
			"titulo" => "Error",
			"mensaje" => "Error al editar plan: ".$conexion->error,
			"icono" => "error"
		);
	}
	echo json_encode($json);
?>