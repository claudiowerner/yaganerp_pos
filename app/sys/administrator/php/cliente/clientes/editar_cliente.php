<?php

require_once '../../../../conexion.php';
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
    date_default_timezone_set('America/Santiago');
	error_reporting(E_ALL);

    //obtener fecha
	$hoy = getdate();
	$fecha = $hoy['year']."-".$hoy['mon']."-".$hoy['mday'];
	
	$nombre = $_POST["nombre"];
	$estado = $_POST["estado"];
	$rut = $_POST["rut"];
	$nom_fantasia = $_POST["nomFantasia"];
	$razon_social = $_POST["razonSocial"];
	$direccion = $_POST["direccion"];
	$correo = $_POST["correo"];
	$plan_comprado = $_POST["plan"];
	$telefono = $_POST["telefono"];
	$id = $_POST["id"];
	$metodo_pago = $_POST["metodo_pago"];
	$fechaDesde = $_POST["fechaDesde"];
	$fechaHasta = $_POST["fechaHasta"];
	$estado_pago = $_POST["estado_pago"];
	$giro = $_POST["giro"];
	
	$sql = 
	"UPDATE cliente c
	JOIN pago_cliente pg SET 
	c.nombre = '$nombre',
	c.rut = '$rut', 
	c.nom_fantasia = '$nom_fantasia', 
	c.razon_social = '$razon_social', 
	c.direccion = '$direccion', 
	c.correo = '$correo', 
	c.telefono = '$telefono', 
	c.plan_comprado = '$plan_comprado',  
	c.estado = '$estado',  
	c.giro = '$giro',

	pg.plan = '$plan_comprado',
	pg.metodo_pago = '$metodo_pago',
	pg.fecha_desde = '$fechaDesde',
	pg.fecha_hasta = '$fechaHasta',
	pg.estado = '$estado_pago'
	WHERE c.id = $id
	AND pg.id_cl = $id;
	";
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