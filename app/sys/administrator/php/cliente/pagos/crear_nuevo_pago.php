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
	
	$id = $_GET["id"];
	$tipoPago = $_GET["tipoPago"];

	/* -------------------------------------- ACTUALIZAR PAGO CLIENTE ------------------------------------- */
	$sql = 
	"UPDATE pago_cliente 
	SET periodo_actual = 'N',
	estado = 'S'
	WHERE id_cl = $id";
	$res = $conexion -> query($sql);
	/* ----------------------------------------- OBTENER FECHAS BD ---------------------------------------- */
	

	$sql = 
	"SELECT YEAR(fecha_hasta) AS año, 
	MONTH(fecha_hasta) AS mes, 
	DAY(fecha_hasta) AS dia 
	FROM pago_cliente 
	WHERE id_cl = $id";
	$res = $conexion->query($sql);
	$resp = $res->fetch_array();
	$año = $resp["año"];
	$mes = $resp["mes"];
	$dia = $resp["dia"];

	/* ---------------------------------------- CALCULO DE FECHA --------------------------------- */
	//calcular fecha inicio de proximo pago
	$fechaDesde = "$año-$mes-".($dia+1);

	//calcular fecha de próximo pago
	$plazo = $_GET["plazo"];
	$mes_plazo = $mes + $plazo;
	$fechaHasta = "";
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
	}
	else
	{
		$dia = $dia-1;
	}
	if($dia<10)
	{
		$dia = "0$dia";
	}
	if($mes_plazo<10)
	{
		$mes_plazo = "0$mes_plazo";
	}
	
	
	$fechaHasta = "$año-$mes_plazo-$dia";

	/* --------------------------------------------- REGISTRO EN PAGO CLIENTE -------------------------------- */
	$sql = "INSERT INTO pago_cliente VALUES
	(null, $id, $tipoPago, '$fechaDesde', '$fechaHasta', 'S', 'N')";

	$res = $conexion -> query($sql);
	
?>