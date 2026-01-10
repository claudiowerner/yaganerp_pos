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
    "SELECT * FROM temporada WHERE id_cl = ? AND estado = 'S'";
    
    if($res = $mysqli->prepare($sql))
    {
        $res -> bind_param("i", $id_cl);
        $res -> execute();
        
		$r = $res->get_result();
        
        $json = array(
            "resultados" => $r -> num_rows
        );
        echo json_encode($json, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
    }

}



$mysqli->close();

?>
