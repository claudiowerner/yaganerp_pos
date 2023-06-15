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

    $nom = utf8_decode($_GET['nomProd']);
    $cat = $_GET['cat'];
    $can = $_GET['can'];
    $vn = $_GET['vn'];
    $ea = $_GET['ea'];
    $ta = $_GET['ta'];
    $cc = $_GET['cc'];
    $cb = $_GET['cb'];
    $vv = $_GET['vv'];

    //obtener fecha
	$hoy = getdate();
	$fecha = $hoy['year']."-".$hoy['mon']."-".$hoy['mday'];
	$sql = "INSERT INTO productos VALUES (null, '$id_cl', '$nom', '$cat', '$can', '$vn', '$vv', '$ea', '$ta', '$cc', '$cb', '$nombre', 'S', '$fecha');";
	$resultado = mysqli_query($conexion, $sql);

	if($resultado)
	{
		echo "Producto agregado correctamente";
	}
	else
	{
		die("Error al agregar categoría: ". mysqli_error($conexion));
	}
?>