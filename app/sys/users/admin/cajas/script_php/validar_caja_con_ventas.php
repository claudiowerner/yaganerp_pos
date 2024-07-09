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

	$idCaja = $_POST["idCaja"];

	//Actualizar nombre
	$res = "";
	$sql = 
	"SELECT * FROM cajas 
	WHERE id_cl = $id_cl 
	AND id = $idCaja 
	AND estado = 'A'";
	$res = $conexion->query($sql);

	echo $res->num_rows;

?>