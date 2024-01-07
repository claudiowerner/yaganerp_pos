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

	$proveedor = $_POST["proveedor"]."\n";
	$fecha = $_POST["fecha"]."\n";
	$id = $_POST["id"]."\n";
	$producto = $_POST["producto"];
	$cantidad = $_POST["cantidad"];
	$valor = $_POST["valor"];

	//insertar pedido
	$sql = 
	"INSERT INTO pedidos
	VALUES 
	(null, 
	'$id_us', 
	'$proveedor', 
	'A', 
	'$id_us', 
	'$fecha');";
	$res = $conexion->query($sql);

	//seleccionar id de pedido
	$id_pedido = 0;
	$sql = 
	"SELECT MAX(id) AS id FROM pedidos;";
	$res = $conexion->query($sql);
	
	while($row= $res->fetch_array())
	{
		$id_pedido = $row["id"];
	}


	//insertar detalle pedido
	$contador_res_ok=0;//cuenta los registros bien hechos
	for($i=0;$i<$id;$i++)
	{
		$cont = $i+1;
		$sql = 
		"INSERT INTO pedidos_detalle 
		VALUES 
		(null,
		$id_cl,
		$id_pedido,'
		".$producto[$i]."',
		".$cantidad[$i].",
		".$valor[$i].",
		'$fecha');";
		$res = $conexion->query($sql);
		if($res)
		{
			$contador_res_ok++;
		}
		else 
		{
			die("Error al agregar pedidos: ". $conexion->error);
		}
	}
	if($contador_res_ok==$id)
	{
		echo "Pedido creado correctamente";
	}


?>