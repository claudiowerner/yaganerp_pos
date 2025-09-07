<?php


error_reporting(E_ALL);
ini_set('display_errors', 'On');
session_start();


require_once '../../../../../conexion.php';
if(isset($_SESSION['user'])){
	$tipo = $_SESSION['user']['tipo_usuario'];
  
    $id_us = $_SESSION['user']['id'];
    $nombre = $_SESSION['user']["nombre"];
    $id_cl = $_SESSION['user']["id_cl"];
    
    $rut = $_GET["rut"];

	//declaración de arrays
	$arrIdVenta = array();
	$arrEstado = array();
	$arrFecha = array();
	$arrValor = array();
    $json= array();
	

    //rellenar array de ID de venta
	$sql = 
	"SELECT id_venta, estado, DATE_FORMAT(fecha_registro, '%d-%m-%Y') AS fecha_registro
	FROM cuenta_corriente
	WHERE id_cl = $id_cl
	AND rut = '$rut'";
	$res = $conexion -> query($sql);

	while($row = $res -> fetch_array())
	{
		$arrIdVenta[] = $row["id_venta"];
		$arrEstado[] = $row["estado"];
		$arrFecha[] = $row["fecha_registro"];
	}



	$cont = count($arrIdVenta);

	for($i = 0; $i<$cont; $i++)
	{
		$id = $arrIdVenta[$i];
		$sql = 
		"SELECT SUM(valor - valorDescto) AS valor 
		FROM ventas 
		WHERE id_cl = $id_cl 
		AND estado = 'P'
		AND id_venta = $id";
		$res = $conexion -> query($sql);
		while($row = $res -> fetch_array())
		{
			$arrValor[] = $row["valor"];
		}
	}
    for($i = 0; $i<$cont; $i++)
    {
		$json[] =array(
			'correlativo' => $arrIdVenta[$i],
			'estado' =>  $arrEstado[$i],
			'fecha' => $arrFecha[$i],
			'valor' => $arrValor[$i]
        );
    }
    echo json_encode($json, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
}
else
{
	header('Location: ../');
}
?>
