<?php
    require_once '../../../../conexion.php';
    
    $id_cl = $_POST["id_cl"];
    $dir_archivo = $_POST["dir_archivo"];
    $id_comprobante = $_POST["id_comprobante"];

    $sql =
    "UPDATE comprobantes 
    SET dir_archivo = '$dir_archivo' 
    WHERE (`id` = '$id_comprobante');";
    $res = $conexion->query($sql);

    $json = array();
    
    if($res)
    {
        $json = array(
            "edicion" => true,
            "titulo" => "Excelente",
            "mensaje" => "Comprobante editado correctamente.",
            "icono" => "success"
        );
        
    }
    else
    {
        $json = array(
            "edicion" => false,
            "titulo" => "Error",
            "mensaje" => "Error al editar el comprobante.",
            "icono" => "error"
        );
    }

    echo json_encode($json);



?>