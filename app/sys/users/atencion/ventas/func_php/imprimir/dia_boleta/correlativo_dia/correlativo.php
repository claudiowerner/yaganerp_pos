<?php

	session_start();
	date_default_timezone_set('America/Santiago');ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
    require_once '../../../../../../../conexion.php';

	$id_cl = $_SESSION['user']["id_cl"];

    //Arrays que almacenarán información imprimible
    $arrCorr = array();
    $arrValor = array();
    $arrFechaCierre = array();

    //este array es el que se muestra con la respuesta que se obtenga desde la BD
    $json = array();

    //recepcion del dia seleccionado
    $fecha = $_POST["fecha"];
    //Recepción del número del mes
    $mes = $_POST["mes"];
    //Recepción del año actual
    $año = $_POST["año"];

    $fecha_cierre = "$año-$mes-$fecha";

    //rellenar Array de correlativo 
    $sql = 
    "SELECT correlativo,
    DATE_FORMAT(fecha_cierre,'%d-%m-%Y %H:%i:%s') AS fecha_cierre
    FROM correlativo 
    WHERE id_cl = $id_cl
    AND YEAR(fecha_cierre) = $año
    AND MONTH(fecha_cierre) = $mes
    AND DAY(fecha_cierre) = $fecha
    AND estado = 'C'";
    $res = $conexion -> query($sql);

    while($row = $res -> fetch_array())
    {
        $arrCorr[] = $row["correlativo"];
        $arrFechaCierre[] = $row["fecha_cierre"];
    }

    
    $cont = count($arrCorr);


    //Obtener valor generado según el ID/correlativo de la compra 
    for($i=0; $i<$cont; $i++)
    {
        $id = $arrCorr[$i];$sql = 
        "SELECT SUM(valor*cantidad)-SUM(descto) AS valor 
        FROM ventas 
        WHERE id_cl = $id_cl 
        AND id_venta = $id 
        AND estado = 'C'";
        $res = $conexion -> query($sql);

        while($row = $res -> fetch_array())
        {
            $arrValor[] = $row["valor"];
        }
    }
    
    if($cont>0)
    {
        for($i = 0; $i<$cont; $i++)
        {
            $json[] = array(
                "res" => $cont, 
                "correlativo" => $arrCorr[$i],
                "valor" => $arrValor[$i],
                "fecha_cierre" => $arrFechaCierre[$i],
            );
        }
    }
    else
    {
        $json = array(
            "res" => 0
        );
    } 
    echo json_encode($json, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
    
?>