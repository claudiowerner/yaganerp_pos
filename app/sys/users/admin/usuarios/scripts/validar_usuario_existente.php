<?php


	session_start();
		
		require_once '../../../../conexion.php';


	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
    $id_us = $_SESSION['user']['id'];
    $nombre = $_SESSION['user']["nombre"];
    $id_cl = $_SESSION['user']["id_cl"];
    

    $nombre = $_POST['nombre'];

	$json = array();
	

	$sql = 
	"SELECT * FROM usuarios
	WHERE user = '$nombre$id_cl'
	AND id_cl = $id_cl";
	$resultado = $conexion->query($sql);

	echo $resultado->num_rows;
?>