<?php


	session_start();
	date_default_timezone_set('America/Santiago');
  
	if(isset($_SESSION['user']))
	{
		$tipo = $_SESSION['user']['tipo_usuario'];
     	if($tipo == 1)
		{
       	    //header('Location: ../');
     	}
    }
	else
    {
        header('Location: ../../../../index.php');
    }
    require_once '../../../../../../conexion.php';
    require_once '../../../../../../php/mb_encoding.php';

	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
    $id_us = $_SESSION['user']['id'];
    $nombre = $_SESSION['user']["nombre"];
    $id_cl = $_SESSION['user']["id_cl"];

	$json = array();

	//setear charset
	$conexion -> set_charset("utf8");
	//Query
	$sql = "SELECT pr.id, pr.nombre_promocion, pr.unidades, prod.id_prod, prod.nombre_prod, pr.precio, us.nombre, 
	DATE_FORMAT(pr.fecha_registro, '%d-%m-%Y') AS fecha_registro
	FROM promociones pr
	JOIN productos prod
	ON prod.id_prod = pr.id_prod
	JOIN usuarios us 
	ON us.id = pr.creado_por
	WHERE pr.id_cl = $id_cl
	AND pr.estado!='N'";
	$res = $conexion->query($sql);
	$cont = 0;

	while($row = $res->fetch_array())
	{
		$cont++;
		$json[] = array(
			"id" => $cont,
			"id_promo" => $row["id"],
			"nombre_promocion" => mb_encoding($row["nombre_promocion"]),
			"unidades" => $row["unidades"],
			"nombre_prod" => mb_encoding($row["nombre_prod"]),
			"precio" => $row["precio"],
			"nombre" => $row["nombre"],
			"fecha_registro" => $row["fecha_registro"],
		);
	}

	echo json_encode($json);
?>