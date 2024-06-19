<?php

	session_start();
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);

	error_reporting(E_ALL);
    require_once '../../../../../conexion.php';

	$tipo = $_SESSION['user']['tipo_usuario']; 
	$id_us = $_SESSION['user']['id'];
    $nombre = $_SESSION['user']["nombre"];
    $id_cl = $_SESSION['user']["id_cl"];
	
    $rut = $_POST["rut"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
	$fecha = $_POST["fecha"];
	

	$sql = 
	"SELECT rut FROM clientes_negocio
	WHERE id_cl = $id_cl
	AND rut = '$rut'";
	$res = $conexion->query($sql);;
	
	if($res->num_rows>0)
	{
		echo "El cliente $nombre $apellido RUT $rut ya se encuentra registrado";
	}
	else
	{
		$sql = 
		"INSERT INTO clientes_negocio 
		VALUES (null, '$id_cl', '$rut', '$nombre', '$apellido', 'S', '$id_us', '$fecha');";
		$resultado = $conexion->query($sql);;

		if($resultado)
		{
			echo "Cliente agregado correctamente";
		}
		else
		{
			die("Error al agregar categoría: ". mysqli_error($conexion));
		}
	}

?>