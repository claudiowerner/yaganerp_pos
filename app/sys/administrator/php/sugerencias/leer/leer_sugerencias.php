<?php

	require_once '../../../../conexion.php';
	require_once '../../../../php/mb_encoding.php';

	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	date_default_timezone_set('America/Santiago');

	$json = array();

    /* ---------------------------------------------------- CONSULTA SQL ---------------------------------------------- */
	
    //setear charset
    $conexion -> set_charset("utf8");
    $sql = 
    "SELECT s.id, s.id_cl, cl.nombre, DATE_FORMAT(s.fecha_sugerencia, 'Recibida el %d-%m-%Y a las %H:%i:%s') AS fecha_sugerencia, s.sugerencia, s.estado 
    FROM sugerencias s
    JOIN cliente cl
    ON cl.id = s.id_cl
    WHERE s.estado !='N'";
    $res = $conexion -> query($sql);
    
    while($row = $res -> fetch_array())
    {
        $json[] = array(
            "id" => $row["id"],
            "nombre" => $row["nombre"]."(id cl: ".mb_encoding($row["id_cl"]).")",
            "fecha_sugerencia" => $row["fecha_sugerencia"],
            "sugerencia" => $row["sugerencia"],
            "estado" => $row["estado"],
        );
    }
    echo json_encode($json);
?>