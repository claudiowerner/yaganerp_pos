<?php


	session_start();
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);

	error_reporting(E_ALL);
	
	require_once '../../../../../../conexion.php';

	$id_us = $_SESSION['user']['id'];
	$nombre = $_SESSION['user']["nombre"];
	$id_cl = $_SESSION['user']["id_cl"];

	$id_pedido = $_POST["id_pedido"];
	$fecha_reg = $_POST["fecha_reg"];

	$json = array();

	//insertar pedido
	$sql = 
	"INSERT INTO pedidos_detalle
	VALUES 
	(null, 
	'$id_cl', 
	'$id_pedido', 
	'', 
	'0',
	'0',
	'S',
	'$fecha_reg');";
	$res = $conexion->query($sql);

	$json = array("registro"=>$res);

	echo json_encode($json);


?>