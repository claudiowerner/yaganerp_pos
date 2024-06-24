<?php

	session_start();
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);

	error_reporting(E_ALL);
    require_once '../../../../../../conexion.php';

	$id_cl = $_SESSION['user']["id_cl"];

    //este array es el que se muestra con la respuesta que se obtenga desde la BD
    $json = array();

	$sql = 
	"SELECT YEAR(fecha_cierre) AS año 
    FROM correlativo 
    WHERE id_cl = 1 
    AND YEAR(fecha_cierre) != 0 
    GROUP BY YEAR(fecha_cierre)";
	$res = $conexion->query($sql);

    if($res->num_rows>0)
    {
        while($row = $res->fetch_array())
        {
            $año_actual = date("Y");
            $año_en_curso = true;
            if($año_actual==$row["año"])
            {
                $año_en_curso = true;
            }
            else
            {
                $año_en_curso = false;
            }
            $json[] = array(
                "año" => $row["año"],
                "año_en_curso" => $año_en_curso
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