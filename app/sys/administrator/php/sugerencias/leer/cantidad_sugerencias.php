<?php

	session_start();
	date_default_timezone_set('America/Santiago');
    ini_set('display_errors', '1');
	
	require_once '../../../../conexion.php';
	require_once '../../../../env_var/env_db.php';
	
	/* ----------------------------------------------------- CONSULTA SQL ------------------------------------------------ */
	//Obtener número de sugerencias por leer
    $sql = "SELECT count(id) AS cont FROM sugerencias WHERE estado = 'A'";
    $res = $conexion -> query($sql);
    $arrRes = $res->fetch_assoc();
    $sug_sin_leer = $arrRes["cont"];
	//Obtener el número de sugerencias totales
	$sql = "SELECT count(id) AS cont FROM sugerencias WHERE estado != 'N'";
    $res = $conexion -> query($sql);
    $arrRes = $res->fetch_assoc();
    $sugs_totales = $arrRes["cont"];


	$json = array(
		"sug_sin_leer" => $sug_sin_leer,
		"sugs_totales" => $sugs_totales,
	);

	echo json_encode($json);
?>