<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 'On');
    session_start();


    if(isset($_SESSION['user'])){
        $tipo = $_SESSION['user']['tipo_usuario'];
        $id_us = $_SESSION['user']['id'];
        $nombre = $_SESSION['user']["nombre"];
        $id_cl = $_SESSION['user']["id_cl"];


        //declaración de variables
        $id_detalle = $_POST["id_detalle"];
        $division = $_POST["division"];
        $unid_promo = $_POST["unid_promo"];
        $id_venta = $_POST["id_venta"];
        $num_registros = 0;
        $id_prod = 0;
        $valor_venta = 0;


        require_once '../../../../../conexion.php';

        //Obtener ID del producto asociado al detalle de la venta
        $sql = 
        "SELECT producto 
        FROM ventas
        WHERE id = $id_detalle";
        $res = $conexion->query($sql);
        $arrRes = $res -> fetch_assoc();
        $id_prod = $arrRes["producto"];

        //Obtener precio normal de venta del producto asociado
        $sql = 
        "SELECT valor_venta
        FROM productos
        WHERE id_prod = $id_prod";
        $res = $conexion->query($sql);
        $arrRes = $res -> fetch_assoc();
        $valor_venta = $arrRes["valor_venta"];

        //obtener número de registros que tengan el mismo producto
        $sql = 
        "SELECT * FROM ventas 
        WHERE id_venta = $id_venta 
        AND producto = $id_prod
        AND estado = 'A'";
        $res = $conexion -> query($sql);
        
        $num_registros = $res -> num_rows;

        $div = floor($num_registros/$unid_promo);

        $mult = $div*$unid_promo;

        echo $cant_actualizar = $num_registros - $mult;


        //actualizar valor de venta en la tabla ventas
        $sql = 
        "UPDATE ventas
        SET valor = $valor_venta
        WHERE id_cl = $id_cl
        AND producto = $id_prod
        AND estado = 'A'
        ORDER BY valor ASC
        LIMIT $cant_actualizar";
        $res = $conexion -> query($sql);
    }
    else
    {
        header('Location: ../');
    }
?>