<?php


	session_start();
	date_default_timezone_set('America/Santiago');ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	

	error_reporting(E_ALL);
	
	require_once '../../../../../../conexion.php';

	$id_us = $_SESSION['user']['id'];
	$nombre = $_SESSION['user']["nombre"];
	$id_cl = $_SESSION['user']["id_cl"];
	$id_temp = 0;


	//obtener ID de última temporada
	$sql = 
	"SELECT id FROM temporada 
	WHERE id_cl = ? 
	AND estado = 'S'";

	if($consulta = $mysqli -> prepare($sql))
	{
		$consulta -> bind_param("i", $id_cl);

		$consulta -> execute();

		$res = $consulta -> get_result();
		$res = $res -> fetch_assoc();

		$id_temp = $res["id"];
	}


	$hoy = getdate();
	$fecha = $hoy['year']."-".$hoy['mon']."-".$hoy['mday']." ".$hoy["hours"].":".$hoy["minutes"].":".$hoy["seconds"];
            

	$json = array();

	//insertar pedido
	$sql = 
	"INSERT INTO pedidos
	VALUES 
	(null, 
	'$id_cl', 
	'Pedido sin nombre',
	$id_temp,
	'1', 
	'A', 
	'A',
	'A',
	'$id_us', 
	'$fecha');";
	$res = $conexion->query($sql);

	$json = array("registro"=>$res);

	echo json_encode($json);


?>