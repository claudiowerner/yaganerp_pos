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

	$rut = $_POST["rut"];
	$nombre = $_POST["nombre"];
	$fecha = $_POST["fecha"];
    


    //obtener fecha
	$hoy = getdate();
	$fecha = $hoy['year']."-".$hoy['mon']."-".$hoy['mday'];
	$sql = 
	"INSERT INTO proveedores
	 VALUES (null, '$id_cl', '$nombre', '$rut', 'S', '$fecha');
	";
	$resultado = $conexion->query($sql);

	if($resultado)
	{
		echo "Proveedor agregado correctamente";
	}
	else
	{
		die("Error al agregar proveedor: ". mysqli_error($conexion));
	}
?>