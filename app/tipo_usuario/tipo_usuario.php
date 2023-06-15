<?php
    session_start();
    $tipo_usuario = $_SESSION['user']['tipo_usuario'];
    $nombre = $_SESSION['user']["nombre"];
    $id_cl = $_SESSION['user']["id_cl"];

    $json = array();
    $json[] = array(
        "tipo_usuario" => $tipo_usuario,
        "nombre" => $nombre,
        "id_cl" => $id_cl,
    );
    echo json_encode($json);
?>