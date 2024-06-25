<?php

	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);

	error_reporting(E_ALL);

	session_start();
    require_once '../../../../../conexion.php';

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
	$idCierre = $_POST["idCierre"];
	$descto = $_POST["descto"];
	$valorCierreCaja = 0;


	$sql = 
	"SELECT SUM(v.valor) AS valor 
    FROM ventas v 
    JOIN correlativo c 
    ON c.correlativo = v.id_venta
    AND v.id_cl = $id_cl 
    AND c.id_cierre = $idCierre
	AND v.id_venta = $id_venta
	AND v.estado !='N'";

	$res = $conexion->query($sql);;
	while($row=$res->fetch_array())
	{
		$valorCierreCaja = $row["valor"];
	}

	

	$sql = 
	"UPDATE cierre_caja cc
	SET valor_total = '$valorCierreCaja'
	WHERE cc.id_cl = '$id_cl'
	AND cc.id = '$idCierre';";
	$r3 = $conexion->query($sql);;

	
	$sql = 
	"UPDATE cuenta_corriente cc
	SET estado = 'C'
	WHERE cc.id_cl = '$id_cl'
	AND cc.id_venta = '$id_venta';";
	$r3 = $conexion->query($sql);;

	//generar nro boleta
	$sql = "SELECT (boleta+1) AS boleta FROM correlativo WHERE id_cl = '$id_cl'";
	$res = $conexion->query($sql);;

	$boleta = 0;
	while($row = $res->fetch_array())
	{
		$boleta = $row['boleta'];
	}
	//actualizar tabla correlativo
	$sql = 
	"UPDATE correlativo 
	SET estado = 'C', 
	boleta = '$boleta', 
	fecha_cierre= '$fecha $hora',
	forma_pago = '$forma_pago',
	id_cierre = '$idCierre'
	WHERE id = '$id_venta'";
	$r1 = $conexion->query($sql);;

	//actualizar tabla ventas
	$sql = 
	"UPDATE ventas 
	SET estado = 'C', 
	id_caja = $nCaja,
	fecha_pago = '$fecha $hora',
	forma_pago = '$forma_pago'
	WHERE id_cl = '$id_cl'
	AND id_venta = '$id_venta'
	AND estado!='N'";
	$r2 = $conexion->query($sql);;

	//actualizar

	//declaracion variable resultado descuento BD (para ejecutar sentencia SQL)
	$r = '';
	//realizar descuentos en tabla productos
	$cp_pedido = 0;
	for($i = 0;$i<count($producto); $i++)
	{
		$id = $producto[$i]["id_venta"];
		$valor = $producto[$i]["valor"];
		$valorDescto = $valor*$descto;
		$valorTotal = $valor - $valorDescto;

		$sql = 
		"UPDATE ventas SET valorDescto = '$valorTotal' WHERE id = '$id' AND id_cl = '$id_cl'";
		$res = $conexion->query($sql);;

		//acrónimo cp= Cantidad Pedido
		$np = $producto[$i]['nom_prod'];

		//CONTAR CANTIDAD DE PRODUCTOS SOLICITADOS 
		//DESCONTAR CANTIDAD DE PRODUCTO DE LA BD
		$sql = 
		"UPDATE productos p
		JOIN ventas v
		ON p.id_prod = v.producto
		SET p.cantidad = (p.cantidad-$cp_pedido) 
		WHERE nombre_prod = '$np'
		AND v.id_venta = $id_venta";
		$r5 = $conexion->query($sql);;

		
	}

	//CONSULTAR VALOR TOTAL DE LA VENTA
	$sql = 
	"SELECT SUM(valor) AS monto
	FROM ventas 
	WHERE id_cl = $id_cl 
	AND id_venta = $id_venta 
	AND estado = 'C'";
	$res = $conexion->query($sql);;
	//captura monto total generado por la venta
	$monto = 0;
	while($row = $res->fetch_array())
	{
		$monto = $row["monto"];
	}

	//REGISTRO EN MONTO_CAJA
	if($forma_pago==1)
	{
		
		$sql = 
		"INSERT INTO monto_caja VALUES(
			null,
			$id_cl,
			$nCaja,
			$idCierre,
			2,
			$monto
		)";
		$r3 = $conexion->query($sql);;
		if($r3)
		{
			echo "Pago en efectivo registrado en el movimiento de caja.\n";
		}
		else
		{
			echo $conexion->error();
		}
	}

	
	

	if($r1&&$r2&&$r3&&$r5)
	{
		echo "Pago registrado correctamente";
	}
	else
	{
		die("Error al registrar pago: ". mysqli_error($conexion));
	}
?>