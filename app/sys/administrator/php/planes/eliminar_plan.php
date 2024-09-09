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

	$json = array();


	$sql = "UPDATE planes 
	SET estado = 'N'
	WHERE id = $id";
	$res = $conexion->query($sql);
	
	if($res)
	{
		$json = array(
			"eliminar_plan" => true,
			"titulo" => "Excelente",
			"mensaje" => "Plan eliminado correctamente",
			"icono" => "success"
		);
	}
	else
	{
		$json = array(
			"eliminar_plan" => false,
			"titulo" => "Error",
			"mensaje" => "Error al eliminar plan: ".$conexion->error,
			"icono" => "error"
		);
	}
	echo json_encode($json);
?>