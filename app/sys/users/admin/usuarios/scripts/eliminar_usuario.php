<?php


	session_start();
	
	require_once '../../../../conexion.php';


	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
    $id_us = $_SESSION['user']['id'];
    $nombre = $_SESSION['user']["nombre"];
    $id_cl = $_SESSION['user']["id_cl"];
    

	/* -------------------------------------------- ELIMINACIÓN USUARIO -------------------------------- */
	$id = $_POST["id"];
	$sql = "UPDATE usuarios  
	SET estado = 'N'
	WHERE id_cl = $id_cl AND id = '$id';";
	$res1 = $conexion->query($sql);

	

	/* ------------------------------------ REGISTRO EN TABLA ANULAR_USUARIO --------------------------- */
	//Fecha
	
	date_default_timezone_set('America/Santiago');

	$fecha_hora = date("Y-m-d")." ".date("H:i:s");
	$sql = "INSERT INTO anula_usuario
	(`id`, `id_cl`, `id_usuario`, `anulado_por`, `fecha`) VALUES 
	(null, '$id_cl', '$id', '$id_us', '$fecha_hora');";

	$res2 = $conexion->query($sql);

	if($res1&&$res2)
	{
		$json = array(
			"eliminar" => true,
			"titulo" => "Excelente",
			"mensaje" => "Usuario eliminado correctamente",
			"icono" => "success"
		);
	}
	else
	{
		$json = array(
			"eliminar" => false,
			"titulo" => "Error",
			"mensaje" => "Ha ocurrido un error al eliminar el usuario: ".$conexion->error,
			"icono" => "error"
		);
	}	

	echo json_encode($json);
?>