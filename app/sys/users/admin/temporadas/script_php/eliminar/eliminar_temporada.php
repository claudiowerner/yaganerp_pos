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
    

    //variable de impresión que indica si se hizo el registro o no
    $json = array(
        "eliminar" => false,
        "titulo" => "Error",
        "mensaje" => "Ocurrió un error al intentar eliminar la temporada",
        "icono" => "error"
    );
    
    $items_activos = 0;

    //obtener cantidad de pedidos hechos
    $sql = 
    "SELECT COUNT(*) AS pedidos_hechos
    FROM pedidos 
    WHERE id_cl = ? 
    AND temporada = ?
    AND estado = 'C'";
    
    if($res = $mysqli->prepare($sql))
    {
        $res -> bind_param("ii", $id_cl, $id);
        if($res->execute())
        {
            $resultado = $res->get_result();

            $arrRes = $resultado -> fetch_assoc();
            $items_activos = $items_activos + intval($arrRes["pedidos_hechos"]);
        }
    }


    //obtener cantidad de turnos asignados a la temporada
    $sql = 
    "SELECT COUNT(*) AS cajas_temporada 
    FROM cierre_caja 
    WHERE id_cl = ?
    AND temporada = ? 
    AND estado = 'C'";
    
    if($res = $mysqli->prepare($sql))
    {
        $res -> bind_param("ii", $id_cl, $id);
        if($res->execute())
        {
            $resultado = $res->get_result();

            $arrRes = $resultado -> fetch_assoc();
            $items_activos = $items_activos + intval($arrRes["cajas_temporada"]);
        }
    }

    if($items_activos>0)
    {
        $json = array(
            "eliminar" => false,
            "titulo" => "Aviso",
            "mensaje" => "Existen turnos/cierres de caja o pedidos asociados a ésta temporada. No se puede eliminar.",
            "icono" => "warning"
        );
    }
    else
    {
        $sql = 
        "UPDATE temporada 
        SET estado = 'N'
        WHERE id_cl = ?
        AND id = ?";
        
        if($res = $mysqli->prepare($sql))
        {
            $res -> bind_param("ii", $id_cl, $id);
            if($res->execute())
            {
                $json = array(
                    "eliminar" => true,
                    "titulo" => "Excelente",
                    "mensaje" => "Temporada eliminada correctamente.",
                    "icono" => "success"
                );
            }
        }
    }
    
    echo json_encode($json);
}



$mysqli->close();

?>
