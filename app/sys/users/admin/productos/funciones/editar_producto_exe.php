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
     	require_once '../../../../conexion.php';

	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
    $id_us = $_SESSION['user']['id'];
    $nombre = $_SESSION['user']["nombre"];
    $id_cl = $_SESSION['user']["id_cl"];
    

    $id = $_POST['id'];
    $nom = $_POST['nomProd'];
    $cat = $_POST['cat'];
	$can = $_POST['can'];
    $vn = $_POST['vn'];
    $vv = $_POST['vv'];
    $estado = $_POST['estado'];
    $codigo_barra = $_POST['codigo_barra'];
    $hora = $_POST['hora'];
	$medida = $_POST["medida"];
	$pesaje = $_POST["pesaje"];
	$monGan = $_POST["monGan"];
	$marGan = $_POST["marGan"];
	$proveedor = $_POST["proveedor"];
	$descuento = $_POST["descuento"];

    //obtener fecha
	$hoy = getdate();
	$fecha = $hoy['year']."-".$hoy['mon']."-".$hoy['mday'];
	$sql = "";
	
	
	$sql = 
		"UPDATE productos SET 
		codigo_barra = '$codigo_barra', 
		nombre_prod = '$nom',
		categoria = '$cat', 
		cantidad = '$can', 
		valor_neto = '$vn', 
		valor_venta = '$vv',
		pesaje = '$pesaje',
		margen_ganancia = '$marGan',
		monto_ganancia = '$monGan',
		proveedor = '$proveedor',
		descuento = '$descuento'
		WHERE id_prod = '$id'
		AND id_cl = $id_cl";
	$res = $conexion->query($sql);

	if($res)
	{
		$json = array(
			"edicion" => true,
			"titulo" => "Excelente",
			"mensaje" => "Producto editado correctamente",
			"icono" => "success"
		);
	}
	else
	{
		$json = array(
			"edicion" => false,
			"titulo" => "Error",
			"mensaje" => "Ha ocurrido un error al editar el producto: ".$conexion->error,
			"icono" => "error"
		);
	}
	
	echo json_encode($json);
?>