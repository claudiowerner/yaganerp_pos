<?php

	date_default_timezone_set('America/Santiago');
	require_once '../../../../conexion.php';
	//require_once '../correo.php';

	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	$id = $_POST["id"];

	/* ------------------------------------------ VERIFICAR DEUDAS IMPAGAS ---------------------------------------------- */
	$sql = "SELECT * FROM pago_cliente WHERE estado = 'N' AND id_cl = '$id'";
	$res = $conexion->query($sql);

	$deudas = $res -> num_rows;

	/* ------------------------------------------- ELIMINACIÓN DE CLIENTE ----------------------------------------------- */
	
	$json = array();
	
	if($deudas==0)
	{
		$sql = "UPDATE cliente SET estado = 'N' WHERE id = $id";
		$res = $conexion->query($sql);
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
				"titulo" => "Error ", 
				"mensaje" => "Error#1 al eliminar cliente", 
				"icono" => "error"
			);
		}
		
	}
	else
	{
		$json = array(
			"eliminacion" => false, 
			"titulo" => "Error", 
			"mensaje" => "Error#2 al eliminar cliente: El cliente posee deudas por pagar", 
			"icono" => "error"
		);
	}
	echo json_encode($json);
?>