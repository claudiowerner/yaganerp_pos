<?php


	session_start();
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);

	error_reporting(E_ALL);
	
	require_once '../../../../../../conexion.php';

	$id_us = $_SESSION['user']['id'];
	$nombre = $_SESSION['user']["nombre"];
	$id_cl = $_SESSION['user']["id_cl"];

	$id = $_POST["id"];

	//editar detalle pedido
	$sql = 
		"UPDATE pedidos_detalle 
		SET estado = 'N'
		WHERE id = '$id';";
		$res = $conexion->query($sql);
		echo $res;


?>