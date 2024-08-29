<?php

	
	require_once '../../../../conexion.php';
	//require_once '../correo.php';

	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	date_default_timezone_set('America/Santiago');
	//$id = $_POST["id_cl"];

	$id = 1;
	$json = array();

	$sql = 
	"SELECT pc.id, DATE_FORMAT(pc.fecha_desde,'%d-%m-%Y') AS fecha_desde, 
	DATE_FORMAT(pc.fecha_hasta,'%d-%m-%Y') AS fecha_hasta,
	pl.id AS id_plan, 
	pl.nombre, 
	mp.id AS id_metodo,
	mp.nombre_metodo_pago, pl.valor, 
	pc.periodo_actual, pc.estado,
	c.plazo_pago
	FROM pago_cliente pc
	JOIN planes pl 
	ON pl.id = pc.plan
	JOIN metodo_pago mp
	ON mp.id = pc.metodo_pago
	JOIN cliente c 
	ON c.id = pc.id_cl
	WHERE pc.id_cl = $id;";

	$res = $conexion->query($sql);
	if($res->num_rows!=0)
	{
		$contador = 0;
		while($row = $res->fetch_array())
		{
			$contador++;
			$periodo_actual = "";
			if($row["periodo_actual"]=="S")
			{
				$periodo_actual = "Sí";
			}
			else
			{
				$periodo_actual = "No";
			}
			$json[] = array(
				"id" => $row["id"],
				"id_cl" => $id,
				"id_plan" => $row["id_plan"],
				"id_metodo" => $row["id_metodo"],
				"plazo_pago" => $row["plazo_pago"],
				"numero_registro" => $contador,
				"fecha_desde" => $row["fecha_desde"],
				"fecha_hasta" => $row["fecha_hasta"],
				"nombre" => $row["nombre"],
				"nombre_metodo_pago" => $row["nombre_metodo_pago"],
				"valor" => $row["valor"],
				"periodo_actual" => $periodo_actual,
				"estado_pago" => $row["estado"],
			);
		}
	}
	else
	{
		$json = array(
			"sEcho"=> 1,
			"iTotalRecords"=>"0",
			"iTotalDisplayRecords"=>"0",
			"aaData"=>[] 
		);
	}


	echo json_encode($json, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);


?>