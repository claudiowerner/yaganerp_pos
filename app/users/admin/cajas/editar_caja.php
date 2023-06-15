<?php


	session_start();
	if(isset($_SESSION['user'])){
      	$tipo = $_SESSION['user']['tipo_usuario'];
     	if($tipo == 1){
       	    //header('Location: ../');
     	}
     	    }else{
    	    header('Location: ../../../../index.php');
     	}
     	require_once '../../../conexion.php';


	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
    $id_us = $_SESSION['user']['id'];
    $nombre = $_SESSION['user']["nombre"];
    $id_cl = $_SESSION['user']["id_cl"];
    $Caja = 1;

    $nom = $_GET["nomCaja"];
	$estado = $_GET["estado"];
	$idCaja = $_GET["idCaja"];

    //obtener fecha
	$hoy = getdate();
	$fecha = $hoy['year']."-".$hoy['mon']."-".$hoy['mday'];
	
	//
	$resultado = "";
	if($estado=='N')
	{
		$sql = 
		"SELECT * FROM cajas c
		JOIN correlativo corr
		ON corr.caja = c.id 
		WHERE corr.estado='A' 
		AND c.id_cl = '1'
		AND c.id = '1'";
		$resultado = mysqli_query($conexion, $sql);
		if($resultado->num_rows==0)
		{
			$sql = "UPDATE cajas SET nom_caja = '$nom', estado = '$estado' WHERE id = $idCaja;";
			$resultado = mysqli_query($conexion, $sql);
			if($resultado)
			{
				echo "Caja editada correctamente";
			}
			else
			{
				die("Error al modificar caja: ". mysqli_error($conexion));
			}
		}
		else
		{
			$sql = "UPDATE Cajas SET nom_caja = '$nom' WHERE id = $idCaja;";
			$resultado = mysqli_query($conexion, $sql);
			echo "No se puede desactivar la caja porque existen ventas activas asociadas. Solo se editó el nombre.";
		}
	}
	else
	{
		$sql = "UPDATE Cajas SET nom_caja = '$nom', estado = '$estado' WHERE id = $idCaja;";
		$resultado = mysqli_query($conexion, $sql);
		if($resultado)
		{
			echo "Caja editada correctamente";
		}
		else
		{
			die("Error al modificar la caja: ". mysqli_error($conexion));
		}
	}

?>