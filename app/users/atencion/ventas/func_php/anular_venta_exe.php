<?php

	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);

	error_reporting(E_ALL);

	session_start();
	if(isset($_SESSION['user'])){
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

    $corr = $_GET['corr'];
    $hora = $_GET['hora'];
    $nMesa = $_GET['nMesa'];

    $hoy = getdate();
    $fecha = $hoy['year']."-".$hoy['mon']."-".$hoy['mday'];
	echo $sql = "UPDATE correlativo SET estado = 'N', fecha_cierre = '$fecha $hora' WHERE correlativo = '$corr';";
	$r1 = mysqli_query($conexion, $sql);

	echo $sql = "UPDATE ventas SET estado = 'N', fecha_pago = '$fecha $hora' WHERE id_venta = '$corr';";
	$r2 = mysqli_query($conexion, $sql);

	echo $sql = "INSERT INTO anula_ventas VALUES(null,$id_cl,$corr,'$nombre','$fecha $hora')";
	$r4 = mysqli_query($conexion, $sql);

	if($r1&&$r2&&$r4)
	{
		echo "Venta anulada correctamente";
	}
	else
	{
		die("Error al anular venta: ". mysqli_error($conexion));
	}
?>