<?php
session_start();
require '../../../../../conexion.php';
if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){

	date_default_timezone_set('America/Santiago');


    $id_us = $_SESSION['user']['id'];
    $nombre = $_SESSION['user']["nombre"];
    $id_cl = $_SESSION['user']["id_cl"];

    if(isset($_POST["id_temp"]))
    {
        $id_temp = $_POST["id_temp"];

        $sql = 
        "SELECT id, nombre_temporada 
        FROM temporada 
        WHERE id_cl = ?
        AND id = ?";
        if ($res = $mysqli->prepare($sql))
        {
            $res->bind_param('ii', $id_cl, $id_temp);
            $res->execute();
            $resultado = $res->get_result();
            $row = $resultado -> fetch_assoc();
        }
    }
    else
    {
        $sql = 
        "SELECT id, nombre_temporada 
        FROM temporada 
        WHERE id_cl = ?
        AND estado = 'S'";
        if ($res = $mysqli->prepare($sql))
        {
            $res->bind_param('i', $id_cl);
            $res->execute();
            $resultado = $res->get_result();
            $row = $resultado -> fetch_assoc();            
        }
    }
    echo json_encode($row);



	//consulta para verificar si existe una password temporal
    
    $mysqli->close();
}

?>
