<?php
if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){

    
    session_start();
	date_default_timezone_set('America/Santiago');
    require '../../../../../conexion.php';
	$id_us = $_SESSION['user']['id'];
    $nombre = $_SESSION['user']["nombre"];
    $id_cl = $_SESSION['user']["id_cl"];

	$mysqli->set_charset('utf8');

    $json = array();


    //ARRAYS
    $arrIdTemp = array();
    $arrCantItems = array();
    
    
    $sql = 
    "SELECT t.id, t.nombre_temporada, DATE_FORMAT(fecha_creacion, '%d-%m-%Y %H:%i:%s') AS fecha, t.estado, DATE_FORMAT(fecha_cierre, '%d-%m-%Y %H:%i:%s') AS fecha_cierre, u.nombre 
    FROM temporada t
    JOIN usuarios u
    ON t.creado_por = u.id 
    WHERE t.id_cl = ?
    AND t.estado != 'N'";
    
    if($res = $mysqli->prepare($sql))
    {
        $res -> bind_param("i", $id_cl);
        $res -> execute();
        
		$r = $res->get_result();
        
        $nr = $r -> num_rows;
        $cont = 0;
        if($nr!=0)
        {
            while($row = $r->fetch_array())
            {
                $cont++;
                $fecha_cierre = "";
                if($row["fecha_cierre"]=="00-00-0000 00:00:00")
                {
                    $fecha_cierre = "-";
                }
                else
                {
                    $fecha_cierre = $row["fecha_cierre"];
                }
                $json[] = array(
                    "id" => $row["id"],
                    "num_item" => $cont,
                    "nombre_temporada" => $row["nombre_temporada"],
                    "fecha" => $row["fecha"],
                    "fecha_cierre" => $fecha_cierre,
                    "creado_por" => $row["nombre"],
                    "estado" => $row["estado"],
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
    }

}



$mysqli->close();

?>
