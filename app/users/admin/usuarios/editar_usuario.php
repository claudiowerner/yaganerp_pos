<?php


	session_start();
	if(isset($_SESSION['user'])){
      	$tipo = $_SESSION['user']['tipo_usuario'];
     	if($tipo == 1){
       	    //header('Location: ../');
     	}
     	    }else{
    	    header('Location: ../../../../index.php');
     	}
     	require_once '../../../conexion.php';


	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
    $id_us = $_SESSION['user']['id'];
    $nombre = $_SESSION['user']["nombre"];
    $id_cl = $_SESSION['user']["id_cl"];
    $piso = 1;

	$nombre = $_POST["nombre"];
	$user = $_POST["user"];//nombre de usuario antiguo
	$user_n = $_POST["user_n"];//nombre de usuario nuevo
	$pass = password_hash($_POST["pass"], PASSWORD_DEFAULT);
	$tipo_usuario = $_POST["tu"];//tipo de usuario
	$estado = $_POST["estado"]; 
	$permisos = $_POST["permisos"];

	$tu = 0;//Conversión del tipo de usuario a número

	if($tipo_usuario == "ADMINISTRADOR")
	{
		$tu = 1;
	}
	if($tipo_usuario == "CAJERO")
	{
		$tu = 2;
	}
	if($tipo_usuario == "GARZÓN")
	{
		$tu = 3;
	}

	$sql = '';

	if($pass=="")
	{
		$sql = "UPDATE usuarios  SET nombre = '$nombre', user = '$user_n', tipo_usuario = '$tu', estado = '$estado', permisos='$permisos' WHERE id_cl = $id_cl AND user = '$user';";
	}
	if($pass!="")
	{
		$sql = "UPDATE usuarios  SET nombre = '$nombre', user = '$user_n', pass = '$pass', tipo_usuario = '$tu', estado = '$estado', permisos='$permisos' WHERE id_cl = $id_cl AND user = '$user';";
	}
	$resultado = mysqli_query($conexion, $sql);

	if($resultado)
	{
		echo "Usuario editado correctamente";
	}
	else
	{
		die("Error al modificar usuario: ". mysqli_error($conexion));
	}
?>