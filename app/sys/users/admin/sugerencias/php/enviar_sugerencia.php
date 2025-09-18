<?php

    session_start();
	
	date_default_timezone_set('America/Santiago');
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	$id_us = $_SESSION['user']['id'];
	$nombre = $_SESSION['user']["nombre"];
	$id_cl = $_SESSION['user']["id_cl"];


	require_once '../../../../conexion.php';

	//Obtener ID de sugerencia
	$sql = "SELECT COALESCE(MAX(id), 0) AS id FROM sugerencias";
	$res = $conexion -> query($sql);
	$arrRes = $res -> fetch_assoc();
	$id = $arrRes["id"]+1;

	if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
	{
		$json = array(
			"registro" => false,
			"titulo" => "Error",
			"mensaje" => "Error al enviar sugerencia.",
			"icono" => "error"
		);

		$mysqli->set_charset('utf8');

		$sugerencia = $mysqli->real_escape_string($_POST['sugerencia']);

		
		$hoy = getdate();
		$fecha = $hoy['year']."-".$hoy['mon']."-".$hoy['mday']." ".$hoy["hours"].":".$hoy["minutes"].":".$hoy["seconds"];


		//consulta para verificar si existe una password temporal
		if ($query = $mysqli->prepare("INSERT INTO sugerencias VALUES (?,?, '$fecha', ?, 'A')"))
		{
			$query->bind_param('iis', $id, $id_cl, $sugerencia);

			$query->execute();

			$res = $query->get_result();

			if($query)
			{
				$json = array(
					"registro" => true,
					"titulo" => "Excelente",
					"mensaje" => "Sugerencia enviada correctamente",
					"icono" => "success"
				);
			}
		}
	    echo json_encode($json, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
	}
?>