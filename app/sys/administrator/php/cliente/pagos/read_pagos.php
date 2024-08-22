<?php

	
	require_once '../../../../conexion.php';
	//require_once '../correo.php';

	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	date_default_timezone_set('America/Santiago');
	$id = $_POST["id_cl"];
	$json = array();

	$sql = 
	"SELECT DATE_FORMAT(pc.fecha_desde,'%d-%m-%Y') AS fecha_desde, 
	DATE_FORMAT(pc.fecha_hasta,'%d-%m-%Y') AS fecha_hasta, 
	pl.nombre, mp.nombre_metodo_pago, pl.valor, pc.periodo_actual
	FROM pago_cliente pc
	JOIN planes pl 
	ON pl.id = pc.plan_contratado
	JOIN metodo_pago mp
	ON mp.id = pc.metodo_pago
	WHERE id_cl = $id
	ORDER BY pc.id DESC;";

	$res = $conexion->query($sql);

	if($res->num_rows!=0)
	{
		while($row = $res->fetch_array())
		{
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
				"fecha_desde" => $row["fecha_desde"],
				"fecha_hasta" => $row["fecha_hasta"],
				"nombre" => $row["nombre"],
				"nombre_metodo_pago" => $row["nombre_metodo_pago"],
				"valor" => $row["valor"],
				"periodo_actual" => $periodo_actual,
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