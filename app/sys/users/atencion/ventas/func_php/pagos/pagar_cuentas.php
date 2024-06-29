<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);

    error_reporting(E_ALL);

    session_start();
    require_once '../../../../../conexion.php';

    $id_us = $_SESSION['user']['id'];
    $nombre = $_SESSION['user']["nombre"];
    $id_cl = $_SESSION['user']["id_cl"];
    //Array que se mostrará cuando se hayan ejecutado las sentencias SQL
    $json = array();

    if(isset($_POST["array_correlativo"])&&
        isset($_POST["fecha"])&&
        isset($_POST["id_turno"])&&
        isset($_POST["nCaja"])&&
        isset($_POST["formaPago"]))
    {
        //recepción de array de IDs de venta
        $arr_correlativo = $_POST["array_correlativo"];

        //recepción de fecha del navegador
        $fecha = $_POST["fecha"];

        //recepción del turno en que se realizó el pago
        $id_turno = $_POST["id_turno"];

        //recepción del número de la caja en que se realizó el pago
        $nCaja = $_POST["nCaja"];

        //recepción de la forma de pago
        $formaPago = $_POST["formaPago"];

        //obtener el largo del array $arr_correlativo
        $length_array = count($arr_correlativo);

        /* --------------------------SELECCIONAR PRECIOS DE CUENTA SEGÚN ID --------------------------*/
        //Creación de variable array que almacena el precio o valor de la(s) cuenta(s) seleccionadas
        $arrValor[] = array();

        for($i=0;$i<$length_array;$i++)
        {
            $id = $arr_correlativo[$i];
            $sql = 
            "SELECT valor 
            FROM correlativo 
            WHERE id_cl = $id_cl
            AND correlativo = $id";

            $res = $conexion->query($sql);

            if($res->num_rows>0)
            {
                while($row = $res->fetch_array())
                {
                    $arrValor[$i] = $row["valor"];
                }
            }
        }
        //variables que ejecutarán la sentencia SQL, y recibirán un valor TRUE en caso de que resulte ok.
        $res1 = false;
        $res3 = false;
        $res3 = false;
        $res4 = true;

        //actualización de correlativo según ID
        for($i=0; $i<$length_array;$i++)
        {
            //obtener ID del correlativo
            $id = $arr_correlativo[$i];
            $valor = $arrValor[$i];
            
            /* ----------------------ACTUALIZAR TABLA CORRELATIVO ----------------------- */
            $sql = "UPDATE correlativo 
            SET estado = 'C', 
            fecha_cierre = '$fecha',
            id_cierre = '$id_turno',
            forma_pago = '$formaPago',
            caja = '$nCaja'
            WHERE correlativo = $id 
            AND id_cl = $id_cl";
            $res1 = $conexion->query($sql);

            /* --------------------ACTUALIZAR TABLA CUENTA CORRIENTE ----------------------------- */
            $sql = "UPDATE cuenta_corriente
            SET estado = 'C' 
            WHERE id_venta = '$id'
            AND id_cl = '$id_cl'";
            $res2 = $conexion->query($sql);

            /* ------------------------- ACTUALIZAR TABLA VENTAS ------------------------------- */
            $sql = "UPDATE ventas
            SET id_caja = '$nCaja',
            estado = 'C',
            fecha_pago= '$fecha',
            forma_pago= '$formaPago'
            WHERE id_cl = $id_cl
            AND id_venta = $id";
            $res3 = $conexion->query($sql);

        }
        
        
        /* ------------------------ INSERTAR EN TABLA MONTO_CAJA -------------------------------- */
        //esta tabla almacena los movimientos de caja en caso de que el pago sea en efectivo
        if($formaPago==1)
        {
            for($i=0; $i<$length_array;$i++)
            {
                $valor = $arrValor[$i];
                $sql = "INSERT INTO monto_caja VALUES(
                    null,
                    $id_cl,
                    $nCaja,
                    $id_turno,
                    4,
                    $valor
                )";
                $res4 = $conexion->query($sql);
            }
        }
        

        if($res1&&$res2&&$res3)
        {
            $json = array(
                "titulo" => "Excelente",
                "mensaje" => "Se han procesado el pago de las $length_array cuentas correctamente.",
                "icono" => "success",
                "registro_movimiento" => $res4
            );
        }
        else
        {
            $json = array(
                "titulo" => "Error",
                "mensaje" => "Se produjo un error al procesar el pago de las cuentas.",
                "icono" => "error" ,
                "registro_movimiento" => $res4
            );
        }
    }
    else
    {
        $json = array(
        "titulo" => "Error",
        "mensaje" => "No se recibieron todos los datos para poder procesar el pago. Intente nuevamente.",
        "icono" => "error" 
    );
}
echo json_encode($json, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);


    
    
?>