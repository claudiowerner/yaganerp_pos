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

    $id = $_GET['id'];
    $nom = $_GET['nomProd'];
    $cat = $_GET['cat'];
    $can = 0;
	if($_GET['can']!=0||$_GET['can']!=null||$_GET['can']!="")
	{
		$can = $_GET['can'];
	}
    $vn = $_GET['vn'];
    $ec = $_GET['ec'];
    $ea = $_GET['ea'];
    $ta = $_GET['ta'];
    $cc = $_GET['cc'];
    $cb = $_GET['cb'];
    $hora = $_GET['hora'];

    //obtener fecha
	$hoy = getdate();
	$fecha = $hoy['year']."-".$hoy['mon']."-".$hoy['mday'];
	$sql = "UPDATE productos set nombre_prod = '$nom',categoria = $cat, cantidad = $can, valor_neto = $vn, estado = '$ec', es_acompanamiento = '$ea', tiene_acompanamiento = '$ta', comanda_cocina= '$cc', comanda_bar = '$cb' where id_prod= $id";
	$resultado = mysqli_query($conexion, $sql);

	if($ec=='N')
	{
		//obtener fecha
		$hoy = getdate();
		$fecha = $hoy['year']."-".$hoy['mon']."-".$hoy['mday']." ".$hora;

		$sql = "INSERT INTO anula_productos (`id`, `id_cl`, `id_producto`, `anulado_por`, `fecha`) VALUES (null, '$id_cl', '$id', '$nombre', '$fecha');
";
		$resultado = mysqli_query($conexion, $sql);
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