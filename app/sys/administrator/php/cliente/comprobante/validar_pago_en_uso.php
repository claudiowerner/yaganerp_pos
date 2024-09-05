<?php

    date_default_timezone_set('America/Santiago');
    require_once '../../../../conexion.php';
    $id_cl = $_POST["id_cl"];
    $id_periodo = $_POST["id_periodo"];
    
    $json = array();

    $sql = "SELECT * FROM comprobantes WHERE id_cl = $id_cl AND id_pago = $id_periodo";
    $res = $conexion->query($sql);
    $json = array(
        "num_comprobantes" => $res->num_rows
    );
    echo json_encode($json);
?>