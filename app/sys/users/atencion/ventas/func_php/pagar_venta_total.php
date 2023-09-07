<?php

	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);

	error_reporting(E_ALL);

	session_start();
    require_once '../../../../conexion.php';

	$id_us = $_SESSION['user']['id'];
	$nombre = $_SESSION['user']["nombre"];
	$id_cl = $_SESSION['user']["id_cl"];
	
	
	$producto = $_POST['producto'];
	$fecha = $_POST['fecha'];
	$hora = $_POST['hora'];
	$forma_pago = $_POST['forma_pago'];
	$id_venta = $_POST['id_venta'];
	$valorTotal = $_POST["totalVenta"];
	$nCaja = $_POST["nCaja"];
	$nomCaja = $_POST["nomCaja"];
	$idCierre = $_POST["idCierre"];
	$descto = $_POST["descto"];

	
	$sql = 
	"SELECT sum(valor) AS valor
	FROM correlativo
	WHERE id_cierre = $idCierre";
	
	$totalCorr = 0;
	$resTotalCorr = $conexion->query($sql);
	if($resTotalCorr->num_rows!=0)
	{
		while($row = $resTotalCorr->fetch_array())
		{
			$totalCorr = $row["valor"];
		}
	}

	$total_caja = $totalCorr + $valorTotal;
	$sql = 
	"UPDATE cierre_caja cc
	SET valor_total = '$total_caja'
	WHERE cc.id_cl = '$id_cl'
	AND cc.id = '$idCierre';";
	$r3 = mysqli_query($conexion, $sql);

	
	$sql = 
	"UPDATE cuenta_corriente cc
	SET estado = 'C'
	WHERE cc.id_cl = '$id_cl'
	AND cc.id_venta = '$id_venta';";
	$r3 = mysqli_query($conexion, $sql);

	//generar nro boleta
	$sql = "SELECT (boleta+1) AS boleta FROM correlativo WHERE id_cl = '$id_cl'";
	$res = mysqli_query($conexion, $sql);

	$boleta = 0;
	while($row = $res->fetch_array())
	{
		$boleta = $row['boleta'];
	}
	//actualizar tabla correlativo
	$sql = 
	"UPDATE correlativo 
	SET valor = '$valorTotal',
	estado = 'C', 
	boleta = '$boleta', 
	fecha_cierre= '$fecha $hora',
	forma_pago = '$forma_pago'
	WHERE id = '$id_venta'";
	$r1 = mysqli_query($conexion, $sql);

	//actualizar tabla ventas
	$sql = 
	"UPDATE ventas 
	SET estado = 'C', 
	id_caja = $nCaja,
	nom_caja = '$nomCaja',
	fecha_pago='$fecha $hora',
	forma_pago = '$forma_pago'
	WHERE id_cl = '$id_cl'
	AND id_venta = '$id_venta'";
	$r2 = mysqli_query($conexion, $sql);

	//actualizar

	//declaracion variable resultado descuento BD (para ejecutar sentencia SQL)
	$r = '';
	//realizar descuentos en tabla productos
	for($i = 0;$i<count($producto); $i++)
	{
		$id = $producto[$i]["id_venta"];
		$valor = $producto[$i]["valor"];
		$valorDescto = $valor*$descto;
		$valorTotal = $valor - $valorDescto;

		$sql = 
		"UPDATE ventas SET valor = '$valorTotal' WHERE id = '$id' AND id_cl = '$id_cl'";
		$res = $conexion->query($sql);

		//acrónimo cp= Cantidad Pedido
		$np = $producto[$i]['nom_prod'];
		$cp_pedido = $producto[$i]['cant'];

		$sql = "SELECT (cantidad-$cp_pedido) AS cant 
		FROM productos WHERE nombre_prod = '$np'";
		$r4 = mysqli_query($conexion, $sql);

		//cantidad descuento del producto a la bd
		$cp_desc_bd = 0;
		while($row = $r4->fetch_array())
		{
			$cp_desc_bd = $row['cant'];
		}
		$sql = 
		"UPDATE productos 
		SET cantidad = '$cp_desc_bd' 
		WHERE nombre_prod = '$np';";
		$r5 = mysqli_query($conexion, $sql);
	}

	
	
	if($r1&&$r2&&$r4&&$r5)
	{
		echo "Pago registrado correctamente";
	}
	else
	{
		die("Error al registrar pago: ". mysqli_error($conexion));
	}
?>