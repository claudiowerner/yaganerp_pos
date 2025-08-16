<?php


	session_start();
	date_default_timezone_set('America/Santiago');
  
	if(isset($_SESSION['user']))
	{
		$tipo = $_SESSION['user']['tipo_usuario'];
     	if($tipo == 1)
		{
       	    //header('Location: ../');
     	}
    }
	else
    {
        header('Location: ../../../../index.php');
    }

	
    require_once '../../../../../../conexion.php';
    require_once '../../../../../../php/mb_encoding.php';

	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
    $id_us = $_SESSION['user']['id'];
    $nombre = $_SESSION['user']["nombre"];
    $id_cl = $_SESSION['user']["id_cl"];

	$json = array();
	$sql = 
    "SELECT id_prod, nombre_prod FROM productos 
    WHERE id_cl = $id_cl 
    AND estado!='N'";
	$res = $conexion->query($sql);
    
    while($row = $res->fetch_array())
	{
		$json[] = array(
			"id" => $row["id_prod"],
			"nombre_prod" => mb_encoding($row["nombre_prod"]),
		);
	}

	echo json_encode($json);
?>