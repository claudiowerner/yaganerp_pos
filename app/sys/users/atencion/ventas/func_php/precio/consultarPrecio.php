<?php
    session_start();
    error_reporting(E_ALL);
    ini_set('display_errors', 'On');

    if(isset($_SESSION['user'])){
        $tipo = $_SESSION['user']['tipo_usuario'];
        $id_us = $_SESSION['user']['id'];
        $nombre = $_SESSION['user']["nombre"];
        $id_cl = $_SESSION['user']["id_cl"];
        
        $id_caja = 0;

        
        $codigo_barra = $_POST["cod_barra"];
        require_once '../../../../../conexion.php';
        require_once '../../../../../php/mb_encoding.php';

        //setear charset
        $conexion -> set_charset("utf8");
        //query
        $sql = 
        "SELECT nombre_prod, valor_venta 
        FROM productos 
        WHERE codigo_barra = '$codigo_barra' 
        AND id_cl = $id_cl";
        $res = $conexion->query($sql);;

        $json = array();

        if($res->num_rows>0)
        {
            while($row = $res->fetch_array())
            {
                $json = array(
                    "nombre"=>mb_encoding($row["nombre_prod"]),
                    "valor"=>$row["valor_venta"]
                );
            }
        }
        else
        {
            $json = array(
                "nombre"=>"No existe",
                "valor"=>"--"
            );
        }
        echo json_encode($json, JSON_UNESCAPED_UNICODE);

    }
    else
    {
    header('Location: ../');
    }
?>