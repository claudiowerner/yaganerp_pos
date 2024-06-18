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
    $piso = 1;

    $id = $_GET['id'];
    $nom = $_GET['nomProd'];
    $cat = $_GET['cat'];
    $can = 0;
	if($_GET['can']!=0||$_GET['can']!=null||$_GET['can']!="")
	{
		$can = $_GET['can'];
	}
    $vn = $_GET['vn'];
    $vv = $_GET['vv'];
    $estado = $_GET['estado'];
    $codigo_barra = $_GET['codigo_barra'];
    $hora = $_GET['hora'];
	$medida = $_GET["medida"];
	$pesaje = $_GET["pesaje"];

    //obtener fecha
	$hoy = getdate();
	$fecha = $hoy['year']."-".$hoy['mon']."-".$hoy['mday'];
	$sql = "";
	if($pesaje === "N")
	{
		$sql = 
		"UPDATE productos SET 
		codigo_barra = '$codigo_barra', 
		nombre_prod = '$nom',
		categoria = '$cat', 
		cantidad = '$can', 
		valor_neto = '$vn', 
		valor_venta = '$vv',
		pesaje = '$pesaje',
		estado = '$estado'
		WHERE id_prod = '$id';
		";
	}
	else
	{
		$sql = 
		"UPDATE productos SET 
		codigo_barra = '$codigo_barra', 
		nombre_prod = '$nom',
		categoria = '$cat', 
		cantidad = '$can', 
		valor_neto = '$vn', 
		valor_venta = '$vv',
		pesaje = '$pesaje',
		unidad_medida = '$medida',
		estado = '$estado'
		WHERE id_prod = '$id';
		";
	}
	echo $sql;
	$resultado = $conexion->query($sql);

	if($estado=='N')
	{
		//obtener fecha
		$hoy = getdate();
		$fecha = $hoy['year']."-".$hoy['mon']."-".$hoy['mday']." ".$hora;

		$sql = "INSERT INTO anula_productos (`id`, `id_cl`, `id_producto`, `anulado_por`, `fecha`) VALUES (null, '$id_cl', '$id', '$nombre', '$fecha');
";
		$resultado = $conexion->query($sql);
	}
	if($resultado)
	{
		echo "Producto editado correctamente";
	}
	else
	{
		die("Error al modificar producto: ". mysqli_error($conexion));
	}
?>