<?php


	session_start();
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);

	error_reporting(E_ALL);
	
	require_once '../../../../../conexion.php';

	$id_us = $_SESSION['user']['id'];
	$nombre = $_SESSION['user']["nombre"];
	$id_cl = $_SESSION['user']["id_cl"];
	
	$estado = $_POST["estado"]; 
	$id_pedido = $_POST["id"]; 

	//editar detalle pedido
	$sql = 
		"UPDATE pedidos SET `estado` = '$estado' WHERE (`id` = '$id_pedido');";
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