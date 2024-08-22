<?php

	require_once '../../../conexion.php';

	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	date_default_timezone_set('America/Santiago');

	$nombre = $_POST["nombre"];
	$usuarios = $_POST["usuarios"];
	$cajas = $_POST["cajas"];
	$valor = $_POST["valor"];
	$sql = "INSERT INTO planes VALUES 
	(null,'$nombre', 'S', '$usuarios', '$cajas', '$valor');";
	$resultado = $conexion->query($sql);

	if($resultado)
	{
		echo "Plan agregado correctamente";
	}
	else
	{
		die("Error al agregar plan: ". mysqli_error($conexion));
	}
?>