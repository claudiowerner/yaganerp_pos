<?php


	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);

	error_reporting(E_ALL);
	session_start();

	$id_us = $_SESSION['user']['id'];
	$nombre = $_SESSION['user']["nombre"];
	$id_cl = $_SESSION['user']["id_cl"];
	

	//recepcion de ID de venta
	$id_venta = $_POST['idv'];
	$id_caja = $_POST['idc'];

	require_once "../../../../../../conexion.php";

	//declaración de variable que obtendrá el nombre de usuario y el tipo de pago
	$nom_us = "";
	$metodo_pago = "";
	//Declaración de arrays 
	$arrIdVenta = array();
	$arrIdProd = array();
	$arrCant = array();
	$arrNomProd = array();
	$arrValor = array();
	$arrEstado = array();
	$arrFecha = array();
	$arrDescto = array();

	//obtener nombre del usuario creador de la venta
    $sql = 
	"SELECT u.nombre, mp.nombre_metodo_pago
	FROM correlativo c
	JOIN usuarios u
	ON u.id = c.usuario
	JOIN metodo_pago mp
	ON mp.id = c.forma_pago 
	WHERE correlativo = $id_venta";
	$res = $conexion->query($sql);
	
	while($row = $res -> fetch_array())
	{
		$nom_us = $row["nombre"];
		$metodo_pago = $row["nombre_metodo_pago"];
	}

	//rellenar Arrays
	//Rellenar array IdVenta
	$sql = 
	"SELECT id, producto, SUM(cantidad) AS cantidad, fecha, descto 
	FROM ventas 
	WHERE id_cl = $id_cl 
	AND id_venta = $id_venta
	AND estado = 'P'
	AND producto!=0
	GROUP BY producto";
	
	$res = $conexion->query($sql);
	while($row = $res->fetch_array())
	{
		$arrIdVenta[] = $row["id"];
		$arrIdProd[] = $row["producto"];
		$arrCant[] = $row["cantidad"];
		$arrFecha[] = $row["fecha"];
	}

	//contador de filas de arrIdVenta 
	$cont = count($arrIdVenta);
	
	//Rellenar arrNomProd y arrValor
	for($i=0; $i<$cont; $i++)
	{
		$idp = $arrIdProd[$i];
		$sql =
		"SELECT nombre_prod, valor_venta 
		FROM productos 
		WHERE id_cl = $id_cl 
		AND id_prod = $idp";
		$res = $conexion->query($sql);
		while($row = $res -> fetch_array())
		{
			$arrNomProd[] = $row["nombre_prod"];
			$arrValor[] = $row["valor_venta"];
		}
	}
	
	//rellenar array de salida
	$json = array();

	for($i=0; $i<$cont; $i++)
	{
		$iva = ($arrValor[$i]*$arrCant[$i])*0.19;
		$json[] = array(
			"nombre_prod" => $arrNomProd[$i], 
			"cantidad" => $arrCant[$i],
			"valor" => $arrValor[$i],
			"estado_venta" => "<button class='btn btn-primary' style='width=100%' disabled>CERRADO</button>"
		);
	}

	echo json_encode($json, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
?>