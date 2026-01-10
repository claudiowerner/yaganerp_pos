<?php
session_start();
require '../../../../../conexion.php';
if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){

	date_default_timezone_set('America/Santiago');


    $id_us = $_SESSION['user']['id'];
    $nombre = $_SESSION['user']["nombre"];
    $id_cl = $_SESSION['user']["id_cl"];


        $json = array();

        $sql = 
        "SELECT id, nombre_temporada, estado
        FROM temporada 
        WHERE id_cl = ?
        AND estado!='N'";
        if ($res = $mysqli->prepare($sql))
        {
            $res->bind_param('i', $id_cl);

            $res->execute();

            $resultado = $res->get_result();

            while($row = $resultado -> fetch_assoc())
            {
                $json[] = array(
                    "id" => $row["id"],
                    "nombre" => $row["nombre_temporada"], 
                    "estado" => $row["estado"]
                );
            }

            echo json_encode($json, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
        }
    



	//consulta para verificar si existe una password temporal
    
    $mysqli->close();
}

?>
