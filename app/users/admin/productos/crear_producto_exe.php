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

	$cod_barra = $_GET['cod_barra'];
    $nom = $_GET['nomProd'];
    $cat = $_GET['cat'];
    $can = $_GET['can'];
    $vn = $_GET['vn'];
    $vv = $_GET['vv'];

    //obtener fecha
	$hoy = getdate();
	$fecha = $hoy['year']."-".$hoy['mon']."-".$hoy['mday'];
	$sql = 
	"INSERT INTO productos 
	VALUES (null, '$id_cl', '$cod_barra', '$nom', '$cat', '$can', '$vn', '$vv', 'S', '$id_us', '$fecha');
	";
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