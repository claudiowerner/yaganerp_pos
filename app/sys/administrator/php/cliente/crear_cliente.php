<?php
	echo "EJECUCION 1\n";
	require_once '../../../conexion.php';
	require_once '../correo.php';


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
	echo"giro: ".$giro = $_POST["giro"];

	$nombre_plan = "";

	$sql = "SELECT nombre FROM planes WHERE id = $plan";
	$resultado = mysqli_query($conexion, $sql);
	$row = $resultado->fetch_assoc();
	$nombre_plan = $row["nombre"];

	echo $sql = "INSERT INTO cliente VALUES 
	(null,'$nombre', '$rut', 'S', $giro, '$nomFantasia', '$razonSocial', '$direccion', '$correo','$telefono', '$plan', '$fechaRegistro');";
	$r1 = mysqli_query($conexion, $sql);


	//seleccionar el ID del cliente

	$sql = "SELECT id FROM cliente WHERE rut = '$rut'";
	$res = $conexion->query($sql);
	$resp = $res->fetch_assoc();
	$id_cl = $resp["id"];

	//registrar pago cliente
	$sql = "INSERT INTO pago_cliente VALUES
	(null, $id_cl, $plan, $tipoPago, '$fechaDesde', '$fechaHasta', 'S')";
	$r2 = $conexion->query($sql);

	if($r1&&$r2)
	{
		echo "Cliente agregado correctamente. ";

		$cuerpo =
		"¡Hola, $nombre!
		<br><br>
		Te informamos que has sido registrado exitosamente en el sistema de clientes de WebPOS. A continuación, te enviamos los datos que han sido registrado en nuestro sistema:<br>
		Nombre				: $nombre<br>
		R.U.T 				: $rut<br>
		Correo				: $correo<br>
		Teléfono			: $telefono<br>
		Dirección			: $direccion<br>
		Plan contratado		: $nombre_plan<br>
		Fecha de registro	: $fechaRegistro<br>
		Pagas desde			: $fechaDesde<br>
		Pago válido hasta 	: $fechaHasta<br>
		Nombre de fantasía	: $nomFantasia<br>
		Razón social		: $razonSocial<br>
		
		Revisa estos datos atentamente. En caso de querer modificarlos, debes comunicarte con nosotros. <br>
		<br>
		
		Atentamente, el equipo de WebPOS.";

		enviarMail($cuerpo, $correo, "Registro exitoso en WebPOS");

	}
	else
	{
		die("Error al agregar caja: ". mysqli_error($conexion));
	}
?>