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

    $nom = $_GET['nomUbic'];
    $piso = $_GET['piso'];
    $fecha = $_GET['fecha'];

	$sql = "INSERT INTO ubicaciones (`id`, `id_cl`, `nombre`, `piso`, `estado`, `creado_por`, `fecha_reg`) VALUES (null, '$id_cl', '$nom', '$piso', 'S', '$id_us', '$fecha');";
	$resultado = mysqli_query($conexion, $sql);

	if($resultado)
	{
		echo "Ubicación agregada correctamente";
	}
	else
	{
		die("Error al agregar ubicación: ". mysqli_error($conexion));
	}
?>