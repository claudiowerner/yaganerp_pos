<?php
    require_once '../../../../conexion.php';
    date_default_timezone_set('America/Santiago');
    
    $id_cl = $_POST["id_cliente"];
    $comprobante = $_POST["comprobante"];
    $id_pago = $_POST["id_pago"];

    $sql =
    "UPDATE comprobantes SET id_pago = '$id_pago' WHERE id = '$comprobante';";
    $res = $conexion->query($sql);

    $json = array();

    if($res)
    {
        $json = array(
            "editar_comprobante" => true,
            "titulo" => "Excelente",
            "mensaje" => "Periodo del comprobante editado correctamente",
            "icono" => "success"
        );
    }
    else
    {
        $json = array(
            "editar_comprobante" => false,
            "titulo" => "Error",
            "mensaje" => "Error al editar el periodo del comprobante",
            "icono" => "error"
        );
    }

    echo json_encode($json);



?>