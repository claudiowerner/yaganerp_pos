<?php
session_start();
require '../../../../../conexion.php';
if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){

	date_default_timezone_set('America/Santiago');


    $id_us = $_SESSION['user']['id'];
    $nombre = $_SESSION['user']["nombre"];
    $id_cl = $_SESSION['user']["id_cl"];


	//consulta para verificar si existe una password temporal
    $sql = 
    "SELECT * FROM temporada
    WHERE id_cl = ?";
	if ($res = $mysqli->prepare($sql))
	{
		$res->bind_param('i', $id_cl);

		$res->execute();

		$resultado = $res->get_result();

        $json = array(
            "temporadas" => intval($resultado -> num_rows)
        );
    }
    echo json_encode($json);
    $mysqli->close();
}

?>
