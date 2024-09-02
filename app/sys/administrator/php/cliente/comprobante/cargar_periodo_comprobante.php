<?php

    date_default_timezone_set('America/Santiago');
    require_once '../../../../conexion.php';
    //$id_cl = $_GET["id_cl"];
    $id_cl = 1;


    $json = array();
    $arrayId = array();
    $arrayIdPago = array();
    $arrayFechas = array();

    $sql = "SELECT id FROM pago_cliente WHERE id_cl = $id_cl AND estado = 'S' AND comprobante = 'N'";
    $res = $conexion->query($sql);

    $json = array();
    $cont = 0;
    if($res->num_rows!=0)
    {
        while($row = $res->fetch_array())
        {
            $arrayId[] = $row["id"];
        }

        $cont = count($arrayId);

        for($i=0;$i<$cont;$i++)
        {
            $id = $arrayId[$i];
            $sql =
            "SELECT DATE_FORMAT(fecha_desde, '%d-%m-%Y') AS fecha_desde,
            DATE_FORMAT(fecha_hasta, '%d-%m-%Y') AS fecha_hasta 
            FROM pago_cliente 
            WHERE id_cl = $id_cl
            AND id = $id";
            $res = $conexion->query($sql);
            
            if($res->num_rows!=0)
            {
                while($row = $res->fetch_array())
                {
                    $fecha_desde = $row["fecha_desde"];
                    $fecha_hasta = $row["fecha_hasta"];
                    $arrayFechas[] = "Desde $fecha_desde hasta $fecha_hasta";
                }
            }
        }
        for($i=0;$i<$cont;$i++)
        {
            $json[] = array(
                "id" => $arrayId[$i],
                "periodos" => $arrayFechas[$i]
            );
        }
    }
    else
    {
        $json = array(
            "id" => 0,
            "periodo" => "No existen periodos disponibles."
        );
    }

    echo json_encode($json);
?>