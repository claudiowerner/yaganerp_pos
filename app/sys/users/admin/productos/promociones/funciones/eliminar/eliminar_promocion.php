<?php

    session_start();
    date_default_timezone_set('America/Santiago');
    require_once '../../../../../../conexion.php';

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    $id_us = $_SESSION['user']['id'];
    $nombre = $_SESSION['user']["nombre"];
    $id_cl = $_SESSION['user']["id_cl"];

    $id = $_POST["id"];
    
    $json = array();


    $sql = "UPDATE promociones SET estado = 'N' WHERE id = $id";
    $res = $conexion->query($sql);

    if($res)
    {
        $json = array(
            "eliminar" => true, 
            "titulo" => "Excelente",
            "mensaje" => "Promoción eliminada correctamente",
            "icono" => "success"
        );
    }
    else
    {
        $json = array(
            "eliminar" => false, 
            "titulo" => "Error",
            "mensaje" => "Error al eliminar la promoción",
            "icono" => "error"
        );
    }
    
    echo json_encode($json, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);

?>