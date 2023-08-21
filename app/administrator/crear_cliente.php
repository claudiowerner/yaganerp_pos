<?php

	require_once '../conexion.php';


	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
    $id_us = $_SESSION['user']['id'];
    $nombre = $_SESSION['user']["nombre"];

	$nombre = $_POST["nombre"];
	$rut = $_POST["rut"];
	$correo = $_POST["correo"];
	$telefono = $_POST["telefono"];
	$direccion = $_POST["direccion"];
	$plan = $_POST["plan"];
	$fechaPago = $_POST["fechaPago"];
	$nomFantasia = $_POST["nomFantasia"];
	$razonSocial = $_POST["razonSocial"];
	$sql = "INSERT INTO cliente VALUES 
	(null,'$nombre', '$rut', 'S', '$nomFantasia', '$razonSocial', '$direccion', '$correo','$telefono', '$plan', '$fechaPago');";
	$resultado = mysqli_query($conexion, $sql);

	if($resultado)
	{
		echo "Cliente agregado correctamente";
	}
	else
	{
		die("Error al agregar caja: ". mysqli_error($conexion));
	}
?>