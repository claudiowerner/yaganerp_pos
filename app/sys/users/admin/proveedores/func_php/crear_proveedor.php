<?php


	session_start();


	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
    $id_us = $_SESSION['user']['id'];
    $nombre = $_SESSION['user']["nombre"];
    $id_cl = $_SESSION['user']["id_cl"];

	$rut = $_POST["rut"];
	$nombre = $_POST["nombre"];
	$fecha = $_POST["fecha"];


	$json = array();

    //obtener fecha
	$hoy = getdate();
	$fecha = $hoy['year']."-".$hoy['mon']."-".$hoy['mday'];
	$sql = 
	"INSERT INTO proveedores
	 VALUES (null, '$id_cl', '$nombre', '$rut', 'S', '$fecha');
	";
	$resultado = $conexion->query($sql);

	if($resultado)
	{
		$json = array(
			"registro" => true,
			"titulo" => "Excelente",
			"mensaje" => "Proveedor creado correctamente.",
			"icono" => "success"
		);
	}
	else
	{
		$json = array(
			"registro" => false,
			"titulo" => "Error",
			"mensaje" => "Ocurrió un error al registrar el proveedor: ". $conexion->error,
			"icono" => "error"
		);
	}

	echo json_encode($json);
?>