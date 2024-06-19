<?php

    session_start();
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);

    error_reporting(E_ALL);
    require_once '../../../../../conexion.php';

    $tipo = $_SESSION['user']['tipo_usuario']; 
    $id_us = $_SESSION['user']['id'];
    $nombre = $_SESSION['user']["nombre"];
    $id_cl = $_SESSION['user']["id_cl"];

    //se compara si se está recibiendo el ID de venta
    if(isset($_POST["id_venta"]))
    {
        //obtención del ID de venta
        $id_venta = $_POST["id_venta"];

        //Arrays que almacenarán la información consultada (id, codigo del producto y cantidad)
        $arrId = array();
        $arrCodProd = array();
        $arrCantidad = array();
        //obtención de ID, código del producto y cantidad a través del ID de venta para realizar descuento
        $sql = 
        "SELECT id, producto, cantidad 
        FROM ventas 
        WHERE id_cl = $id_cl
        AND id_venta = $id_venta";

        $res = $conexion->query($sql);;
        while ($row = $res->fetch_array())
        {
            $arrId[] = $row["id"];
            $arrCodProd[] = $row["producto"];
            $arrCantidad[] = $row["cantidad"];
        }

        //numero que se mostrará al ejecutar el descuento en caso de que la consulta se ejecute bien
        $sql_ok = 0;
        //Se obtiene el largo del array
        $largo_array = count($arrId);

        //ciclo for que permite actualizar la cantidad vendida de x producto
        for($i = 0;$i<$largo_array; $i++)
        {
            $id_prod = $arrCodProd[$i];
            $cant_prod = $arrCantidad[$i];
            $sql = "UPDATE productos 
            SET cantidad = (cantidad - $cant_prod)
            WHERE id_cl = $id_cl
            AND id_prod = $id_prod";
            
            $res = $conexion->query($sql);;

            if($res)
            {
                $sql_ok++;
            }
        }
        echo $sql_ok;

    }
    else {
        echo "No se ha indicado el ID de venta";
    }
    

?>