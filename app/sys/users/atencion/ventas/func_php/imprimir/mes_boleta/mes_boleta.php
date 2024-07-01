<?php

	session_start();
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);

	error_reporting(E_ALL);
    require_once '../../../../../../conexion.php';

	$id_cl = $_SESSION['user']["id_cl"];
    $año = $_POST["año"];

    //este array es el que se muestra con la respuesta que se obtenga desde la BD
    $json = array();

	$local_date = 
	"SET lc_time_names = 'es_ES';";
    $res = $conexion->query($local_date);

    $sql = 
    "SELECT DATE_FORMAT(fecha_cierre,'%M') AS mes,
    DATE_FORMAT(fecha_cierre, '%m') AS nro_mes
    FROM correlativo 
    WHERE id_cl = $id_cl
    AND YEAR(fecha_cierre) = $año
    GROUP BY MONTH(fecha_cierre)";
	$res = $conexion->query($sql);

    if($res->num_rows>0)
    {
        while($row = $res->fetch_array())
        {
            $mes = Date("m");
            $mes_actual = true;
            if($mes==$row["nro_mes"])
            {
                $mes_actual = true;
            }
            else
            {
                $mes_actual = false;
            }
            $json[] = array(
                "mes" => $row["mes"],
                "nro_mes" => $row["nro_mes"],
                "mes_actual" => $mes_actual
            );
        }
    }
    else
    {
        $json = array(
            "aviso" => "Aún no hay ventas concretadas."
        );
    }
    echo json_encode($json, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);

?>