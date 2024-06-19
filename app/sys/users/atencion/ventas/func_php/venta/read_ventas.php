<?php

  session_start();

  if(isset($_SESSION['user']))
  {
    $tipo = $_SESSION['user']['tipo_usuario'];
    $id_us = $_SESSION['user']['id'];
    $nombre = $_SESSION['user']["nombre"];
    $id_cl = $_SESSION['user']["id_cl"];
    $piso = 1;
    $nCaja = $_GET['nCaja'];
    $idVenta = $_GET['idVenta'];
    $descuento = 0;


    require_once '../../../../../conexion.php';

    //query
    $sql = 
    "SELECT p.codigo_barra, c.correlativo AS corr, 
    v.id, v.id_caja, 
    u.nombre, p.id_prod, p.nombre_prod, v.id_venta,
    cat.nombre_cat, p.pesaje, um.nombre_medida,
    v.cantidad, 
    (p.valor_venta*v.cantidad) AS valor_venta, 
    (v.valor*p.descuento)/100 AS descto, 
    p.descuento,
    v.estado, v.fecha
    FROM ventas v
    JOIN cajas caj ON caj.id = v.id_caja
    JOIN usuarios u on u.id = v.usuario
    JOIN productos p on p.id_prod=v.producto 
    JOIN unidades_medida um ON p.unidad_medida = um.id
    JOIN categorias cat ON cat.id = p.categoria
    JOIN correlativo c on c.correlativo = v.id_venta 
    WHERE v.id_cl = '$id_cl' 
    AND caj.id = '$nCaja' 
    AND c.correlativo = '$idVenta'
    AND v.estado!='N'
    GROUP BY v.id ORDER BY v.id ASC" ;
    $resultado = $conexion->query($sql);;
    $json = array();
    if ($resultado->num_rows > 0)
    {
      while ($row = $resultado->fetch_array())
      {
        $venta = 0;
        if($row['id_venta']==0||$row['id_venta']==null)
        {
          $venta = 1;
        }
        else
        {
          $venta = $row['id_venta'];
        }
        $descuento = $row["descto"];
        $json[] =array(
          'id' => $row['id'],
          'codigo_barra' => $row['codigo_barra'],
          'id_venta' => $venta,
          'usuario' => $row['nombre'],
          'nombre_prod' => ($row['nombre_prod']),
          'id_prod' => $row['id_prod'],
          'cantidad' => $row['cantidad'],
          'nombre_cat' => $row['nombre_cat'],
          'estado' => $row['estado'],
          'valor' => $row['valor_venta'], 
          'fecha' => $row['fecha'],
          'pesaje' => $row['pesaje'],
          'nombre_medida' => $row['nombre_medida'],
          'corr' => $row['corr'],
          'pDescuento' => $row['descto'],
          'pDescuentoMostrar' => $row['descuento']."%",
          'descto' => $descuento
        );
      };
    }
    echo json_encode($json);
  }
  else
  {
    header('Location: ../');
  }
?>
