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
     	require_once '../../../conexion.php';


	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
    $id_us = $_SESSION['user']['id'];
    $nombre = $_SESSION['user']["nombre"];
    $id_cl = $_SESSION['user']["id_cl"];
    $piso = 1;

    $nombre = $_POST['nombre'];
	$user = $_POST['user'];
	$pass= $_POST['pass'];
	$tu = $_POST['tu']; //tipo usuario
	$permisos = $_POST["permisos"];
	

	$sql = "SELECT nombre FROM usuarios WHERE id_cl = '$id_cl' AND user = '$user' ";
	$resultado = mysqli_query($conexion, $sql);

	if($resultado->num_rows>0)
	{
		echo "0";
	}
	else
	{
		$sql = "INSERT INTO usuarios VALUES (null, '$nombre', '$user', '$pass', '$tu', '$id_cl', 'S','$permisos')";
		$resultado = mysqli_query($conexion, $sql);

		if($resultado)
		{
			echo "1";
		}
		else
		{
			die("Error al agregar usuario: ". mysqli_error($conexion));
		}
	}
?>