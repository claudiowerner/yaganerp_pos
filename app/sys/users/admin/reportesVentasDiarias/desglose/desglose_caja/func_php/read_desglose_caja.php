<?php


	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);

	error_reporting(E_ALL);
	session_start();

	require_once '../../../../../../conexion.php';
	$id_us = $_SESSION['user']['id'];
	$nombre = $_SESSION['user']["nombre"];
	$id_cl = $_SESSION['user']["id_cl"];
	
	//Obtener variables enviadas desde el DOM
	$idCaja = $_GET['idCaja'];
	$idCierre = $_GET['idCierre'];

	//Arrays que almacenarán distintos datos
	$arrCorrelativo = array();
	$arrUsuario = array();
	$arrFechaPago = array();
	$arrEstado = array();
	$arrValorTotal = array();
	$arrFormaPago = array();

	//variable json que va a ser impresa en pantalla
	$json = array();
	

	//Rellenar arrIdVenta
	$sql = 
	"SELECT u.nombre, c.correlativo, c.fecha_cierre, c.estado, mp.nombre_metodo_pago
	FROM correlativo c
	JOIN usuarios u 
	ON u.id = c.usuario
	JOIN metodo_pago mp
	ON mp.id = c.forma_pago
	WHERE c.id_cl = $id_cl 
	AND c.caja = $idCaja
	AND c.id_cierre = $idCierre
	AND c.estado = 'C'";
	$res = $conexion -> query($sql);
	while($row = $res->fetch_array())
	{
		$arrCorrelativo[] = $row["correlativo"];
		$arrUsuario[] = $row["nombre"];
		$arrFechaPago[] = $row["fecha_cierre"];
		$arrEstado[] = "CERRADO";
		$arrFormaPago[] = $row["nombre_metodo_pago"];
	}

	//contador de filas de ArrCorrelativo
	$cont = count($arrCorrelativo);

	//declaracion variable de suma de valor total
	$valor_total = 0;

	//rellenar array Valor Total con los cálculos de descuento, imprimento literalmente el valor total
	for($i = 0; $i<$cont; $i++)
	{
		$valor_total = 0;
		$id = $arrCorrelativo[$i];
		$sql = 
		"SELECT ((valor-descto)*cantidad) AS valor 
		FROM ventas 
		WHERE id_cl = $id_cl 
		AND id_venta = $id
		AND estado = 'C'";
		$res = $conexion -> query($sql);
		while($row = $res -> fetch_array())
		{
			$valor_total = $valor_total + $row["valor"];
		}
		$arrValorTotal[] = $valor_total;
	}
	
	//rellenar array que va a mostrar la información en pantalla a través del DOM
	for($i = 0; $i<$cont; $i++)
	{
		$json[] =array(
			"id" => ($i+1),
			'id_venta' => $arrCorrelativo[$i],
			'creado_por' => $arrUsuario[$i],
			'hasta' => $arrFechaPago[$i],
			'estado' => $arrEstado[$i],
			'valor_total' => $arrValorTotal[$i],
			'metodo_pago' => strtoupper($arrFormaPago[$i])
		);
	}
	echo json_encode($json, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
?>
