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

    $rut = $_POST['rut'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $id = $_POST['id'];

	$sql = "UPDATE clientes_negocio 
	SET rut = '$rut',
	nombre = '$nombre',
	apellido = '$apellido'
	WHERE id = $id
	AND id_cl = $id_cl";

	$res = $conexion->query($sql);

	$json = array();

	if($res)
	{
		$json = array(
			"edicion" => true,
			"titulo" => "Excelente",
			"mensaje" => "Cliente editado correctamente",
			"icono" => "success"
		);
	}
	else
	{
		$json = array(
			"edicion" => false,
			"titulo" => "Error",
			"mensaje" => "Ha ocurrido un error al editar el cliente: ".$conexion->error,
			"icono" => "error"
		);
	}

	echo json_encode($json);
	
?>