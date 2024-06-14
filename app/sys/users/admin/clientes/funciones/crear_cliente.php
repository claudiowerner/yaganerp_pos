<?php


	session_start();
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
	require_once '../../../../conexion.php';


	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
    $id_us = $_SESSION['user']['id'];
    $nombre = $_SESSION['user']["nombre"];
    $id_cl = $_SESSION['user']["id_cl"];

    $rut = $_POST['rut'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
	

    //obtener fecha
	$hoy = getdate();
	$fecha = $_POST["fecha"];
	$sql = 
	"INSERT INTO clientes_negocio 
	VALUES (null, '$id_cl', '$rut', '$nombre', '$apellido', 'S', '$id_us', '$fecha');
	";
	$resultado = mysqli_query($conexion, $sql);

	if($resultado)
	{
		echo "Cliente agregado correctamente";
	}
	else
	{
		die("Error al agregar categoría: ". mysqli_error($conexion));
	}
?>