<?php


	session_start();
	date_default_timezone_set('America/Santiago');
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);

	error_reporting(E_ALL);
	if(isset($_SESSION['user'])){
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
	    

			$nom = $_POST['nomCat'];
		    //obtener fecha
		    $hoy = getdate();
		    $fecha = $hoy['year']."-".$hoy['mon']."-".$hoy['mday'];
		    $sql = "INSERT INTO categorias VALUES (null,'$id_cl','$nom','S', '$id_us','$fecha')";
			$res = $conexion->query($sql);

			$json = array();

			if($res)
			{
				$json = array(
					"registro" => true,
					"titulo" => "Excelente",
					"mensaje" => "Categoría creada correctamente",
					"icono" => "success"
				);
			}
			else
			{
				$json = array(
					"registro" => false,
					"titulo" => "Error",
					"mensaje" => "Ha ocurrido un error al registrar la categoría: ".$conexion->error,
					"icono" => "error"
				);
			}
			
			echo json_encode($json);
		


?>