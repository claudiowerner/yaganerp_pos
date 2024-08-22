<?php


	session_start();
	date_default_timezone_set('America/Santiago');
	
	require_once '../../../../conexion.php';


	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
    $id_us = $_SESSION['user']['id'];
    $nombre = $_SESSION['user']["nombre"];
    $id_cl = $_SESSION['user']["id_cl"];

	$json = array();

    $nom = $_POST['nomCaja'];
    $fecha = $_POST['fecha'];

	$sql = "INSERT INTO cajas VALUES 
	(NULL, '$id_cl','$nom', 'S', '$id_us', '$fecha');";
	$resultado = $conexion->query($sql);

	if($resultado)
	{
		$json = array(
			"titulo" => "Excelente",
			"mensaje" => "Caja creada correctamente",
			"icono" => "success"
		);
	}
	else
	{
		$json = array(
			"titulo" => "Error",
			"mensaje" => "Ha ocurrido un error al crear la caja: ".$conexion->error,
			"icono" => "error"
		);
	}

	echo json_encode($json)
?>