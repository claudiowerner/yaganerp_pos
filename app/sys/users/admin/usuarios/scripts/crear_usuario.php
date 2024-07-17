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
    

    $nombre = $_POST['nombre'];
	$user = $_POST['user'];
	$pass = password_hash($_POST["pass"], PASSWORD_DEFAULT);
	$tu = $_POST['tu']; //tipo usuario
	$permisos = $_POST["permisos"];

	
	$sql = "INSERT INTO usuarios VALUES (null, '$nombre', '$user$id_cl', '$pass', '$tu', '$id_cl', 'S','$permisos')";
	$resultado = $conexion->query($sql);

	$json = array();
	if($resultado)
	{
		$json = array(
			"registro" => true,
			"titulo" => "Excelente",
			"mensaje" => "Usuario '$nombre' creado correctamente.",
			"icono" => "success"
		);
	}
	else
	{
		$json = array(
			"registro" => false,
			"titulo" => "Error",
			"mensaje" => "Ocurrió un error al registrar el usuario '$nombre':". $conexion->error,
			"icono" => "error"
		);
	}

	echo json_encode($json);
?>