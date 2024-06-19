<?php

	session_start();
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);

	error_reporting(E_ALL);
    require_once '../../../../../conexion.php';

	$tipo = $_SESSION['user']['tipo_usuario']; 
	$id_us = $_SESSION['user']['id'];
    $nombre = $_SESSION['user']["nombre"];
    $id_cl = $_SESSION['user']["id_cl"];
	
    $caja = $_POST['caja'];
    $id_cierre = $_POST['turno'];
    $monto = $_POST['monto'];
	$monto_BD = 0;

	/*-------------------comprobar si el monto a disminuir es mayor al monto en caja----------------------*/
	$sql = 
	"SELECT SUM(monto) AS valor 
	FROM monto_caja 
	WHERE id_cl = $id_cl 
	AND id_cierre = $id_cierre 
	AND id_caja = $caja";
	$res = $conexion->query($sql);;

	while($row = $res->fetch_array())
	{
		$monto_BD = $row["valor"];
	}

	//comprobar si el número ingresado es negativo
	if($monto<0)
	{
		$conversion = $monto*-1;//se convierte el valor negativo por positivo
		if($conversion>$monto_BD)
		{
			echo "El monto ingresado para disminuir es mayor al existente en caja.";
		}
		else
		{
			insertar($id_cl, $caja, $id_cierre, $monto, $conexion);
		}
	}
	else
	{
		insertar($id_cl, $caja, $id_cierre, $monto, $conexion);
	}

	function insertar($id_cl, $caja, $id_cierre, $monto, $conexion)
	{
		$sql = 
		"INSERT INTO monto_caja VALUES(
			null,
			$id_cl,
			$caja,
			$id_cierre,
			3,
			$monto
		)";
		$res = $conexion->query($sql);;
		if($res)
		{
			echo "Movimiento de caja agregado correctamente";
		}
		else
		{
			echo "Ha ocurrido un error: ".$conexion->error;
		}
	}

?>