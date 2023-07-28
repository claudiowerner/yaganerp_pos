<?php


	session_start();
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
	require_once '../../../conexion.php';


	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
    $id_us = $_SESSION['user']['id'];
    $nombre = $_SESSION['user']["nombre"];
    $id_cl = $_SESSION['user']["id_cl"];
    $piso = 1;

	//declaracion variables que provienen desde proveedores.js
	$rut = $_POST["rut"];
	$nombre = $_POST["nombre"];
	$estado = $_POST["estado"];
	$id = $_POST["id"];


    $sql =
	"UPDATE proveedores 
	SET rut = '$rut',
	nombre_proveedor = '$nombre',
	estado = '$estado'
	WHERE id = '$id'";
	$resultado = mysqli_query($conexion, $sql);

	if($estado=='N')
	{
		//obtener fecha
		$hoy = getdate();
		$fecha = $hoy['year']."-".$hoy['mon']."-".$hoy['mday']." ".$hora;

		$sql = 
		"INSERT INTO anula_proveedores 
		 VALUES (null, '$id_cl', '$id', '$nombre', '$fecha');";
		$resultado = mysqli_query($conexion, $sql);
	}
	if($resultado)
	{
		echo "Producto editado correctamente";
	}
	else
	{
		echo die("Error al modificar producto: ". mysqli_error($conexion));
	}
?>