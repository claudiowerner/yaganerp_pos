<?php

	session_start();

	if(isset($_SESSION['user']))
	{
		$tipo = $_SESSION['user']['tipo_usuario'];


		$id_us = $_SESSION['user']['id'];
		$nombre = $_SESSION['user']["nombre"];
		$id_cl = $_SESSION['user']["id_cl"];
		


		require_once '../../../conexion.php';
		
		
		$sql = 
		"SELECT * FROM cajas 
		WHERE id_cl = $id_cl
		AND estado!='N'";
		$resultado = $conexion->query($sql);

		if ($resultado->num_rows > 0)
		{
			while ($row = $resultado->fetch_array())
			{
				$json[] =array(
					"cajas_existentes" => true,
					'id' => $row['id'],
					'nombre' => $row['nom_caja'],
					'estado' => $row['estado']
				);
			}
		}
		else
		{
			$json = array(
				"cajas_existentes" => false
			);
		}
		echo json_encode($json);
	}

?>