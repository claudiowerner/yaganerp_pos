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

	$id_pedido = $_POST["id_pedido"]; 
	$id_prov = $_POST["id_prov"]; 

	//editar detalle pedido
	$sql = 
		"UPDATE pedidos
		SET 
		id_proveedor = '$id_prov'
		WHERE (`id` = '$id_pedido');
		";
		$res = $conexion->query($sql);
		if($res)
		{
			echo "Proveedor modificado correctamente.";
		}
		else 
		{
			die("Error al modificar proveedor: ". mysqli_error($conexion));
		}


?>