<?php


	session_start();
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);

	error_reporting(E_ALL);
	
	require_once '../../../../conexion.php';

	$id_us = $_SESSION['user']['id'];
	$nombre = $_SESSION['user']["nombre"];
	$id_cl = $_SESSION['user']["id_cl"];
	$piso = 1;

	$producto = $_POST["prod"];
	$cantidad = $_POST["cant"];
	$valor = $_POST["val"];
	$id_detalle = $_POST["id_detalle"]; 

	//editar detalle pedido
	echo $sql = 
		"UPDATE pedidos_detalle 
		SET 
		`producto` = '$producto', 
		`cantidad` = '$cantidad', 
		`valor` = '$valor' 
		WHERE (`id` = '$id_detalle');
		";
		$res = $conexion->query($sql);;
		if($res)
		{
			echo "Detalle modificado correctamente.";
		}
		else 
		{
			die("Error al modificar detalle: ". mysqli_error($conexion));
		}


?>