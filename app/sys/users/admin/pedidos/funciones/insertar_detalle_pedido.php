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

	$fecha = $_POST["fecha"];
	$producto = $_POST["prod"];
	$cantidad = $_POST["cant"];
	$valor = $_POST["val"];
	$id_pedido = $_POST["id_pedido"]; 

	//insertar pedido
	echo $sql = 
		"INSERT INTO pedidos_detalle 
		VALUES (null,$id_cl,$id_pedido,'$producto',$cantidad,$valor,'$fecha');";
		$res = $conexion->query($sql);;
		if($res)
		{
			echo "Detalle agregado correctamente.";
		}
		else 
		{
			die("Error al agregar pedidos: ". mysqli_error($conexion));
		}


?>