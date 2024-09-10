<?php


	session_start();
	date_default_timezone_set('America/Santiago');if(isset($_SESSION['user'])){
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

	$rut = $_POST["rut"];


	$json = array();

    //obtener fecha
	$hoy = getdate();
	$sql = 
	"SELECT * FROM proveedores 
    WHERE id_cl = $id_cl 
    AND rut = '$rut' 
    AND estado = 'S'";
	$resultado = $conexion->query($sql);

	echo $resultado->num_rows;
?>