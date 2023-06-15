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

    $nom = utf8_decode($_GET['nomPiso']);
    $fecha = $_GET['fecha'];

	$sql = "INSERT INTO pisos VALUES (NULL, '$id_cl','$nom', '$id_us', 'S', '$fecha');";
	$resultado = mysqli_query($conexion, $sql);

	if($resultado)
	{
		echo "Piso agregado correctamente";
	}
	else
	{
		die("Error al agregar piso: ". mysqli_error($conexion));
	}
?>