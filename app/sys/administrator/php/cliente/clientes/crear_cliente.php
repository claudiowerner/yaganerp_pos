<?php
	require_once '../../../../conexion.php';
	//require_once '../correo.php';


	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	$nombre = $_POST["nombre"];
	$rut = $_POST["rut"];
	$correo = $_POST["correo"];
	$telefono = $_POST["telefono"];
	$direccion = $_POST["direccion"];
	$plan = $_POST["plan"];
	$fechaRegistro = $_POST["fechaRegistro"];
	$fechaDesde = $_POST["fechaDesde"];
	$fechaHasta = $_POST["fechaHasta"];
	$nomFantasia = $_POST["nomFantasia"];
	$razonSocial = $_POST["razonSocial"];
	$tipoPago = $_POST["tipoPago"];
	$fecha_pago = $_POST["fecha_pago"];
	$giro = $_POST["giro"];

	$nombre_plan = "";

	$sql = "SELECT nombre FROM planes WHERE id = $plan";
	$resultado = $conexion->query($sql);
	$row = $resultado->fetch_assoc();
	$nombre_plan = $row["nombre"];

	$sql = "INSERT INTO cliente VALUES 
	(null,'$nombre', '$rut', 'S','$nomFantasia', '$razonSocial',  $giro, '$direccion', '$correo','$telefono', '$plan', '$fechaRegistro', '$fechaRegistro');";
	$r1 = $conexion->query($sql);

	//seleccionar el ID del cliente

	$sql = "SELECT id FROM cliente WHERE rut = '$rut'";
	$res = $conexion->query($sql);;
	$resp = $res->fetch_assoc();
	$id_cl = $resp["id"];

	//registrar pago cliente
	$sql = "INSERT INTO pago_cliente VALUES
	(null, $id_cl, $plan, $tipoPago, '$fechaDesde', '$fechaHasta', 'S')";
	$r2 = $conexion->query($sql);

	$json = array();

	if($r1&&$r2)
	{
		$json = array(
			"registro" => true,
			"titulo" => "Excelente",
			"mensaje" => "Cliente registrado correctamente",
			"icono" => "success"
		);
	}
	else
	{
		$json = array(
			"registro" => false,
			"titulo" => "Error",
			"mensaje" => "Error al registrar cliente",
			"icono" => "error"
		);
	}
	
	echo json_encode($json);
?>