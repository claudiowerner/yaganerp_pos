<?php

session_start();


  $id_us = $_SESSION['user']['id'];
  $nombre = $_SESSION['user']["nombre"];
  $id_cl = $_SESSION['user']["id_cl"];


	require_once '../../../../../../conexion.php';

	
  //arrays
  $arrayId = array();
  $arrayNombreProveedor = array();
  $arrayEstado = array();
  $arrayNombreUsuario = array();
  $arrayFechaRegistro = array();
  $arrayEstadoPago = array();
  $arrayValor = array();
  $arrayNombrePedido = array();

  //array que se va a imprimir con los resultados
  $json = array();

  //rellenar Array ID
  $sql =
  "SELECT id 
  FROM pedidos 
  WHERE id_cl = $id_cl
  AND estado != 'N'";
  $res = $conexion->query($sql);

  if($res->num_rows>0)
  {
    while($row = $res->fetch_array())
    {
      $arrayId[] = $row["id"];
    }

    $length = count($arrayId);
    

    //rellenar array de proveedores, nombre de usuario, estado pago y estado de pedido
    for($i=0;$i<$length;$i++)
    {
      $id = $arrayId[$i];
      $sql = 
      "SELECT pr.nombre_proveedor, ped.nombre_pedido, ped.estado, us.nombre, 
      DATE_FORMAT(ped.fecha_registro, '%d-%m-%Y') AS fecha_registro, ped.estado_pago
      FROM pedidos ped
      JOIN proveedores PR
      ON pr.id = ped.id_proveedor
      JOIN usuarios us 
      ON ped.creado_por = us.id
      WHERE ped.id_cl = $id_cl
      AND ped.id = $id";
      $res = $conexion->query($sql);

      while($row = $res->fetch_array())
      {
        $estado = "";
        if($row['estado']=="C")
        {
          $estado = "HECHO";
        }
        if($row['estado']=="A")
        {
          $estado = "POR HACER";
        }

        //estado pago
        $estado_pago = "";
        if($row['estado_pago']=="C")
        {
          $estado_pago = "HECHO";
        }
        if($row['estado_pago']=="A")
        {
          $estado_pago = "POR HACER";
        }
        
        $arrayNombreProveedor[] = $row["nombre_proveedor"];
        $arrayNombrePedido[] = $row["nombre_pedido"];
        $arrayEstado[] = $estado;
        $arrayNombreUsuario[] = $row["nombre"];
        $arrayFechaRegistro[] = $row["fecha_registro"];
        $arrayEstadoPago[] = $estado_pago;
      }
    }
    for($i=0;$i<$length;$i++)
    {
      $id = $arrayId[$i];
      $sql = 
      "SELECT SUM(pd.valor*pd.cantidad) 
      AS valor, p.fac_con_iva
      FROM pedidos_detalle pd 
      JOIN pedidos p 
      ON p.id = pd.id_pedido
      WHERE pd.id_cl = $id_cl
      AND pd.estado='S'
      AND pd.id_pedido = $id";
      $res = $conexion->query($sql);

      while($row = $res->fetch_array())
      {
        $arrayValor[] = $row["valor"];;
      }
    }
    
    //rellenar JSON que se va a mostrar
    for($i=0; $i<$length; $i++)
    {
      $json[] =array(
        'item' => ($i+1),
        'id' => $arrayId[$i],
        'nombre_pedido' => $arrayNombrePedido[$i],
        'nombre_proveedor' => $arrayNombreProveedor[$i],
        'estado' => $arrayEstado[$i],
        'nombre' => $arrayNombreUsuario[$i],
        'fecha_registro' => $arrayFechaRegistro[$i],
        'valor' => $arrayValor[$i],
        'estado_pago' => $arrayEstadoPago[$i]
      );
    }
    echo json_encode($json, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
  }
  else
  {
    echo '{
      "sEcho": 1,
      "iTotalRecords": "0",
      "iTotalDisplayRecords": "0",
      "aaData": []
      }';
  
  }

?>
