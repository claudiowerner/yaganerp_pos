<?php

/* ESTE SCRIPT SE ENCARGA DE VERIFICAR SI EXISTE UNA PROMOCIÓN ACTIVA PARA EL PRODUCTO SELECCIONADO*/
    error_reporting(E_ALL);
    ini_set('display_errors', 'On');
    session_start();


    if(isset($_SESSION['user'])){
        
        require_once '../../../../../conexion.php';
        $tipo = $_SESSION['user']['tipo_usuario'];
        $id_us = $_SESSION['user']['id'];
        $nombre = $_SESSION['user']["nombre"];
        $id_cl = $_SESSION['user']["id_cl"];

        //variable que envía una respuesta al DOM
        $json = array(
            "promo_activa" => false
        );

        //declaración de variables
        $idProd = $_POST["idProd"];

        //Consulta SQL
        $sql = 
        "SELECT * FROM promociones 
        WHERE id_prod = $idProd 
        AND id_cl = $id_cl";
        $res = $conexion -> query($sql);
        if($res -> num_rows != 0)
        {
            $json = array(
                "promo_activa" => true
            );
        }

        echo json_encode($json);
    
    }
    else
    {
        header('Location: ../');
    }
?>