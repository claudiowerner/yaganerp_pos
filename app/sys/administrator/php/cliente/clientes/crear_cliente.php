<?php

	date_default_timezone_set('America/Santiago');
	require_once '../../../../conexion.php';
	//require_once '../correo.php';

	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	$nombre = $_POST["nombre"];
	$rut = $_POST["rut"];
	$nomFantasia = $_POST["nomFantasia"];
	$razonSocial = $_POST["razonSocial"];
	$giro = $_POST["giro"];
	$direccion = $_POST["direccion"];
	$correo = $_POST["correo"];
	$telefono = $_POST["telefono"];
	$plan = $_POST["plan"];
	$plazo = $_POST["plazo"];

	
	$f = getdate();
	$año = $f["year"];
	$mes = $f["mon"];
	$dia = $f["mday"];
	$fechaRegistro = "$año-$mes-$dia";


	/* -------------------------------------- REGISTRO EN TABLA CLIENTES -------------------------------- */

	$sql = "INSERT INTO cliente VALUES 
	(null,'$nombre', '$rut', 'S','$nomFantasia', '$razonSocial',  $giro, '$direccion', '$correo','$telefono', '$plan', '$plazo', '$fechaRegistro');";
	$r1 = $conexion->query($sql);
	

	if($r1)
	{
		$json = array(
			"registro" => true,
		);
	}
	else
	{
		$json = array(
			"registro" => false,
		);
	}
	
	echo json_encode($json);
?>