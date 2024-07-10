<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 'On');
    session_start();

    if(isset($_SESSION['user'])){
        $tipo = $_SESSION['user']['tipo_usuario'];
        $id_us = $_SESSION['user']['id'];
        $nombre = $_SESSION['user']["nombre"];
        $id_cl = $_SESSION['user']["id_cl"];
        
        $id_caja = 0;

        require_once '../../../../../conexion.php';

        //query
        $sql = "SELECT stock_minimo 
        FROM stock_minimo_producto
        WHERE id_cl = $id_cl
        AND estado = 'S'";
        $resultado = $conexion->query($sql);;

        $json = array();

        if($resultado->num_rows>0)
        {
            while($row = $resultado->fetch_array())
            {
                $json = array(
                    'stock_minimo' => $row["stock_minimo"],
                );
            }
        }
        else
        {
            $json = array(
                "titulo" => "Ups...",
                "mensaje" => "Error al obtener stock mínimo: ".$conexion->error(),
                "icono" => "error",
            );
        }
        echo json_encode($json);
    }
    else
    {
    header('Location: ../');
    }
?>