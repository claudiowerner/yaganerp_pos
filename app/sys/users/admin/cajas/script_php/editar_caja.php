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

    $nom = $_POST["nomCaja"];
	$idCaja = $_POST["idCaja"];

	//Actualizar nombre
	$res = "";
	$sql = "UPDATE Cajas SET nom_caja = '$nom' WHERE id = $idCaja;";
	$res = $conexion->query($sql);

	$json = array();
	if($res)
	{
		$json = array(
			"titulo" => "Excelente",
			"mensaje" => "Caja editada correctamente",
			"icono" => "success"
		);
	}
	else
	{
		$json = array(
			"titulo" => "Error",
			"mensaje" => "Ha ocurrido un error al editar la caja: ".$conexion->error,
			"icono" => "success"
		);
	}

	echo json_encode($json);

?>