<?php


	session_start();
	date_default_timezone_set('America/Santiago');
  
	if(isset($_SESSION['user'])){
      	$tipo = $_SESSION['user']['tipo_usuario'];
     	if($tipo == 1){
       	    //header('Location: ../');
     	}
    }else
    {
        header('Location: ../../../../index.php');
    }
    require_once '../../../../../../conexion.php';

	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
    $id_us = $_SESSION['user']['id'];
    $nombre = $_SESSION['user']["nombre"];
    $id_cl = $_SESSION['user']["id_cl"];

	$id_promo = $_POST["id_promo"];

	$json = array();
	$sql = 
    "SELECT * FROM promociones WHERE id = $id_promo";
	$res = $conexion->query($sql);
    
    while($row = $res->fetch_array())
	{
		$json = array(
			"nombre_promocion" => $row["nombre_promocion"],
			"id_prod" => $row["id_prod"],
			"unidades" => $row["unidades"],
			"precio" => $row["precio"],
		);
	}

	echo json_encode($json);
?>