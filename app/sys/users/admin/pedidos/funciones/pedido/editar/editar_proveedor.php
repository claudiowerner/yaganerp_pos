<?php


	session_start();
	date_default_timezone_set('America/Santiago');ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	

	error_reporting(E_ALL);
	
	require_once '../../../../../../conexion.php';

	$id_us = $_SESSION['user']['id'];
	$nombre = $_SESSION['user']["nombre"];
	$id_cl = $_SESSION['user']["id_cl"];

	$id_pedido = $_POST["id_pedido"];
	$id_proveedor = $_POST["id_proveedor"];

	//editar detalle pedido
	$sql = 
		"UPDATE pedidos 
		SET id_proveedor = '$id_proveedor' 
		WHERE id = $id_pedido
		AND id_cl = $id_cl";
		$res = $conexion->query($sql);
		echo $res;


?>