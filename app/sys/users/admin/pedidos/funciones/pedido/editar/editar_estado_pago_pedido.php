<?php


	session_start();
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);

	error_reporting(E_ALL);
	
	require_once '../../../../../../conexion.php';

	$id_us = $_SESSION['user']['id'];
	$nombre = $_SESSION['user']["nombre"];
	$id_cl = $_SESSION['user']["id_cl"];
	
	$estado_pago = $_POST["estado_pago"]; 
	$id_pedido = $_POST["id_pedido"]; 

	//editar detalle pedido
	$sql = "UPDATE pedidos SET `estado_pago` = '$estado_pago' WHERE (`id` = '$id_pedido');";
	$res = $conexion->query($sql);;
	echo $res;


?>