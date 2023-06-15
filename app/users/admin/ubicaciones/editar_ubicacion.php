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
    $piso = 1;

    $nom = $_GET["nom"];
	$estado = $_GET["estado"];
	$idUbic = $_GET["idUbic"];
	$piso = $_GET["piso"];

    //obtener fecha
	$hoy = getdate();
	$fecha = $hoy['year']."-".$hoy['mon']."-".$hoy['mday'];
	
	if($estado=='N')
	{
		$sql = "SELECT * FROM ubicaciones WHERE id_cl = '$id_cl' AND id = '$idUbic';";
		$resultado = mysqli_query($conexion, $sql);
		
		if($resultado->num_rows==0)
		{
			$sql = "UPDATE ubicaciones SET nombre = '$nom', estado = '$estado' WHERE id = $idUbic;";
			$resultado = mysqli_query($conexion, $sql);
			if($resultado)
			{
				echo "Ubicación editada correctamente";
			}
			else
			{
				die("Error al modificar ubicación: ". mysqli_error($conexion));
			}
		}
		else
		{
			$sql = "UPDATE ubicaciones SET nombre = '$nom' WHERE id = $idUbic;";
			$resultado = mysqli_query($conexion, $sql);
			echo "No se puede desactivar la ubicación $nom porque existen mesas activadas asociadas a esta ubicación. Solo se cambió el nombre y el piso.";
		}
	}
	else
	{
		$sql = "UPDATE ubicaciones SET nombre = '$nom', piso = $piso, `estado` = '$estado' WHERE id_cl = '$id_cl' AND id = '$idUbic';";
		$resultado = mysqli_query($conexion, $sql);
		if($resultado)
		{
			echo "Ubicación editada correctamente";
		}
		else
		{
			die("Error al modificar ubicación: ". mysqli_error($conexion));
		}
	}
?>