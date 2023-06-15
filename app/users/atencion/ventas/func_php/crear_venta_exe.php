<?php

	session_start();
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);

	error_reporting(E_ALL);
    require_once '../../../../conexion.php';

	$tipo = $_SESSION['user']['tipo_usuario']; 
	$id_us = $_SESSION['user']['id'];
    $nombre = $_SESSION['user']["nombre"];
    $id_cl = $_SESSION['user']["id_cl"];
	$id_venta = $_GET["id_venta"];
	$idUbic = $_GET["idUbic"];
    $piso = 1;
    $nMesa = $_GET['nMesa'];
    $nomMesa = $_GET['nomMesa'];
	$idMesa = $_GET['idMesa'];

	

	if(isset($_GET['idProd'])&&$_GET['cantProd']&&$_GET['obs']&&$_GET['nMesa'])
	{
		$idProd = $_GET['idProd'];
		$cantProd = $_GET['cantProd'];
		$obs = $_GET['obs']; 
		$nMesa = $_GET['nMesa'];
		$hora = $_GET['hora'];
		$tipoVenta = $_GET["tipoVenta"];

		//Capturar ID de la caja abierta
		$idCaja = 0;
		$sql = "SELECT id FROM cierre_caja WHERE id_cl='$id_cl' and estado='A'";
		$resultado = mysqli_query($conexion, $sql);
		while ($row = $resultado->fetch_array())
		{
			$idCaja= $row['id'];
		}

		//Actualizar estado mesa de desocupada a ocupada
		$sql = "UPDATE mesas SET estado_gral = 'A' WHERE id_cl = '$id_cl' AND id = '$idMesa'";
		$resultado = mysqli_query($conexion, $sql);
		

		//obtener valor precio del producto
		$valor = 0;
		$sql = "SELECT valor_venta FROM productos WHERE id_cl = '$id_cl' AND id_prod = '$idProd'";
		$resultado = mysqli_query($conexion, $sql);
		while ($row = $resultado->fetch_array())
		{
			$valor = $row['valor_venta']*$cantProd;
		}

		//Calcular propina
		$propina = $valor*0.10;

		//obtener ubicacion 
		$sql = "SELECT u.id FROM mesas m JOIN ubicaciones u ON m.ubicacion = u.id WHERE m.id_cl = '$id_cl' and m.num_mesa = $nMesa";
		$ubic = '';

		$resultado = mysqli_query($conexion, $sql);
		while ($row = $resultado->fetch_array())
		{
			$ubic = $row['id'];
		}

		//obtener fecha
		$hoy = getdate();
		$fecha = $hoy['year']."-".$hoy['mon']."-".$hoy['mday']." ".$hora;
		    
		//registro tabla ventas
		echo $sql = "INSERT INTO ventas VALUES (null, $id_venta, '$id_cl', '$idCaja', '$nMesa', '$nomMesa', '1', '$idUbic', '$id_us', '$idProd', '$cantProd', '$valor', '$propina','$tipoVenta', 'N', 'N', '1', 'A', '$fecha', '0000-00-00 00:00:00', '0', '$obs')";
		$resultado = mysqli_query($conexion, $sql);
		    
		if($resultado)
		{
			echo $sql;
			echo "Venta agregada correctamente";
		}
		else
		{
			die("Error al agregar venta: ". mysqli_error($conexion));
		}
	}
	else
	{
		echo "Error al recibir nombre de piso y su estado";
	}


?>