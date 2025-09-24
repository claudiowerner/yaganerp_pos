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

        $salida = 0;
        //query
        $sql = 
        "SELECT stock_minimo 
        FROM stock_minimo_producto
        WHERE estado='S' AND id_cl = '$id_cl'";
        $resultado = $conexion->query($sql);

        if($resultado->num_rows!=0)
        {    
            while($row = $resultado->fetch_array())
            {
                $salida = $row["stock_minimo"];
            }
            echo $salida;
        }
        else
        {
            echo 0;
        }

    }
    else
    {
    header('Location: ../');
    }
?>