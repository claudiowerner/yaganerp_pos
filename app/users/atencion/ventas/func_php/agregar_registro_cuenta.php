<?php

	session_start();
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);

	error_reporting(E_ALL);
    require_once '../../../../conexion.php';

	$tipo = $_SESSION['user']['tipo_usuario']; 
	$id_us = $_SESSION['user']['id'];
    $nombre = $_SESSION['user']["nombre"];
    $id_cl = $_SESSION['user']["id_cl"];
	
    $rut = $_POST["rut"];
    $corr = $_POST["corr"];
    $fecha = $_POST["fecha"];

	$sql = 
	"SELECT * FROM cuenta_corriente 
	WHERE id_cl = $id_cl
	AND correlativo = '$corr'";

	$res = $conexion->query($sql);
	if($res->num_rows>0)
	{
		echo "Esta cuenta ya se asignó a otro cliente";
	}
	else
	{
		$sql = 
		"SELECT * FROM cuenta_corriente
		WHERE id_cl = $id_cl
		AND rut = '$rut'
		AND correlativo = '$corr'";
		$res = $conexion->query($sql);
		
		if($res->num_rows>0)
		{
			echo "Ya se agregó esta venta a la cuenta del cliente $rut";
		}
		else
		{
			//descontar productos de la BD
			$arr_id_producto = array();
			$arr_cant_producto = array();
			$length = 0;

			//consulta para rellenar los arrays anteriores
			$sql = 
			"SELECT producto, cantidad 
			FROM ventas 
			WHERE id_venta = $corr";

			$res = $conexion->query($sql);
			if($res->num_rows>0)
			{
				$length = $res->num_rows;
				while($row=$res->fetch_array())
				{
					$arr_id_producto[] = $row["producto"];
					$arr_cant_producto[] = $row["cantidad"];
				}
			}

			$length = $res->num_rows;

			//hacer actualizaciones en la base de datos
			for($i=0;$i<$length; $i++)
			{
				$cantidad = $arr_cant_producto[$i];
				$id = $arr_id_producto[$i];
				echo $sql = 
				"UPDATE productos 
				SET cantidad = (cantidad-$cantidad)
				WHERE id_prod = $id";

				$res = $conexion->query($sql);
				if($res)
				{
					echo "sintaxis completada";
				}
				else
				{
					echo "error: ".mysqli_error($conexion);
				}
			}
			//inserción de cuenta
			$sql = 
			"INSERT INTO cuenta_corriente VALUES
			(null,
			'$id_cl', 
			'$rut',
			$corr,
			'A',
			'$fecha')";
			$resultado = mysqli_query($conexion, $sql);

			if($resultado)
			{
				echo "Venta añadida correctamente a la cuenta del cliente $rut.";
			}
			else
			{
				die("Error al agregar venta: ". mysqli_error($conexion));
			}
		}
	}
	

?>