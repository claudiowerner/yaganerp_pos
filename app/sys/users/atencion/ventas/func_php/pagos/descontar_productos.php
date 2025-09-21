<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);

    error_reporting(E_ALL);

    session_start();
    require_once '../../../../../conexion.php';

    $id_us = $_SESSION['user']['id'];
    $nombre = $_SESSION['user']["nombre"];
    $id_cl = $_SESSION['user']["id_cl"];
    
    //Obtener ID de venta
    $id_venta = $_POST["id_venta"];

    //Declaración de Arrays
    $arrIdProd = array();
    $arrCantidad = array();

    //contador de filas de los array()
    $cont = 0;

    //Obtener ID de productos relacionados al ID de la venta indicada
    $sql = 
    "SELECT producto, cantidad
    FROM ventas
    WHERE id_cl = $id_cl
    AND id_venta = $id_venta";
    $res = $conexion -> query($sql);
    //Rellenar array de ID de productos
    while($row = $res -> fetch_array())
    {
        $arrIdProd[] = $row["producto"];
        $arrCantidad[] = $row["cantidad"];
    }


    //obtener número de filas del arrayIdProd
    $cont = count($arrIdProd);

    //actualizar stock de productos restando la cantidad obtenida de la primera consulta antes hecha
    for($i = 0; $i<$cont; $i++)
    {
        $id = $arrIdProd[$i];
        $cant = $arrCantidad[$i];
        echo$sql = 
        "UPDATE productos 
        SET cantidad = (cantidad-$cant) 
        WHERE id_cl = $id_cl
        AND id_prod = $id";
        
        $res = $conexion -> query($sql);
    }

    
?>