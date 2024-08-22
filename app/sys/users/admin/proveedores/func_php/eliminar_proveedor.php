<?php


	session_start();
	date_default_timezone_set('America/Santiago');require_once '../../../../conexion.php';


	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
    $id_us = $_SESSION['user']['id'];
    $nombre = $_SESSION['user']["nombre"];
    $id_cl = $_SESSION['user']["id_cl"];

	$id = $_POST["id"];
	$hora = $_POST["hora"];

	$json = array();

	//eliminar proveedor
    $sql =
	"UPDATE proveedores 
	SET estado = 'N'
	WHERE id = '$id'";
	$res = $conexion->query($sql);

	/* ------------------------------------ REGISTRO EN TABLA ANULAR_CLIENTE --------------------------- */
	//Fecha
	
	

	$fecha_hora = date("Y-m-d")." ".date("H:i:s");
	$sql = "INSERT INTO anula_proveedor 
	VALUES (null, '$id_cl', '$id', '$id_us', '$fecha_hora')";
	$res2 = $conexion->query($sql);

	if($res&&$res2)
	{
		$json = array(
			"eliminar" => true,
			"titulo" => "Excelente",
			"mensaje" => "Proveedor eliminado correctamente",
			"icono" => "success"
		);
	}
	else
	{
		$json = array(
			"eliminar" => false,
			"titulo" => "Error",
			"mensaje" => "Ha ocurrido un error al eliminar el proveedor: ".$conexion->error,
			"icono" => "error"
		);
	}


	echo json_encode($json);
?>