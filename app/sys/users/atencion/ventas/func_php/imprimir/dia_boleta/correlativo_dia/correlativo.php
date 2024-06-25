<?php

	session_start();
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
    require_once '../../../../../../../conexion.php';

	$id_cl = $_SESSION['user']["id_cl"];
    


    //este array es el que se muestra con la respuesta que se obtenga desde la BD
    $json = array();

    //recepcion del dia seleccionado
    $fecha = $_POST["fecha"];
    //Recepción del número del mes
    $mes = $_POST["mes"];
    //Recepción del año actual
    $año = $_POST["año"];
    $sql = 
        "SELECT corr.correlativo, SUM(v.valorDescto) AS valor, 
        DATE_FORMAT(corr.fecha_cierre,'%d-%m-%Y %H:%i:%s') AS fecha_cierre
        FROM correlativo corr
        JOIN usuarios us 
        ON corr.usuario = us.id 
        JOIN ventas v 
        ON v.id_venta = corr.correlativo
        WHERE corr.id_cl = $id_cl
        AND YEAR(fecha_cierre) = $año
        AND MONTH(fecha_cierre) = $mes
        AND DAY(fecha_cierre) = $fecha
        GROUP BY fecha_cierre";

        $res = $conexion->query($sql);
        if($res->num_rows>0)
        {
            while($row = $res->fetch_array())
            {
                $json[] = array(
                    "correlativo" => $row["correlativo"],
                    "valor" => $row["valor"],
                    "fecha_cierre" => $row["fecha_cierre"],
                );
            }
            echo json_encode($json, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
        }
        else
        {
        echo '{
            "sEcho": 1,
            "iTotalRecords": "0",
            "iTotalDisplayRecords": "0",
            "aaData": []
            }';

        } 
    
?>