<?php


	session_start();
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

	$sql = "UPDATE clientes_negocio 
	SET estado = 'N'
	WHERE id_cl = $id_cl
	AND rut = '$rut'";

	$res1 = $conexion->query($sql);

	$sql = "UPDATE cuenta_corriente
	SET estado = 'N'
	WHERE id_cl = $id_cl
	AND rut = '$rut'";

	$res2 = $conexion->query($sql);

	$json = array();

	if($res1&&$res2)
	{
		$json = array(
			"titulo" => "Excelente",
			"mensaje" => "Cliente eliminado correctamente",
			"icono" => "success"
		);
	}
	else
	{
		$json = array(
			"titulo" => "Error",
			"mensaje" => "Ha ocurrido un error al eliminar el cliente: ".$conexion->error,
			"icono" => "error"
		);
	}

	echo json_encode($json);
	
?>