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
        $id_caja = 0;
        $nCaja = $_POST["nCaja"];

        require_once '../../../../../conexion.php';

        //query
        $sql = 
        "SELECT correlativo AS corr 
        FROM correlativo 
        WHERE id_cl = $id_cl 
        AND caja = $nCaja";
        $mostrar = "";
        $res = $conexion->query($sql);
        
        if($res->num_rows!=0)
        {
            while($row=$res->fetch_array())
            {
                $mostrar = $row["corr"];
            }
        }
        else
        {
            $mostrar = 1;
        }
        echo $mostrar+1;
    }
    else
    {
        header('Location: ../');
    }
?>