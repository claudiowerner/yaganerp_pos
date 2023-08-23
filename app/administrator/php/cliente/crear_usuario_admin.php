<?php

	require_once '../../../conexion.php';


	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	$id = $_POST["id"];
	
	$sql = 
	"SELECT * FROM usuarios
	WHERE user = 'admin$id'
	AND pass = 'admin$id'";

	$res = $conexion->query($sql);
	if($res->num_rows == 0)
	{
		$sql = 
		"INSERT INTO usuarios VALUES 
		(null, 'Admin', 'admin$id', 'admin$id', '1', '$id', 'S', '1,2,3,4');";
		$resultado = mysqli_query($conexion, $sql);

		if($resultado)
		{
			echo "Admin creado correctamente";
		}
		else
		{
			die("Error al asignar usuario admin al cliente ID $id: ". mysqli_error($conexion));
		}
	}
	else
	{
		echo "Ya se creó el usuario principal/administrador para este cliente.";
	}

?>