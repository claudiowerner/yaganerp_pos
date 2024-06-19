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
     	require_once '../../../../../conexion.php';

	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
    $id_us = $_SESSION['user']['id'];
    $nombre = $_SESSION['user']["nombre"];
    $id_cl = $_SESSION['user']["id_cl"];
    $piso = 1;

    $id = $_POST['id'];
    $nom = $_POST['nomProd'];
    $cat = $_POST['cat'];
    $can = 0;
	if($_POST['can']!=0||$_POST['can']!=null||$_POST['can']!="")
	{
		$can = $_POST['can'];
	}
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
		estado = '$estado',
		margen_ganancia = '$marGan',
		monto_ganancia = '$monGan',
		proveedor = '$proveedor',
		descuento = '$descuento'
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
		estado = '$estado',
		margen_ganancia = '$marGan',
		monto_ganancia = '$monGan',
		proveedor = '$proveedor'
		WHERE id_prod = '$id';
		";
	}
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
		echo die("Error al modificar producto: ". mysqli_error($conexion));
	}
?>