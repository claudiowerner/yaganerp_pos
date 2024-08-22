<?php


	session_start();
	date_default_timezone_set('America/Santiago');
  
	if(isset($_SESSION['user'])){
      	$tipo = $_SESSION['user']['tipo_usuario'];
     	if($tipo == 1){
       	    //header('Location: ../');
     	}
     	    }else{
    	    header('Location: ../../../../index.php');
     	}
     	require_once '../../../../conexion.php';


	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
    $id_us = $_SESSION['user']['id'];
    $nombre = $_SESSION['user']["nombre"];
    $id_cl = $_SESSION['user']["id_cl"];
    

	$cod_barra = $_POST['cod_barra'];
    $nom = $_POST['nomProd'];
    $cat = $_POST['cat'];
    $can = $_POST['can'];
    $vn = $_POST['vn'];
    $vv = $_POST['vv'];
    $rp = $_POST['rp'];
    $marGan = $_POST['marGan'];
    $monGan = $_POST['monGan'];
    $proveedor = $_POST['proveedor'];
    $unidad = 1;

	if($rp=="S")
	{
		$unidad = $_POST['unidad'];
	}

    //obtener fecha
	$hoy = getdate();
	$fecha = $hoy['year']."-".$hoy['mon']."-".$hoy['mday'];
	$sql = 
	"INSERT INTO productos 
	VALUES 
	(null, 
	'$id_cl', 
	'$cod_barra', 
	'$nom', 
	'$proveedor', 
	'$cat', 
	'$can', 
	'$rp', 
	'$unidad', 
	'$vn', 
	'$marGan', 
	'$monGan', 
	'$vv', 
	0,
	'S', 
	'$id_us', 
	'$fecha');
	";
	$res = $conexion->query($sql);
	$json = array();

	if($res)
	{
		$json = array(
			"registro" => true,
			"titulo" => "Excelente",
			"mensaje" => "Producto creado correctamente",
			"icono" => "success"
		);
	}
	else
	{
		$json = array(
			"registro" => false,
			"titulo" => "Error",
			"mensaje" => "Ha ocurrido un error al registrar el producto: ".$conexion->error,
			"icono" => "error"
		);
	}
	
	echo json_encode($json);
?>