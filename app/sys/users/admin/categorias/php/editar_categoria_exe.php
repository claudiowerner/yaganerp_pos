<?php

	session_start();
	date_default_timezone_set('America/Santiago');
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);

	error_reporting(E_ALL);
	if(isset($_SESSION['user']))
	{
     	require_once '../../../../conexion.php';
	    $id_us = $_SESSION['user']['id'];
	    $nombre = $_SESSION['user']["nombre"];
	    $id_cl = $_SESSION['user']["id_cl"];

		$nom = $_POST["nombre"];
		$id = $_POST["id"];
	    
		$sql = "UPDATE categorias set nombre_cat ='$nom'
		WHERE id = '$id' 
		AND id_cl = '$id_cl'";
		$res = $conexion->query($sql);

		$json = array();

		if($res)
		{
			$json = array(
				"edicion" => true,
				"titulo" => "Excelente",
				"mensaje" => "Categoría editada correctamente",
				"icono" => "success"
			);
		}
		else
		{
			$json = array(
				"edicion" => false,
				"titulo" => "Error",
				"mensaje" => "Ha ocurrido un error al editar la categoría: ".$conexion->error,
				"icono" => "error"
			);
		}
		echo json_encode($json);
	}


?>