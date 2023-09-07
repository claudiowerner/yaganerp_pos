<?php

	session_start();
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);

	error_reporting(E_ALL);
    require_once '../../../../conexion.php';

	$id_cl = $_SESSION['user']["id_cl"];
    $idVenta = $_POST['id_venta'];
    $descto = $_POST['descto'];

	$sql = 
	"UPDATE ventas SET descto = '$descto' WHERE id_cl = $id_cl AND id_venta = '$idVenta'";
	$res = $conexion->query($sql);
	
	if($res)
	{
		echo "Se aplicó un $descto% de descuento del total de la venta.";
	}
	else
	{
		die("Error al aplicar descuento: ". mysqli_error($conexion));
	}

?>