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
		 require_once '../../../../conexion.php';


	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
    $id_us = $_SESSION['user']['id'];
    $nombre = $_SESSION['user']["nombre"];
    $id_cl = $_SESSION['user']["id_cl"];

    $id = $_POST['id'];

	$sql = "UPDATE categorias
	SET estado = 'N'
	WHERE id_cl = $id_cl
	AND id = $id";
	$res1 = $conexion->query($sql);

	/* ------------------------------------ REGISTRO EN TABLA ANULAR_USUARIO --------------------------- */
	//Fecha
	
	date_default_timezone_set('America/Santiago');

	$fecha_hora = date("Y-m-d")." ".date("H:i:s");
	$sql = "INSERT INTO anula_categoria VALUES 
	(null, '$id_cl', '$id', '$id_us', '$fecha_hora');";

	$res2 = $conexion->query($sql);

	$json = array();

	if($res1)
	{
		$json = array(
			"titulo" => "Excelente",
			"mensaje" => "Categoria eliminado correctamente",
			"icono" => "success"
		);
	}
	else
	{
		$json = array(
			"titulo" => "Error",
			"mensaje" => "Ha ocurrido un error al eliminar la categoría: ".$conexion->error,
			"icono" => "error"
		);
	}

	echo json_encode($json);
	
?>