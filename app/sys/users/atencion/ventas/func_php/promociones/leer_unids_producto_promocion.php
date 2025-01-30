<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 'On');
    session_start();

    if(isset($_SESSION['user'])){
        $tipo = $_SESSION['user']['tipo_usuario'];
        $id_us = $_SESSION['user']['id'];
        $nombre = $_SESSION['user']["nombre"];
        $id_cl = $_SESSION['user']["id_cl"];

        $id_prod = $_POST["id_prod"];

        require_once '../../../../../conexion.php';

        //query
        $sql = "SELECT id, unidades 
        FROM promociones 
        WHERE id_prod = $id_prod
        AND id_cl = $id_cl";
        $res = $conexion->query($sql);
        $json = $res->fetch_assoc();


        echo json_encode($json);
    }
    else
    {
        header('Location: ../');
    }
?>