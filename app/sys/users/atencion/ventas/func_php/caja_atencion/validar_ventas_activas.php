<?php


error_reporting(E_ALL);
ini_set('display_errors', 'On');
session_start();


require_once '../../../../../conexion.php';

if(isset($_SESSION['user']))
{
    $tipo = $_SESSION['user']['tipo_usuario'];
    $id_us = $_SESSION['user']['id'];
    $nombre = $_SESSION['user']["nombre"];
    $id_cl = $_SESSION['user']["id_cl"];
    
    $caja = $_POST["caja"];
    $turno = $_POST["turno"];
    $corr = $_POST["corr"];

	$json = array(
		"ventas_activas" => false,
	);
    
    //Actualización estado de mesa de ocupado a desocupado
    $sql = 
    "SELECT * FROM cajas c
    JOIN correlativo corr 
    ON c.id = corr.caja
    JOIN ventas v
    ON v.id_venta = corr.correlativo
    WHERE corr.estado = 'A'
    AND c.id = $caja
    AND corr.id_cierre = $turno
	AND corr.correlativo = $corr
    AND v.estado = 'A'";

    $res = $conexion->query($sql);

	if($res->num_rows>0)
	{
		$json = array(
			"ventas_activas" => true,
			"titulo" => "Aviso",
			"mensaje" => "Debe finalizar la venta activa para poder cerrar la caja.",
			"icono" => "warning"
		);
	}

	echo json_encode($json);

}
else
{
	header('Location: ../');
}
?>
