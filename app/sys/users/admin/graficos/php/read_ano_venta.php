

<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 'On');

if(isset($_SESSION['user']))
{
	$tipo = $_SESSION['user']['tipo_usuario'];
	if($tipo == 1)
	{
		$id_us = $_SESSION['user']['id'];
		$nombre = $_SESSION['user']["nombre"];
		$id_cl = $_SESSION['user']["id_cl"];
		

		require_once '../../../../conexion.php';
		require_once '../../../../php/registro_errores/registro_db/registro_db.php';

		$datos = array();//acá se guardan los datos emanados desde la base de datos
		$sql = "";

		try
		{
			$sql = "SELECT year(fecha) as ano FROM correlativo WHERE id_cl = $id_cl GROUP BY year(fecha)";
			$res = $conexion->query($sql);
			
			if($res->num_rows!=0)
			{
				while($row=$res->fetch_array())
				{
					$datos[] = array(
						"ano"=>$row["ano"]
					);
				}
			}
			else
			{
				$datos = array(
					"ano"=>"SIN VENTAS"
				);
			}
			echo json_encode($datos);
		}
		catch(Exception $e)
		{
			$datos = array(
				"error" => 2,
				"id_cl" => $id_cl,
				"query" => $sql,
				"ubic_script" => "sys/users/admin/graficos/php/read_ano_venta.php",
				"mensaje" => $e -> getMessage()
			);

			registrar_errores($datos, $conexion);
		}

		
	}
	
}
else
{
	header('Location: ../');
}
?>
