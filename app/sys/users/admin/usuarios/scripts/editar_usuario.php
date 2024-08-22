<?php


	session_start();
	date_default_timezone_set('America/Santiago');
	require_once '../../../../conexion.php';


	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
    $id_us = $_SESSION['user']['id'];
    $nombre = $_SESSION['user']["nombre"];
    $id_cl = $_SESSION['user']["id_cl"];
    

	$id = $_POST["id"];
	$nombre = $_POST["nombre"];
	$user_n = $_POST["user_n"];//nombre de usuario nuevo
	$pass = "";

	$json = array();
	if($_POST["pass"]=="")
	{
		$pass = "";
	}
	else
	{
		$pass = password_hash($_POST["pass"], PASSWORD_DEFAULT);
	}
	$tipo_usuario = $_POST["tu"];//tipo de usuario
	$permisos = $_POST["permisos"];

	$sql = '';

	if($pass=="")
	{
		$sql = "UPDATE usuarios  SET nombre = '$nombre', user = '$user_n', tipo_usuario = '$tipo_usuario', permisos='$permisos' WHERE id_cl = $id_cl AND id = '$id';";
	}
	if($pass!="")
	{
		$sql = "UPDATE usuarios  SET nombre = '$nombre', user = '$user_n', pass = '$pass', tipo_usuario = '$tipo_usuario', permisos='$permisos' WHERE id_cl = $id_cl AND id = '$id';";
	}
	$resultado = $conexion->query($sql);


	if($resultado)
	{
		$json = array(
			"edicion" => true,
			"titulo" => "Excelente",
			"mensaje" => "Usuario editado correctamente",
			"icono" => "success"
		);
	}
	else
	{
		$json = array(
			"edicion" => false,
			"titulo" => "Error",
			"mensaje" => "Ha ocurrido un error al editar el usuario: ".$conexion->error,
			"icono" => "error"
		);
	}

	//codigo que elimina la clave provisoria en caso de existir
	$sql = 
	"DELETE FROM pass_provisoria WHERE id_cl = '$id_cl'";
	$conexion->query($sql);


	echo json_encode($json);
?>