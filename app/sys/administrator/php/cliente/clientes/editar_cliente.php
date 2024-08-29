<?php

	require_once '../../../../conexion.php';
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
    date_default_timezone_set('America/Santiago');
	error_reporting(E_ALL);

    //obtener fecha
	$hoy = getdate();
	$fecha = $hoy['year']."-".$hoy['mon']."-".$hoy['mday'];
	/* --------------------------------------------- RECEPCION DE VARIABLES-------------------------------------------- */
	
	$id_cl = $_POST["id"];
	$nombre = $_POST["nombre"];
	$rut = $_POST["rut"];
	$correo = $_POST["correo"];
	$telefono = $_POST["telefono"];
	$direccion = $_POST["direccion"];
	$nom_fantasia = $_POST["nomFantasia"];
	$razon_social = $_POST["razonSocial"];
	$giro = $_POST["giro"];

	/* ------------------------------------------ SELECCIONAR FECHA INICIO  */
	
	$sql = 
	"UPDATE cliente c
	SET 
	c.nombre = '$nombre',
	c.rut = '$rut', 
	c.correo = '$correo', 
	c.telefono = '$telefono', 
	c.direccion = '$direccion', 
	c.nom_fantasia = '$nom_fantasia', 
	c.razon_social = '$razon_social', 
	c.giro = '$giro'
	WHERE c.id = $id_cl;";
	$res = $conexion->query($sql);

	$json = array();
	
	if($res)
	{
		$json = array(
			"edicion" => true,
			"titulo" => "Excelente",
			"mensaje" => "Cliente editado correctamente.",
			"icono" => "success"
		);
	}
	else
	{
		$json = array(
			"edicion" => false,
			"titulo" => "Error",
			"mensaje" => "Ha ocurrido un error al editar el cliente: ".$conexion->error,
			"icono" => "error"
		);
	}

	echo json_encode($json);
	
	

?>