<?php

	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);

	error_reporting(E_ALL);

	session_start();
	if(isset($_SESSION['user'])){
		$tipo = $_SESSION['user']['tipo_usuario'];
     	if($tipo == 1)
     	{
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

	$forma_pago = $_GET["forma_pago"];

	$array = $_GET['descProdInd'];

	$r0 = "";
	$r1 = "";
	$r2 = "";
	$r3 = "";

	for($i=0; $i<count($array); $i++)
	{
		$id_venta = $array[$i]['idVentaInd'];
		
		$fecha = $array[$i]['fecha'];
		$hora = $array[$i]['hora'];
		$np = $array[$i]["producto"];
		$valor = $array[$i]["valor"];
		$propina = $array[$i]["propina"];
		$correlativo = $array[$i]["correlativo"];
		$idVentaInd = $array[$i]["idVentaInd"];

		//actualizar valores propina y valor neto del turno relacionado a x venta
		$valorAct = 0;//captura el total de ventas generado en dinero dentro de un turno
		$propinaAct = 0;//captura el total de propina generado en dinero dentro de un turno
		
		$sql = "SELECT (valor_neto)+$valor AS valor, (propina)+$propina AS propina FROM cierre_caja WHERE id_cl = $id_cl AND id = ".$_GET["idCaja"];
		$res = mysqli_query($conexion, $sql);

		if($res->num_rows>0)
		{
			while($row = $res->fetch_array())
			{
				$valorAct = $row['valor'];
				$propinaAct = $row['propina'];
			}
		}
		else
		{
			$valorAct = $valor;
			$propinaAct = $propina;
		}
		$valor_total = $valorAct + $propinaAct;

		$sql = "UPDATE cierre_caja SET valor_neto = $valorAct, propina = $propinaAct, valor_total = '$valor_total' WHERE estado = 'A' AND id_cl = '$id_cl'";
		$r3 = mysqli_query($conexion, $sql);

		
		//generar nro boleta
		$sql = "SELECT (boleta+1) AS boleta FROM correlativo WHERE id_cl = '$id_cl'";
		$res = mysqli_query($conexion, $sql);

		$boleta = 0;
		while($row = $res->fetch_array())
		{
			$boleta = $row['boleta'];
		}


		//SELECCIONAR VALOR Y PROPINA DE LA TABLA VENTAS
		$sql = "SELECT valor+$valor AS valor, propina+$propina AS propina FROM correlativo WHERE id_cl = 1 AND id = $idVentaInd";
		$r0 = mysqli_query($conexion, $sql);

		$valorCorr = 0;
		$propinaCorr = 0;

		while($row = $r0->fetch_array())
		{
			$valorCorr = $row['valor'];
			$propinaCorr = $row['propina'];
		}
		
		//actualizar tabla correlativo
		$sql = "UPDATE correlativo SET valor = '$valorAct', propina = '$propinaAct' , estado = 'C', boleta = '$boleta', fecha_cierre= '$fecha $hora' WHERE correlativo ='$correlativo' ;";
		$r0 = mysqli_query($conexion, $sql);


		//actualizar tabla ventas
		$sql = "UPDATE ventas SET `estado` = 'C', fecha_pago = '$fecha $hora', forma_pago = '$forma_pago' WHERE id = $id_venta;
";
		$r1 = mysqli_query($conexion, $sql);

		//declaracion variable resultado descuento BD (para ejecutar sentencia SQL)
		$r = '';

		//realizar descuentos en tabla productos
		//acrónimo cp= Cantidad Pedido
		$cp_pedido = $array[$i]['cantidad'];
		$sql = "SELECT (cantidad-$cp_pedido) as cant FROM productos WHERE nombre_prod = '$np'";
		$r = mysqli_query($conexion, $sql);

		//cantidad descuento del producto a la bd
		$cp_desc_bd = 0;
		while($row = $r->fetch_array())
		{
			$cp_desc_bd = $row['cant'];
		}
		$sql = "UPDATE productos SET cantidad = '$cp_desc_bd' WHERE nombre_prod = '$np';";
		$r = mysqli_query($conexion, $sql);
		
	}
	if($r0&&$r1&&$r3&&$r)
	{
		echo "Pago registrado correctamente.\n";
	}
	else
	{
		die("Error al registrar pago venta". mysqli_error($conexion));
	}

?>