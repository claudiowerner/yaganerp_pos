<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);

	error_reporting(E_ALL);

		session_start();
     	require_once '../../../../conexion.php';

	    $id_us = $_SESSION['user']['id'];
	    $nombre = $_SESSION['user']["nombre"];
	    $id_cl = $_SESSION['user']["id_cl"];
	    $piso = 1;

		$id_venta = $_POST["id_venta"];


		//Capturar ID de la caja abierta
		$idCaja = 0;
		$sql = "SELECT id FROM cierre_caja WHERE id_cl='$id_cl' and estado='A'";
		$resultado = $conexion->query($sql);
		while ($row = $resultado->fetch_array())
		{
			$idCaja= $row['id'];
		}
		
		$sql = "UPDATE ventas SET estado = 'N' WHERE id = $id_venta;";
		$res2 = $conexion->query($sql);
		if($res2)
		{
			echo "Venta eliminada correctamente";
		}
		else
		{
			die("Error al eliminar venta: ". mysqli_error($conexion));
		}


?>