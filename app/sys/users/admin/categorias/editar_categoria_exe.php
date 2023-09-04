<?php

	session_start();
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);

	error_reporting(E_ALL);
	if(isset($_SESSION['user']))
	{
     	require_once '../../../conexion.php';

	    $id_us = $_SESSION['user']['id'];
	    $nombre = $_SESSION['user']["nombre"];
	    $id_cl = $_SESSION['user']["id_cl"];
	    $piso = 1;

		if(isset($_POST['nomCat'])&&isset($_POST['estadoCat'])&&isset($_POST['id']))
		{
			$nom = $_POST['nomCat'];
			$estado = $_POST['estadoCat'];

			$id = $_POST['id'];
			$hora = $_POST['hora'];

			$r_estado = '';

			$hoy = getdate();
			$fecha = $hoy['year']."-".$hoy['mon']."-".$hoy['mday']." ".$hora;
	
			if($estado=='N')
			{
				$sql = "SELECT * FROM categorias c JOIN productos p ON c.id = p.categoria WHERE c.id = $id AND p.estado = 'S'";
				$r_estado = mysqli_query($conexion, $sql);
				if($r_estado->num_rows>0)
				{
					echo "No se puede desactivar la categoría $nom debido a que existen productos activos asociados a esta categoría";
				}
				else
				{
					//obtener fecha
					$sql = "INSERT INTO anula_categoria VALUES (null, '$id_cl', '$id', '$nombre', '$fecha');";
					$r_estado = mysqli_query($conexion, $sql);

					$sql = "UPDATE categorias set nombre_cat ='$nom', estado = '$estado' where id = '$id' and id_cl = '$id_cl'";
					$resultado = mysqli_query($conexion, $sql);

					if($resultado||$r_estado)
					{
						echo "Categoría modificada correctamente";
					}
					else
					{
						die("Error al agregar categoría: ". mysqli_error($conexion));
					}
				}
			}
			else
			{
				$sql = "INSERT INTO anula_categoria VALUES (null, '$id_cl', '$id', '$nombre', '$fecha');";
				$r_estado = mysqli_query($conexion, $sql);

				$sql = "UPDATE categorias set nombre_cat ='$nom', estado = '$estado' where id = '$id' and id_cl = '$id_cl'";
				$resultado = mysqli_query($conexion, $sql);

				if($resultado||$r_estado)
				{
					echo "Categoría modificada correctamente";
				}
				else
				{
					die("Error al agregar categoría: ". mysqli_error($conexion));
				}
			}
		}
		else
		{
			echo "Error al recibir nombre y estado de categoría";
		}
	}


?>