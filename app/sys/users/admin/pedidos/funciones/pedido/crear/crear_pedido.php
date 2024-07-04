<?php


	session_start();
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);

	error_reporting(E_ALL);
	
	require_once '../../../../../../conexion.php';

	$id_us = $_SESSION['user']['id'];
	$nombre = $_SESSION['user']["nombre"];
	$id_cl = $_SESSION['user']["id_cl"];

	$fecha = $_POST['fecha'];

	$json = array();

	//insertar pedido
	$sql = 
	"INSERT INTO pedidos
	VALUES 
	(null, 
	'$id_cl', 
	'1', 
	'A', 
	'A',
	'A',
	'$id_us', 
	'$fecha');";
	$res = $conexion->query($sql);

	$json = array("registro"=>$res);

	echo json_encode($json);


?>