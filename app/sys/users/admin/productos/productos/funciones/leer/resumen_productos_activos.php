<?php


session_start();
error_reporting(E_ALL);
ini_set('display_errors', 'On');
if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){

    
    $json = array();
    $arrId = array();
    $arrNombre = array();
    $arrCantidad = array();


	if(isset($_SESSION['user'])){
		$tipo = $_SESSION['user']['tipo_usuario'];
		$id_us = $_SESSION['user']['id'];
		$cod_barra = $_SESSION['user']["nombre"];
		$id_cl = $_SESSION['user']["id_cl"];

		require_once '../../../../../../conexion.php';

		$sql = 
		"SELECT id, nombre_cat 
		FROM categorias 
		WHERE id_cl = ? 
		AND estado!='N'";

		if($res = $mysqli->prepare($sql))
		{
			$res->bind_param('i',$id_cl);
			$res -> execute();
			$res = $res->get_result();
			
			if($res -> num_rows>0)
			{
				while($row = $res->fetch_assoc())
				{
					$arrId[] = $row["id"];
					$arrNombre[] = $row["nombre_cat"];
				}
			}
		}

		$cont = count($arrId);

		for($i = 0; $i<$cont; $i++)
		{
			$id = $arrId[$i];

			$sql = 
			"SELECT COUNT(*) AS cantidad
			FROM productos 
			WHERE id_cl = ?
			AND categoria = ?";

			if($res = $mysqli->prepare($sql))
			{
				$res->bind_param('ii',$id_cl, $id);
				$res -> execute();
				$res = $res->get_result();
				
				if($res -> num_rows>0)
				{
					while($row = $res->fetch_assoc())
					{
						$arrCantidad[] = $row["cantidad"];
					}
				}
			}

		}

		for($i = 0; $i<$cont; $i++)
		{
			$json[] = array(
				"nombre" => $arrNombre[$i],
				"cantidad" => $arrCantidad[$i],
			);
		}
		echo json_encode($json);
		
	}
	else
	{
		header('Location: ../');
	}
}
?>
