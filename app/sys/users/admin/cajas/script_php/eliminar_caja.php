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

	$idCaja = $_POST["idCaja"];

	//eliminar caja
	$res = "";
	$sql = "UPDATE cajas SET estado = 'N' WHERE id = $idCaja;";
	$res = $conexion->query($sql);


	/* ------------------------------------ REGISTRO EN TABLA ANULAR_CAJA --------------------------- */
	//Fecha
	
	

	$fecha_hora = date("Y-m-d")." ".date("H:i:s");
	$sql = "INSERT INTO anula_cajas VALUES 
	(null, '$id_cl', '$idCaja', '$id_us', '$fecha_hora');";

	$res2 = $conexion->query($sql);



	$json = array();
	if($res&&$res2)
	{
		$json = array(
			"titulo" => "Excelente",
			"mensaje" => "Caja eliminada correctamente",
			"icono" => "success"
		);
	}
	else
	{
		$json = array(
			"titulo" => "Error",
			"mensaje" => "Ha ocurrido un error al eliminar la caja: ".$conexion->error,
			"icono" => "success"
		);
	}

	echo json_encode($json);

?>