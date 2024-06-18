<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 'On');
    session_start();

    if(isset($_SESSION['user']))
    {
        $tipo = $_SESSION['user']['tipo_usuario'];
        $id_us = $_SESSION['user']['id'];
        $nombre = $_SESSION['user']["nombre"];
        $id_cl = $_SESSION['user']["id_cl"];

        require_once '../../../../conexion.php';

        //query
        $sql = 
        "SELECT id FROM cierre_caja WHERE id_cl = $id_cl AND estado = 'A'";
        $res = $conexion->query($sql);;

        while($row = $res->fetch_array())
        {
            echo $row["id"];
        }

    }
    else
    {
    header('Location: ../');
    }
?>