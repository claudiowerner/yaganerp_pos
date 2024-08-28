<?php

	date_default_timezone_set('America/Santiago');
	require_once '../../../../conexion.php';
	//require_once '../correo.php';

	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	$plazo = $_POST["plazo"];
	$tipoPago = $_POST["tipoPago"];
	$rut = $_POST["rut"];

	
	$f = getdate();
	$año = $f["year"];
	$mes = $f["mon"];
	$dia = $f["mday"];
	$fechaRegistro = "$año-$mes-$dia";


	/* ---------------------------------------- REGISTRO EN TABLA PAGOS --------------------------------- */
	
	//calcular fecha de primer pago
	$mes_plazo = $mes + $plazo;
	//Si el resultado del calculo del mes de plazo es de + de 12 meses
	if($mes_plazo>12)
	{
		$mes_plazo = $mes_plazo - 12;
		$año = $año + 1;
	}
	//Si el mes de pago es febrero
	if($mes_plazo==2||$mes==2)
	{
		if($dia>28)
		{
			$dia = 28;
			$mes = 2;
			$mes_plazo = 2;
		}
		$fechaHasta = "$año-$mes_plazo-$dia";
	}
	else
	{
		$fechaHasta = "$año-$mes_plazo-$dia";
	}
	
	
	//seleccionar el ID del cliente

	$sql = "SELECT id FROM cliente WHERE rut = '$rut' AND estado = 'S'";
	$res = $conexion->query($sql);
	$resp = $res->fetch_assoc();
	$id_cl = $resp["id"];
	//seleccionar el plan del cliente

	$sql = "SELECT plan_comprado FROM cliente WHERE id = $id_cl";
	$res = $conexion->query($sql);
	$resp = $res->fetch_assoc();
	$plan_comprado = $resp["plan_comprado"];

	//registrar pago cliente
	$sql = "INSERT INTO pago_cliente VALUES
	(null, '$id_cl', '$plan_comprado', '$tipoPago', '$fechaRegistro', '$fechaHasta', 'S', 'N')";
	$r1 = $conexion->query($sql);

	$json = array();

	if($r1)
	{
		$json = array(
			"registro" => true
		);
	}
	else
	{
		$json = array(
			"registro" => false
		);
	}
	
	echo json_encode($json);
?>