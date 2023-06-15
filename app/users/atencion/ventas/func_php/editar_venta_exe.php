<?php

	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);

	error_reporting(E_ALL);

	session_start();
	if(isset($_SESSION['user']))
	{
      	$tipo = $_SESSION['user']['tipo_usuario'];
     	if($tipo == 1){
       	    //header('Location: ../');	
		}
	}
	else
	{
		header('Location: ../../../../index.php');
	}
    require_once '../../../../conexion.php';

	$id_us = $_SESSION['user']['id'];
	$nombre = $_SESSION['user']["nombre"];
	$id_cl = $_SESSION['user']["id_cl"];
	$piso = 1;
	
	$idProd = $_GET['idProd'];
	$id = $_GET['id'];
	$cantProd = $_GET["cant"];

	//obtener valor precio del producto
	$valor = 0;
	echo $sql = "SELECT valor_venta FROM productos WHERE id_cl = '$id_cl' AND id_prod = '$idProd'";
	$resultado = mysqli_query($conexion, $sql);
	while ($row = $resultado->fetch_array())
	{
		$valor = intval($row['valor_venta'])*intval($cantProd);
		echo "Valor ".$valor." ";
	}

	//Calcular propina
	$propina = $valor*0.10;

	echo $sql = "UPDATE ventas SET cantidad = '$cantProd', valor=$valor, propina=$propina WHERE id = '$id';";
	$resultado = mysqli_query($conexion, $sql);

	if($resultado)
	{
		echo "Venta modificada correctamente";
	}
	else
	{
		die("Error al modificar venta: ". mysqli_error($conexion));
	}


?>