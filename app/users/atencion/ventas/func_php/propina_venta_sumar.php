<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 'On');
    session_start();

    if(isset($_SESSION['user'])){
        $tipo = $_SESSION['user']['tipo_usuario'];
        $id_us = $_SESSION['user']['id'];
        $nombre = $_SESSION['user']["nombre"];
        $id_cl = $_SESSION['user']["id_cl"];
        $piso = 1;
        $id_venta = $_GET["id_venta"];
        $propina = $_GET["propina"];

        require_once '../../../../conexion.php';

        //query
        $consulta = "UPDATE ventas SET propina = '$propina' WHERE id = '$id_venta';";
        $resultado = $conexion->query($consulta);

        if($resultado)
        {
            echo "Propina agregada correctamente.";
        }

    }
    else
    {
        header('Location: ../');
    }
?>