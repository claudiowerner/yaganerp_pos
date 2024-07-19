<?php


session_start();
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);

	error_reporting(E_ALL);
	
	require_once '../../../../../../conexion.php';

	$id_us = $_SESSION['user']['id'];
	$nombre = $_SESSION['user']["nombre"];
	$id_cl = $_SESSION['user']["id_cl"];

	$id = $_POST["id_pedido"];

    $json = array();

	//editar detalle pedido
	$sql = 
	"UPDATE pedidos
	SET estado = 'N' 
	WHERE id = '$id';";
	$res = $conexion->query($sql);

    /* ------------------------------------ REGISTRO EN TABLA ANULAR_PEDIDO --------------------------- */
	//Fecha
	
	date_default_timezone_set('America/Santiago');

	$fecha_hora = date("Y-m-d")." ".date("H:i:s");
	$sql = "INSERT INTO anula_pedidos VALUES 
	(null, '$id_cl', '$id', '$id_us', '$fecha_hora');";

	$res2 = $conexion->query($sql);

    if($res&&$res2)
    {
        $json = array(
            "titulo" => "Excelente",
            "mensaje" => "Pedido eliminado correctamente",
            "icono" => "success"
        );
    }
    else
    {
        $json = array(
            "titulo" => "Error",
            "mensaje" => "Ha ocurrido un error al eliminar el pedido: ".$conexion->error(),
            "icono" => "error"
        );
    }

    echo json_encode($json, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);



?>