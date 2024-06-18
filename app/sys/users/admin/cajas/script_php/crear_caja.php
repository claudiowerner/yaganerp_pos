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
    $piso = 1;

    $nom = $_GET['nomCaja'];
    $fecha = $_GET['fecha'];

	$sql = "INSERT INTO cajas VALUES 
	(NULL, '$id_cl','$nom', 'S', '$id_us', '$fecha');";
	$resultado = $conexion->query($sql);

	if($resultado)
	{
		echo "Caja agregada correctamente";
	}
	else
	{
		die("Error al agregar caja: ". mysqli_error($conexion));
	}
?>