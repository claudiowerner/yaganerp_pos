<?php

	session_start();
	date_default_timezone_set('America/Santiago');ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	
    require_once '../../../../../../conexion.php';

	$id_cl = $_SESSION['user']["id_cl"];
    


    //este array es el que se muestra con la respuesta que se obtenga desde la BD
    $json = array();

    //Recepción del número del mes
    $mes_actual = $_POST["mes_actual"];
    //Recepción del año actual
    $año_actual = $_POST["año_actual"];
	//obtener número de dias del mes seleccionado
    $cantidad_dias = cal_days_in_month(CAL_GREGORIAN, $mes_actual, $año_actual);

    /*-----------------------------------creación del calendario---------------------------------------*/
    //seteo de la consulta a la BD en español
    $local_date = 
	"SET lc_time_names = 'es_ES';";
    $res = $conexion->query($local_date);

    $sql = 
        "SELECT DAY(corr.fecha_cierre) AS fecha 
        FROM correlativo corr
        JOIN ventas v
        ON v.id_venta = corr.correlativo
        AND MONTH(fecha_cierre) = $mes_actual
        AND YEAR(fecha_cierre) = $año_actual";

        $res = $conexion->query($sql);
        if($res->num_rows>0)
        {
            while($row = $res->fetch_array())
            {
                $json[] = array(
                    "fecha" => $row["fecha"],
                    "mes" => $mes_actual
                );
            }
        }
    
    echo json_encode($json, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);

?>