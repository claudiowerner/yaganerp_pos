<?php


    error_reporting(E_ALL);
    ini_set('display_errors', 'On');
    session_start();
    require_once '../../../../conexion.php';


    //arrays
    $idArray = array();
    $nombreArray = array();
    $rutArray = array();
    $estadoArray = array();
    $correoArray = array();
    $telefonoArray = array();
    $plan_compradoArray = array();
    $fecha_registroArray = array();
    $fecha_desdeArray = array();
    $fecha_hastaArray = array();
    $estado_pagoArray = array();
    $numUsuarioAdminArray = array();
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
    $res = $conexion->query($sql);
    if ($res->num_rows > 0){
      $json = array();
      while ($row = $res->fetch_array())
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
        $idArray[] = $row["id"]; 
        $nombreArray[] = $row["nombre"]; 
        $rutArray[] = $row["rut"]; 
        $estadoArray[] = $estado; 
        $correoArray[] = $row["correo"]; 
        $telefonoArray[] = $row["telefono"]; 
        $plan_compradoArray[] = $row["plan_comprado"]; 
        $fecha_registroArray[] = $row["fecha_registro"]; 
        $fecha_desdeArray[] = $row["fecha_desde"]; 
        $fecha_hastaArray[] = $row["fecha_hasta"]; 
        $estado_pagoArray[] = $ep; 
      };


      $filas = $res->num_rows;
      //verificar si el cliente tiene un usuario admin
      for($i=0; $i<$filas; $i++)
      {
        $id_cl = $idArray[$i];
        $sql = "SELECT COUNT(id) AS num_admin FROM usuarios WHERE id_cl = $id_cl AND tipo_usuario = 1";
        $res = $conexion->query($sql);
        while($row = $res->fetch_array())
        {
          $numUsuarioAdminArray = $row["num_admin"];
        }
      }
      
      for($i=0; $i<$filas; $i++)
      {
        $json[] = array(
          "id" => $idArray[$i],
          "nombre" => $nombreArray[$i],
          "rut" => $rutArray[$i],
          "estado" => $estadoArray[$i],
          "correo" => $correoArray[$i],
          "telefono" => $telefonoArray[$i],
          "plan_comprado" => $plan_compradoArray[$i],
          "fecha_registro" => $fecha_registroArray[$i],
          "fecha_desde" => $fecha_desdeArray[$i],
          "fecha_hasta" => $fecha_hastaArray[$i],
          "estado_pago" => $estado_pagoArray[$i],
          "num_usuario_admin" => $numUsuarioAdminArray[$i],
          "estado_pago" => $ep,
        );
      }
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
    echo json_encode($json, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);  
    
  ?>
