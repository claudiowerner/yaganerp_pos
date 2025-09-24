<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 'On');
    session_start();


    if(isset($_SESSION['user'])){
        $tipo = $_SESSION['user']['tipo_usuario'];
        $id_us = $_SESSION['user']['id'];
        $nombre = $_SESSION['user']["nombre"];
        $id_cl = $_SESSION['user']["id_cl"];


        //declaración de variables
        $id_detalle = $_POST["id_detalle"];
        $id_prod = 0;
        $valor_venta = 0;

        require_once '../../../../../conexion.php';

        //Obtener ID del producto asociado al detalle de la venta
        $sql = 
        "SELECT producto 
        FROM ventas
        WHERE id = $id_detalle";
        $res = $conexion->query($sql);
        $arrRes = $res -> fetch_assoc();
        echo $id_prod = $arrRes["producto"];
    }
    else
    {
        header('Location: ../');
    }
?>