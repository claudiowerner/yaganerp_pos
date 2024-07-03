<?php

	session_start();
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);

	error_reporting(E_ALL);
	if(isset($_SESSION['user']))
	{
		require_once '../../../../conexion.php';

	    $id_us = $_SESSION['user']['id'];
	    $nombre = $_SESSION['user']["nombre"];
	    $id_cl = $_SESSION['user']["id_cl"];
	    $piso = 1;

		$id_detalle = $_POST["id_detalle"];

		$sql = 
		"DELETE FROM pedidos_detalle
		WHERE id = $id_detalle";

		$res = $conexion->query($sql);;

		if($res)
		{
			echo "Detalle de pedido eliminado correctamente";
		}

	}


?>