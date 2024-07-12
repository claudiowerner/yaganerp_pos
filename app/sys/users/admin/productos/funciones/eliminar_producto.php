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
    

    $id = $_POST['id'];
    $fecha = $_POST['fecha'];
    
	
	/* -------------------------------- ACTUALIZACIÓN TABLA PRODUCTOS --------------------------------- */
	$sql = 
		"UPDATE productos 
		SET estado = 'N'
		WHERE id_prod = '$id'
		AND id_cl = $id_cl";
	$res1 = $conexion->query($sql);
	/* -------------------------------- ACTUALIZACIÓN TABLA PRODUCTOS --------------------------------- */
	$sql = 
	"INSERT INTO anula_productos  VALUES (null, '$id_cl', '$id', '$id_us', '$fecha');";
	$res1 = $conexion->query($sql);

	if($res1)
	{
		$json = array(
			"eliminar" => true,
			"titulo" => "Excelente",
			"mensaje" => "Producto eliminado correctamente",
			"icono" => "success"
		);
	}
	else
	{
		$json = array(
			"eliminar" => false,
			"titulo" => "Error",
			"mensaje" => "Ha ocurrido un error al eliminar el producto: ".$conexion->error,
			"icono" => "error"
		);
	}
	
	echo json_encode($json);
?>