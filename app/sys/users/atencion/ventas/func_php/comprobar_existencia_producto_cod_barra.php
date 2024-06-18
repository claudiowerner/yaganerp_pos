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
        $cod_barra = $_POST["cod_barra"]; 

        //ARRAY JSON QUE SE VA A MOSTRAR
        $json = array();

        require_once '../../../../conexion.php';

        //query
        $sql = 
        "SELECT * FROM productos
        WHERE codigo_barra = '$cod_barra'
        AND id_cl = $id_cl";
        $resultado = $conexion->query($sql);;

        if($resultado->num_rows!=0)
        {
            while($row = $resultado->fetch_array())
            {
                $json= array(
                    "id"=>$row["id_prod"],
                    "encontrado"=> true
                );
            }
        }
        else
        {
            $json = array(
                "titulo" => "¡Aviso!",
                "mensaje" => "No se han encontrado productos con el código ($cod_barra)",
                "icono" => "warning",
                "encontrado"=> false
            );
        }

        echo json_encode($json, JSON_UNESCAPED_UNICODE);

    }
    else
    {
    header('Location: ../');
    }
?>