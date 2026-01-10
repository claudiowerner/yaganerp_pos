<?php
if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){

    
    session_start();
	date_default_timezone_set('America/Santiago');
    require '../../../../../conexion.php';
	$id_us = $_SESSION['user']['id'];
    $nombre = $_SESSION['user']["nombre"];
    $id_cl = $_SESSION['user']["id_cl"];

	$mysqli->set_charset('utf8');
    $id = $_POST["id"];
    
    $hoy = getdate();
    $fecha = $hoy['year']."-".$hoy['mon']."-".$hoy['mday']." ".$hoy["hours"].":".$hoy["minutes"].":".$hoy["seconds"];
            

    //variable de impresión que indica si se hizo el registro o no
    $json = array(
        "cierre" => false,
        "titulo" => "Error",
        "mensaje" => "Ocurrió un error al intentar cerrar la temporada",
        "icono" => "error"
    );


    $sql = 
    "UPDATE temporada 
    SET estado = 'C',
    fecha_cierre = ?
    WHERE id_cl = ?
    AND id = ?";
    
    if($res = $mysqli->prepare($sql))
    {
        $res -> bind_param("sii", $fecha, $id_cl, $id);
        if($res->execute())
        {
            $json = array(
                "cierre" => true,
                "titulo" => "Excelente",
                "mensaje" => "Temporada cerrada correctamente.",
                "icono" => "success"
            );
        }
    }
    
    echo json_encode($json);
}



$mysqli->close();

?>
