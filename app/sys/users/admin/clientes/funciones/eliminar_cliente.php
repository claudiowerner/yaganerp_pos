<?php


	session_start();
	date_default_timezone_set('America/Santiago');
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


    $rut = $_POST['rut'];
	/* OBTENER ID DEL CLIENTE SEGÚN RUT */
	$id = "";

	$sql = "SELECT id FROM clientes_negocio 
	WHERE id_cl = $id_cl 
	AND rut = '$rut' 
	AND estado = 'S'";
	$res = $conexion->query($sql);
	while($row = $res->fetch_array())
	{
		$id = $row["id"];
	}

	$sql = "UPDATE clientes_negocio 
	SET estado = 'N'
	WHERE id_cl = $id_cl
	AND rut = '$rut'";

	$res1 = $conexion->query($sql);

	$sql = "UPDATE cuenta_corriente
	SET estado = 'N'
	WHERE id_cl = $id_cl
	AND rut = '$rut'";

	$res2 = $conexion->query($sql);

		/* ------------------------------------ REGISTRO EN TABLA ANULAR_CLIENTE --------------------------- */
	//Fecha
	
	

	$fecha_hora = date("Y-m-d")." ".date("H:i:s");
	$sql = "INSERT INTO anula_clientes VALUES 
	(null, '$id_cl', '$id', '$id_us', '$fecha_hora');";

	$res2 = $conexion->query($sql);

	$json = array();

	if($res1&&$res2)
	{
		$json = array(
			"titulo" => "Excelente",
			"mensaje" => "Cliente eliminado correctamente",
			"icono" => "success"
		);
	}
	else
	{
		$json = array(
			"titulo" => "Error",
			"mensaje" => "Ha ocurrido un error al eliminar el cliente: ".$conexion->error,
			"icono" => "error"
		);
	}

	echo json_encode($json);
	
?>