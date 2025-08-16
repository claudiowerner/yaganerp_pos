<?php

  	session_start();
	

	if(isset($_SESSION['user']))
	{
		$tipo = $_SESSION['user']['tipo_usuario'];
		$id_us = $_SESSION['user']['id'];
		$nombre = $_SESSION['user']["nombre"];
		$id_cl = $_SESSION['user']["id_cl"];
		$rut = $_POST["rut"];

		require_once '../../../../../conexion.php';
		require_once '../../../../../php/mb_encoding.php';
		
		
		//Rellenar arrays
		$arrId = array();
		$arrFecha = array();
		$arrValor = array();
		$json = array();
		
		//set charset
		$conexion -> set_charset("utf8");
		//query

		$sql = "SELECT id_venta, DATE_FORMAT(fecha_registro, '%d-%m-%Y') AS fecha_registro
		FROM cuenta_corriente 
		WHERE rut = '$rut'
		AND id_cl = '$id_cl'
		AND estado = 'A'";
		$res = $conexion -> query($sql);

		while($row=$res->fetch_array())
		{
			$arrId[] = $row["id_venta"];
			$arrFecha[] = $row["fecha_registro"];
		}

		$cont = count($arrId);
		
		for($i=0; $i<$cont; $i++)
		{
			$id = $arrId[$i];
			$sql = 
			"SELECT SUM(valor*cantidad) AS valor 
			FROM ventas 
			WHERE id_cl = $id_cl 
			AND id_venta= $id 
			AND estado!='N'";
			$res = $conexion -> query($sql);
			while($row = $res->fetch_array())
			{
				$arrValor[] = $row["valor"];
			}
		}

		
		for($i=0; $i<$cont; $i++)
		{
			$json[] = array(
				"correlativo" => $arrId[$i],
				"fecha" => $arrFecha[$i],
				"valor" => $arrValor[$i]
			);
		}

		
	echo json_encode($json);
}
else
{
	header('Location: ../');
}
?>
