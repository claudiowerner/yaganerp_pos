<?php


    session_start();
    error_reporting(E_ALL);
    ini_set('display_errors', 'On');
    date_default_timezone_set('America/Santiago');
    require_once '../../../../conexion.php';

    //obtener fecha actual
    $f = getdate();
    $año = $f["year"];
    $mes = $f["mon"];
    $dia = $f["mday"];
    $fecha_usuario = "$año-$mes-$dia";
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
    DATE_FORMAT(fecha_registro, '%d-%m-%Y') AS fecha_registro
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
        $idArray[] = $row["id"]; 
        $nombreArray[] = $row["nombre"]; 
        $rutArray[] = $row["rut"]; 
        $estadoArray[] = $estado; 
        $correoArray[] = $row["correo"]; 
        $telefonoArray[] = $row["telefono"]; 
        $plan_compradoArray[] = $row["plan_comprado"]; 
        $fecha_registroArray[] = $row["fecha_registro"]; 
      };

      //buscar fecha inicio y fin de periodo de pago
      

      $filas = $res->num_rows;
      for($i=0; $i<$filas; $i++)
      {
        $id_cl = $idArray[$i];
        $sql = 
        "SELECT 
        DATE_FORMAT(fecha_desde, '%d-%m-%Y') AS fecha_desde, 
        DATE_FORMAT(fecha_hasta-1, '%d-%m-%Y') AS fecha_hasta,
        estado
        FROM pago_cliente 
        WHERE id_cl = $id_cl
        AND '$fecha_usuario' BETWEEN fecha_desde AND fecha_hasta";
        $res = $conexion -> query($sql);

        while($row = $res -> fetch_array())
        { 
          $estado_pago = $row['estado'];
          if($estado_pago=="S")
          {
            $estado_pago = "PAGADO";
          }
          else
          {
            $estado_pago = "SIN PAGAR";
          }
          $fecha_desdeArray[] = $row["fecha_desde"]; 
          $fecha_hastaArray[] = $row["fecha_hasta"]; 
          $estado_pagoArray[] = $estado_pago; 
        }
      }
      //verificar si el cliente tiene un usuario admin
      for($i=0; $i<$filas; $i++)
      {
        $id_cl = $idArray[$i];
        
        $sql = "SELECT * FROM usuarios WHERE id_cl = $id_cl AND tipo_usuario = 1";
        
        $res = $conexion->query($sql);
        $numUsuarioAdminArray[] = $res->num_rows;
        
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
          "estado_pago" => $estado_pagoArray[$i],
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
