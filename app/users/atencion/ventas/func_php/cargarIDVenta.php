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
        $piso = 1;
        $id_caja = 0;
        $nCaja = $_POST["nCaja"];

        require_once '../../../../conexion.php';

        //query
        $consulta = 
        "SELECT correlativo AS corr 
        FROM correlativo 
        WHERE id_cl = $id_cl 
        AND estado = 'A'
        AND caja = $nCaja";
        $resultado = $conexion->query($consulta);

        $corr = "";

        if($resultado->num_rows!=0)
        {
            while($row = $resultado->fetch_array())
            {
                $corr = $row["corr"];
            }
        }
        else
        {
            $consulta = "SELECT max(correlativo) AS corr FROM correlativo WHERE id_cl = $id_cl ";
            $resultado = $conexion->query($consulta);

            while($row = $resultado->fetch_array())
            {
                $corr = $row["corr"];
            }
        }
        echo $corr;

    }
    else
    {
    header('Location: ../');
    }
?>