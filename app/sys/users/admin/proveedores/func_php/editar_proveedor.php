<?php


	session_start();
	require_once '../../../../conexion.php';


	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
    $id_us = $_SESSION['user']['id'];
    $nombre = $_SESSION['user']["nombre"];
    $id_cl = $_SESSION['user']["id_cl"];
    

	//declaracion variables que provienen desde proveedores.js
	$rut = $_POST["rut"];
	$nombre = $_POST["nombre"];
	$hora = $_POST["hora"];
	$id = $_POST["id"];

	$json = array();

    $sql =
	"UPDATE proveedores 
	SET rut = '$rut',
	nombre_proveedor = '$nombre'
	WHERE id = '$id'";
	$res = $conexion->query($sql);

	if($res)
	{
		$json = array(
			"edicion" => true,
			"titulo" => "Excelente",
			"mensaje" => "Proveedor editado correctamente",
			"icono" => "success"
		);
	}
	else
	{
		$json = array(
			"edicion" => false,
			"titulo" => "Error",
			"mensaje" => "Ha ocurrido un error al editar el proveedor: ".$conexion->error,
			"icono" => "error"
		);
	}


	echo json_encode($json);
?>