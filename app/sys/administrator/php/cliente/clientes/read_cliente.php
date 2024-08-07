<?php


    error_reporting(E_ALL);
    ini_set('display_errors', 'On');
    session_start();
    require_once '../../../../conexion.php';

    //query
    $sql =
    "SELECT c.id, c.nombre, c.rut, c.estado, c.correo, c.telefono, pl.nombre AS plan_comprado, 
    DATE_FORMAT(fecha_registro, '%d-%m-%Y') AS fecha_registro,
    DATE_FORMAT(pc.fecha_desde, '%d-%m-%Y') AS fecha_desde,
    DATE_FORMAT(pc.fecha_hasta, '%d-%m-%Y') AS fecha_hasta,
    pc.estado AS estado_pago
    FROM cliente c
    JOIN planes pl
    ON pl.id = c.plan_comprado
    JOIN pago_cliente pc
    ON c.id = pc.id_cl
    GROUP BY c.id
    ORDER BY c.id ASC";
    $resultado = $conexion->query($sql);;
    if ($resultado->num_rows > 0){
      $json = array();
      while ($row = $resultado->fetch_array())
      {
        $estado = $row['estado'];
        if($estado=="S")
        {
          $estado = "ACTIVO";
        }
        else
        {
          $estado = "INACTIVO";
        }

        $estado_pago = $row['estado_pago'];
        if($estado_pago=="S")
        {
          $ep = "PAGADO";
        }
        else
        {
          $ep = "SIN PAGAR";
        }
        $json[] =array(
          'id' => $row['id'],
          'nombre' => $row['nombre'],
          'rut' => $row['rut'],
          'estado' => $estado,
          'correo' => $row['correo'],
          'telefono' => $row['telefono'],
          'plan_comprado' => $row['plan_comprado'],
          'fecha_registro' => $row['fecha_registro'],
          'fecha_desde' => $row['fecha_desde'],
          'fecha_hasta' => $row['fecha_hasta'],
          'estado_pago' => $ep
        );
      };
    }
    else
    {
      $json = array(
        "sEcho"=> 1,
        "iTotalRecords"=>"0",
        "iTotalDisplayRecords"=>"0",
        "aaData"=>[] 
      );
    }
    echo json_encode($json);  
    
  ?>
