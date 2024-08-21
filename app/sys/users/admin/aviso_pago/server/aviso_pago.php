<?php
    
	session_start();
    setlocale (LC_TIME, "es_CL.UTF-8");
	date_default_timezone_set('America/Santiago');
	
	require_once '../../../../conexion.php';
    
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
    $id_us = $_SESSION['user']['id'];
    $nombre = $_SESSION['user']["nombre"];
    $id_cl = $_SESSION['user']["id_cl"];





    //calculo de distancia entre la fecha fin registrada en la BD y la fecha actual del sistema

    $f = getdate();
    $año = $f["year"];
    $mes = $f["mon"];
    $dia = $f["mday"];
    $fecha_usuario = "$año-$mes-$dia";

    if($mes<10)
    {
        $mes = "0$mes";
    }
    if($dia<10)
    {
        $dia = "0$dia";
    }
    $fecha_actual_str = "$año-$mes-$dia";

    //set locale mysql
    $sql = "SET lc_time_names = 'es_CL';";
    $res = $conexion->query($sql);
    
    $sql = "SELECT fecha_hasta, 
    DAYNAME(fecha_hasta) AS nombre_dia,
    DATE_FORMAT(fecha_hasta-1, '%d-%m-%Y') AS fecha_hasta_formateada
    FROM pago_cliente 
    WHERE id_cl = $id_cl
    AND '$fecha_usuario' BETWEEN fecha_desde AND fecha_hasta
    AND estado = 'N'";
    $res = $conexion->query($sql);

    $num_dias = 30;//inicializado en 30 para que no salte el aviso de pago o no se bloquee el sistema
    $mostrar_dias = "0";
    $fecha_final_str = "0000-00-00";
    $fecha_final_formateada = "00-00-0000";
    if($res -> num_rows>0)
    {
        $res_bd = $res -> fetch_array();
        $fecha_final_str = $res_bd["fecha_hasta"];
        $nombre_dia = strtoupper($res_bd["nombre_dia"]);
        $fecha_final_formateada = $nombre_dia." ".$res_bd["fecha_hasta_formateada"];

        //conversión de fechas de string a date
        $fecha_actual = date_create($fecha_actual_str);
        $fecha_final = date_create($fecha_final_str);


        if($fecha_actual>$fecha_final)
        {
            $num_dias = 0;
        }
        else
        {
            $dias_restantes = date_diff($fecha_actual, $fecha_final);
            $num_dias = $dias_restantes -> format("%d");
        }

        

        if($num_dias>1||$num_dias==0)
        {
            $mostrar_dias = "$num_dias días";
        }
        else
        {
            $mostrar_dias = "$num_dias día";
        }
    }
    
    

    $json = array(
        "dias_restantes" => $num_dias,
        "mostrar_dias" => $mostrar_dias,
        "fecha_final" => $fecha_final_formateada,
    );
    echo json_encode($json, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);

?>