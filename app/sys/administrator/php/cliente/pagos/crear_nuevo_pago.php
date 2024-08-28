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
	
	/*$id = $_POST["id_cl"];
	$tipoPago = $_POST["metodo"];
	$plazo = $_POST["periodo"];
	$plan = $_POST["plan"];*/

	$id = 1;
	$tipoPago = 1;
	$plazo = 1;
	$plan = 1;

	
	/* ----------------------------------------- OBTENER FECHAS BD ---------------------------------------- */
	

	echo $sql = 
	"SELECT YEAR(fecha_hasta) AS año, 
	MONTH(fecha_hasta) AS mes, 
	DAY(fecha_hasta) AS dia 
	FROM pago_cliente 
	WHERE id_cl = $id
	AND periodo_actual = 'S'";
	echo "<br>";
	$res = $conexion->query($sql);
	$resp = $res->fetch_array();
	$año = $resp["año"];
	$mes = $resp["mes"];
	$dia = $resp["dia"];

	/* -------------------------------------- ACTUALIZAR PAGO CLIENTE ------------------------------------- */
	echo $sql = 
	"UPDATE pago_cliente 
	SET periodo_actual = 'N',
	estado = 'S'
	WHERE id_cl = $id";
	$res = $conexion -> query($sql);
	echo "<br>";

	/* ---------------------------------------- CALCULO DE FECHA --------------------------------- */
	//calcular fecha inicio de proximo pago
	$fechaDesde = "$año-$mes-".($dia+1);

	//calcular fecha de próximo pago
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
	echo $sql = "INSERT INTO pago_cliente VALUES
	(null, $id, $plan, $tipoPago, '$fechaDesde', '$fechaHasta', 'S', 'N')";
	echo "<br>";

	$res = $conexion -> query($sql);

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
			"registro_pago" => true,
			"titulo" => "Excelente",
			"mensaje" => "Pago registrado correctamente",
			"icono" => "success"
		);
	}

	echo json_encode($json);
	
?>