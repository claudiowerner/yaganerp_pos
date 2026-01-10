<?php
if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){

    
    session_start();
	date_default_timezone_set('America/Santiago');
    require '../../../../../conexion.php';
	$id_us = $_SESSION['user']['id'];
    $nombre = $_SESSION['user']["nombre"];
    $id_cl = $_SESSION['user']["id_cl"];

    $id_temporada = $_POST["id"];

	$mysqli->set_charset('utf8');

    $valor_generado = 0;
    $ventas_hechas = 0;
    $cont_pedidos_hechos = 0;
    $inversion = 0;


    //ARRAYS
    $arrIdTemp = array();
    $arrCantItems = array();
    $json = array();
    
    //Seleccionar monto generado por temporada
    $sql = 
    "SELECT COALESCE(SUM(v.valor), 0) AS valor
    FROM ventas v
    JOIN correlativo c
    ON v.id_venta = c.correlativo
    JOIN cierre_caja cc
    ON cc.id = c.id_cierre
    JOIN temporada t
    ON t.id = cc.temporada
    WHERE v.id_cl = ?
    AND v.estado = 'C'
    AND t.id = ?";
    
    if($res = $mysqli->prepare($sql))
    {
        $res -> bind_param("ii", $id_cl, $id_temporada);
        $res -> execute();
		$r = $res->get_result();
        $arr = $r -> fetch_array();

        $valor_generado = $arr["valor"];
        
        
    }

    //Seleccionar número de ventas hechas
    $sql = 
    "SELECT COUNT(*) AS ventas_hechas
    FROM cierre_caja cc
    JOIN correlativo c
    ON c.id_cierre = cc.id
    WHERE cc.id_cl = ?
    AND cc.temporada = ?
    AND c.estado = 'C'";
    
    if($res = $mysqli->prepare($sql))
    {
        $res -> bind_param("ii", $id_cl, $id_temporada);
        $res -> execute();
		$r = $res->get_result();
        $arr = $r -> fetch_array();

        $ventas_hechas = $arr["ventas_hechas"];
        
    }





    //Seleccionar número de pedidos hechos
    $sql = 
    "SELECT COUNT(*) AS cont_pedidos_hechos 
    FROM pedidos 
    WHERE estado = 'C'
    AND id_cl = ? 
    AND temporada = ?";
    
    if($res = $mysqli->prepare($sql))
    {
        $res -> bind_param("ii", $id_cl, $id_temporada);
        $res -> execute();
		$r = $res->get_result();
        $arr = $r -> fetch_array();

        $cont_pedidos_hechos = $arr["cont_pedidos_hechos"];
        
        
    }

    
    //Seleccionar monto en pedidos/inversión
    $sql = 
    "SELECT COALESCE(SUM(pd.valor), 0) AS inversion 
    FROM pedidos_detalle pd
    JOIN pedidos p
    ON pd.id_pedido = p.id
    WHERE p.estado = 'C'
    AND p.id_cl = ?
    AND p.temporada = ?";
    
    if($res = $mysqli->prepare($sql))
    {
        $res -> bind_param("ii", $id_cl, $id_temporada);
        $res -> execute();
		$r = $res->get_result();
        $arr = $r -> fetch_array();

        $inversion = $arr["inversion"];
        
        
    }

    $json = array(
        "valor" => $valor_generado,
        "ventas_hechas" => $ventas_hechas,
        "pedidos_hechos" => $cont_pedidos_hechos,
        "inversion" => $inversion
    );
    echo json_encode($json, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);

}



$mysqli->close();

?>
