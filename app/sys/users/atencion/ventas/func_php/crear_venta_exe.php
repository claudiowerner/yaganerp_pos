<?php

	session_start();
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);

	error_reporting(E_ALL);
    require_once '../../../../conexion.php';

	$tipo = $_SESSION['user']['tipo_usuario']; 
	$id_us = $_SESSION['user']['id'];
    $nombre = $_SESSION['user']["nombre"];
    echo $id_cl = $_SESSION['user']["id_cl"];
	

	if(isset($_GET['idProd'])&&$_GET['cantProd'])
	{
		$idProd = $_GET['idProd'];
		$cantProd = $_GET['cantProd'];
		$hora = $_GET['hora'];
		$id_venta = $_GET["id_venta"];
		$nomCaja = $_GET['nomCaja'];
		$idCaja = $_GET['idCaja'];

		//Capturar ID de la caja abierta
		$idTurno = 0;
		$sql = "SELECT id FROM cierre_caja WHERE id_cl='$id_cl' and estado='A'";
		$resultado = $conexion->query($sql);
		while ($row = $resultado->fetch_array())
		{
			$idTurno= $row['id'];
		}

		//obtener valor precio del producto
		$valor = 0;
		echo $sql = "SELECT valor_venta 
		FROM productos 
		WHERE id_cl = '$id_cl' 
		AND id_prod = '$idProd'";
		$resultado = $conexion->query($sql);
		while ($row = $resultado->fetch_array())
		{
			$valor = $row['valor_venta']*$cantProd;
		}

		//obtener fecha
		$hoy = getdate();
		$fecha = $hoy['year']."-".$hoy['mon']."-".$hoy['mday']." ".$hora;


		//Actualizar estado mesa de desocupada a ocupada
		$sql = "UPDATE cajas SET estado = 'A' WHERE id_cl = '$id_cl' AND id = '$idCaja'";
		$resultado = $conexion->query($sql);

		$descto = 0;
		$sql = "SELECT descto FROM ventas WHERE id_cl = $id_cl AND id_venta = $id_venta AND descto!=0 AND estado!='N' GROUP BY id_venta";
		$res = $conexion->query($sql);;
		while($row =  $res->fetch_array())
		{
			echo $descto = ($row["descto"]/100);
			echo "\n";
		}

		//Cálculo de descuento
		$valor_descto_apl = 0;
		if($descto!=0)
		{
			$valor_descto_apl = ($valor*$descto);
		}

		//registro tabla ventas
		$sql = 
		"INSERT INTO ventas VALUES 
		(null, 
		$id_venta, 
		'$id_cl', 
		'$idCaja', 
		'$nomCaja', 
		'$id_us', 
		'$idProd', 
		'$cantProd', 
		'$valor', 
		'$descto', 
		'$valor_descto_apl', 
		'A', 
		'$fecha', 
		'0000-00-00 00:00:00', 
		'0',
		'$descto')";
		$resultado = $conexion->query($sql);;
		    
		if($resultado)
		{
			echo "Venta agregada correctamente";
		}
		else
		{
			die("Error al agregar venta: ". $conexion->error);
		}
	}
	else
	{
		echo "Error al recibir datos de venta";
	}


?>