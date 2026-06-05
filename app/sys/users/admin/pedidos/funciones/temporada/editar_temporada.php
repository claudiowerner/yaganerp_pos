<?php
if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){

    session_start();
    require '../../../../../conexion.php';

	date_default_timezone_set('America/Santiago');


    $id_us = $_SESSION['user']['id'];
    $nombre = $_SESSION['user']["nombre"];
    $id_cl = $_SESSION['user']["id_cl"];

    $temporada = $_POST["temp"];
    $pedido = $_POST["pedido"];
    

        $json = array();

        $sql = 
        "UPDATE pedidos
        SET temporada = ?
        WHERE id_cl = ?
        AND id = ?";
        if ($res = $mysqli->prepare($sql))
        {
            $res->bind_param('iii', $temporada, $id_cl, $pedido);

            if($res->execute())
            {
                echo 1;
            }
            else
            {
                echo 0;
            }
        }
    



	//consulta para verificar si existe una password temporal
    
    $mysqli->close();
}

?>
