<?php

	date_default_timezone_set('America/Santiago');
	require_once '../../../../conexion.php';
	//require_once '../correo.php';

	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	
    $f = getdate();
    $año = $f["year"];
    $mes = $f["mon"];
    $dia = $f["mday"];
    $fecha_usuario = "$año-$mes-$dia";
	
	$id = $_POST["id"];

	$sql = "UPDATE pago_cliente SET estado = 'S' WHERE id = $id";
	$res = $conexion->query($sql);

	$json = array();
	if($res)
	{
		$json = array(
			"registro_pago" => true, 
			"titulo" => "Excelente",
			"mensaje" => "Pago registrado correctamente",
			"icono" => "success"
		);
	}
	else
	{
		$json = array(
			"registro_pago" => false, 
			"titulo" => "Error",
			"mensaje" => "Ocurrió un error al registrar el pago",
			"icono" => "error"
		);
	}


	echo json_encode($json);
	
?>