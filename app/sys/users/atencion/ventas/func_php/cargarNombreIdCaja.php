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
        $id_caja = 0;

        require_once '../../../../conexion.php';

        //query
        $sql = "SELECT id, nombre FROM cierre_caja WHERE estado='A' AND id_cl = '$id_cl'";
        $resultado = $conexion->query($sql);;

        $json = array();

        while($row = $resultado->fetch_array())
        {
            $json[]=array(
                'id' => $row["id"],
                'nombre' => $row["nombre"]
            );
        }
        echo json_encode($json);

    }
    else
    {
    header('Location: ../');
    }
?>