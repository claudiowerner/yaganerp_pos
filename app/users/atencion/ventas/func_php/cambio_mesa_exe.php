<?php

	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);

	error_reporting(E_ALL);

	session_start();
	if(isset($_SESSION['user']))
	{
		$tipo = $_SESSION['user']['tipo_usuario'];
     	if($tipo == 1){
       	    //header('Location: ../');
     	}
     	    }else{
    	    header('Location: ../../../../index.php');
     	}
     	require_once '../../../../conexion.php';

	    $id_us = $_SESSION['user']['id'];
	    $nombre = $_SESSION['user']["nombre"];
	    $id_cl = $_SESSION['user']["id_cl"];
	    $piso = 1;

	    $nMesaNueva = $_GET['nMesaNueva'];
	    $nMesaActual = $_GET['nMesaActual'];
	    $corr = $_GET['corr'];
	    $hora = $_GET['hora'];
		$ubic = $_GET['ubic'];

	    //obtener fecha
	    $hoy = getdate();
	    $fecha = $hoy['year']."-".$hoy['mon']."-".$hoy['mday']." ".$hora;

	    //obtener nombre y ubicacion de mesa nueva
	    $sql = "SELECT nom_mesa, ubicacion FROM mesas WHERE id_cl = 'id_cl' AND num_mesa=$nMesaNueva";
		$res = mysqli_query($conexion, $sql);
		$nom_mesa = '';
		while($row = $res->fetch_array())
		{
			$nom_mesa = $row['nom_mesa'];
		}

	    //actualizar estado mesa antigua
		$sql = "UPDATE mesas SET estado_gral = 'A' WHERE id_cl='$id_cl' AND id = $nMesaNueva";
		$r1 = mysqli_query($conexion, $sql);

		//actualizar estado mesa antigua
		$sql = "UPDATE mesas SET estado_gral = 'S' WHERE id_cl='$id_cl' AND id = $nMesaActual";
		$r2 = mysqli_query($conexion, $sql);

		//actualizar mesa tabla ventas
		$sql = "UPDATE ventas SET mesa = '$nMesaNueva', nom_mesa = '$nom_mesa', ubicacion ='$ubic' WHERE id_cl = '$id_cl' and mesa = $nMesaActual";
		$r3 = mysqli_query($conexion, $sql);

		//actualizar tabla correlativo
		$sql = "UPDATE correlativo SET mesa = '$nMesaNueva', nom_mesa = '$nom_mesa', ubicacion ='$ubic' WHERE id_cl = '$id_cl' and mesa = $nMesaActual AND correlativo = $corr";
		$r4 = mysqli_query($conexion, $sql);

		$sql = "INSERT INTO `yaganerp_webservices`.`cambio_mesa` VALUES (null, '$id_cl', '$corr', '$nombre', '$fecha');";
		$r5 = mysqli_query($conexion, $sql);
		if($r1&&$r2&&$r3&&$r4&&$r5)
		{
			echo "Mesa cambiada correctamente";
		}
		else
		{
			die("Error al cambiar mesa: ". mysqli_error($conexion));
		}


?>