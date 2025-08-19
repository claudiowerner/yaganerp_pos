

<?php
	session_start();
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);

	error_reporting(E_ALL);

    require_once '../../../../../conexion.php';

	$id_us = $_SESSION['user']['id'];
	$nombre = $_SESSION['user']["nombre"];
	$id_cl = $_SESSION['user']["id_cl"];

	$json = array();

	$sql = 
    "SELECT id 
    FROM ventas 
    WHERE id_cl = $id_cl 
    AND estado = 'A' 
    AND fecha = (SELECT MAX(fecha) FROM ventas)";
	$resultado = $conexion->query($sql);
	while ($row = $resultado->fetch_array())
	{
		echo $row['id'];
	}


?>