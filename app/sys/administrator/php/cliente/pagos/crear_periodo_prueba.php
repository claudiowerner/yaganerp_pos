<?php

	date_default_timezone_set('America/Santiago');
	require_once '../../../../conexion.php';
	//require_once '../correo.php';

	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	//$rut = $_POST["rut"];

	
	$f = getdate();
	$año = $f["year"];
	$mes = $f["mon"];
	$dia = $f["mday"];
	$rut = $_POST["rut"];
	$fechaRegistro = "$año-$mes-$dia";

	/* ---------------------------------------- REGISTRO EN TABLA PAGOS --------------------------------- */
	
	//calcular fecha de fin de tiempo de prueba
	$dia_plazo = $dia + 14;

	//cantidad de dias del mes en curso
	$dias_mes_actual = date('t');

	if($dia_plazo>$dias_mes_actual)
	{
		$dia = $dia_plazo - $dias_mes_actual;
		$mes++;
	}
	
	//Si el resultado del calculo del mes de plazo es de + de 12 meses
	if($mes>12)
	{
		$mes = $mes - 12;
		$año = $año + 1;
	}
	$fechaHasta = "$año-$mes-$dia";

	
	
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
	(null, '$id_cl', '$plan_comprado', '5', '$fechaRegistro', '$fechaHasta', 'S', 'N', 'N')";
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