<?php
if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){

    
    session_start();
	date_default_timezone_set('America/Santiago');
    require '../../../../../conexion.php';
	$id_us = $_SESSION['user']['id'];
    $nombre = $_SESSION['user']["nombre"];
    $id_cl = $_SESSION['user']["id_cl"];

	$mysqli->set_charset('utf8');
    $nombre = $_POST["nombre"];//nombre de temporada
    $id = $_POST["id"];
    

    //variable de impresión que indica si se hizo el registro o no
    $json = array(
        "edicion" => false,
        "titulo" => "Error",
        "mensaje" => "Ocurrió un error al intentar modificar la temporada",
        "icono" => "error"
    );
    //obtención de ID de registro
    $id_registro = 0;
    $sql = 
    "UPDATE temporada 
    SET nombre_temporada = ?
    WHERE id_cl = ?
    AND id = ?";
    
    if($res = $mysqli->prepare($sql))
    {
        $res -> bind_param("sii", $nombre, $id_cl, $id);
        if($res->execute())
        {
            $json = array(
                "edicion" => true,
                "titulo" => "Excelente",
                "mensaje" => "Temporada editada correctamente.",
                "icono" => "success"
            );
        }
    }
    
    echo json_encode($json);
}



$mysqli->close();

?>
