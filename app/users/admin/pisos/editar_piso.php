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

    $nom = $_GET["nomPiso"];
	$estado = $_GET["estado"];
	$idPiso = $_GET["idPiso"];

    //obtener fecha
	$hoy = getdate();
	$fecha = $hoy['year']."-".$hoy['mon']."-".$hoy['mday'];
	
	//
	$resultado = "";
	if($estado=='N')
	{
		$sql = "SELECT * FROM pisos p JOIN ubicaciones u ON p.id = u.piso WHERE u.estado='S' AND p.id = '$idPiso'";
		$resultado = mysqli_query($conexion, $sql);
		if($resultado->num_rows==0)
		{
			$sql = "UPDATE pisos SET nombre = '$nom', estado = '$estado' WHERE id = $idPiso;";
			$resultado = mysqli_query($conexion, $sql);
			if($resultado)
			{
				echo "Piso editado correctamente";
			}
			else
			{
				die("Error al modificar piso: ". mysqli_error($conexion));
			}
		}
		else
		{
			$sql = "UPDATE pisos SET nombre = '$nom' WHERE id = $idPiso;";
			$resultado = mysqli_query($conexion, $sql);
			echo "No se puede desactivar el piso porque existen ubicaciones activadas. Solo se editó el nombre.";
		}
	}
	else
	{
		$sql = "UPDATE pisos SET nombre = '$nom', estado = '$estado' WHERE id = $idPiso;";
		$resultado = mysqli_query($conexion, $sql);
		if($resultado)
		{
			echo "Piso editado correctamente";
		}
		else
		{
			die("Error al modificar piso: ". mysqli_error($conexion));
		}
	}

?>