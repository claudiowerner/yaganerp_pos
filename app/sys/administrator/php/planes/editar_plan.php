<?php

	require_once '../../../conexion.php';
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

    //obtener fecha
	$hoy = getdate();
	$fecha = $hoy['year']."-".$hoy['mon']."-".$hoy['mday'];
	
	$id = $_POST["id"];
	$nombre = $_POST["nombre"];
	$usuarios = $_POST["usuarios"];
	$cajas = $_POST["cajas"];
	$valor = $_POST["valor"];
	$estado = $_POST["estado"];
	
	if($estado=="N")
	{
		$sql = 
		"SELECT p.estado FROM cliente c 
		JOIN planes p 
		ON p.id = c.plan_comprado
		WHERE p.id = $id
		AND p.estado = 'S'
		AND c.estado = 'S'";
		$res = $conexion->query($sql);;

		if($res->num_rows==0)
		{
			$sql = 
			"UPDATE planes SET 
			`nombre` = '$nombre', 
			`estado` = '$estado', 
			`usuarios` = '$usuarios', 
			`cajas` = '$cajas', 
			`valor` = '$valor' 
			WHERE (`id` = '$id');";
			$resultado = $conexion->query($sql);

			if($resultado)
			{
				echo "Plan modificado correctamente";
			}
			else
			{
				echo die("Error al modificar plan: ". mysqli_error($conexion));
			}
		}
		else
		{
			echo "No se puede desactivar el plan porque existen clientes activos que tienen este plan contratado.";
		}
	}
	else
	{
		$sql = 
		"UPDATE planes SET 
		`nombre` = '$nombre', 
		`estado` = '$estado', 
		`usuarios` = '$usuarios', 
		`cajas` = '$cajas', 
		`valor` = '$valor' 
		WHERE (`id` = '$id');";
		$resultado = $conexion->query($sql);

		if($resultado)
		{
			echo "Plan modificado correctamente";
		}
		else
		{
			echo die("Error al modificar plan: ". mysqli_error($conexion));
		}
	}
	

	
	
	

?>