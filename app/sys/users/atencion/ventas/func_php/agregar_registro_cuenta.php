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
    $valor = $_POST["valor"];
	
	//seleccionar las ventas que no han sido anuladas
	$arrayIdVenta = Array();

	$sql = 
	"SELECT id FROM ventas
	WHERE id_venta = $corr
	AND estado = 'A'";
	$res = $conexion->query($sql);
	
	while($row=$res->fetch_array())
	{
		$arrayIdVenta[] = $row["id"];
	}

	print_r($arrayIdVenta);

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
			//Setear ventas como Por Pagar
			for($i=0; $i<count($arrayIdVenta);$i++)
			{
				$venta = $arrayIdVenta[$i];
				echo $sql = 
				"UPDATE ventas 
				SET estado = 'P'
				WHERE id = $venta 
				AND id_cl = $id_cl";

				$res = $conexion->query($sql);
			}

			//Setear valor de cuenta por pagar
			$sql = 
			"UPDATE correlativo 
			SET estado = 'P',
			valor = '$valor'
			WHERE correlativo = $corr
			AND id_cl = $id_cl";

			$res = $conexion->query($sql);
		
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
				$sql = 
				"UPDATE productos 
				SET cantidad = (cantidad-$cantidad)
				WHERE id_prod = $id";

				$res = $conexion->query($sql);
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