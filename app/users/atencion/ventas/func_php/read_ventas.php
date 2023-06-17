<?php

  session_start();

  if(isset($_SESSION['user']))
  {
    $tipo = $_SESSION['user']['tipo_usuario'];
    $id_us = $_SESSION['user']['id'];
    $nombre = $_SESSION['user']["nombre"];
    $id_cl = $_SESSION['user']["id_cl"];
    $piso = 1;
    $nMesa = $_GET['nMesa'];
    $idVenta = $_GET['idVenta'];


    require_once '../../../../conexion.php';

    //query



    $consulta = 
    "SELECT c.correlativo AS corr, 
    v.id, v.caja, 
    u.nombre, p.id_prod, p.nombre_prod, v.id_venta, 
    SUM(v.cantidad) AS cantidad, 
    v.tipo_venta, SUM(v.valor) AS valor, 
    v.estado, v.fecha
    FROM ventas v
    JOIN cajas caj ON caj.id = v.caja
    JOIN usuarios u on u.id = v.usuario
    JOIN productos p on p.id_prod=v.producto 
    JOIN correlativo c on c.correlativo = v.id_venta 
    WHERE v.id_cl = '$id_cl' 
    AND caj.id = '$nMesa' 
    AND c.correlativo = '$idVenta'
    AND v.estado!='N'
    AND caj.estado = 'A'
    GROUP BY v.id ORDER BY v.id ASC" ;
    $resultado = $conexion->query($consulta);
    $json = array();
    if ($resultado->num_rows > 0){
      while ($row = $resultado->fetch_array()) {
        $venta = 0;
        if($row['id_venta']==0||$row['id_venta']==null)
        {
          $venta = 1;
        }
        else
        {
          $venta = $row['id_venta'];
        }
        $json[] =array(
        'id' => $row['id'],
        'id_venta' => $venta,
        'mesa' => $row['mesa'],
        'ubicacion' => $row['ubicacion'],
        'usuario' => $row['nombre'],
        'nombre_prod' => ($row['nombre_prod']),
        'id_prod' => $row['id_prod'],
        'tipo_venta' => $row['tipo_venta'],
        'cantidad' => $row['cantidad'],
        'valor' => $row['valor'],
        'propina' => $row['propina'],
        'estado' => $row['estado'],
        'fecha' => $row['fecha'],
        'corr' => $row['corr']
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
