<?php 
ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);

	error_reporting(E_ALL);

	session_start();
	date_default_timezone_set('America/Santiago');if(isset($_SESSION['user'])){
		$tipo = $_SESSION['user']['tipo_usuario'];
     	if($tipo == 1)
     	{
       	    //header('Location: ../');
     	}
    }
    else
    {
    	header('Location: ../../../../index.php');
    }
    require_once '../../../../../conexion.php';

	$id_us = $_SESSION['user']['id'];
	$nombre = $_SESSION['user']["nombre"];
	$id_cl = $_SESSION['user']["id_cl"];
	
	$id_venta = $_GET['id_venta'];

	$sql = "SELECT COUNT(id) AS ventas_cerradas FROM ventas WHERE id_cl = '$id_cl' AND id_venta = $id_venta AND estado = 'A'";
	$res = $conexion->query($sql);
	

	while($row = $res->fetch_array())
	{
		echo $row["ventas_cerradas"];
	}

	
?>