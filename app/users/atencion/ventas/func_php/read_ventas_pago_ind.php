<?php

session_start();

if(isset($_SESSION['user'])){
  $tipo = $_SESSION['user']['tipo_usuario'];
  $id_us = $_SESSION['user']['id'];
    $nombre = $_SESSION['user']["nombre"];
    $id_cl = $_SESSION['user']["id_cl"];
    $piso = 1;
    $nMesa = $_GET['nMesa'];


    require_once '../../../../conexion.php';

    //query
    $consulta = "SELECT p.id_prod, c.correlativo as corr, v.id AS id_venta_num, v.mesa, ub.nombre as ubicacion, u.nombre, p.id_prod, p.nombre_prod, v.id_venta, v.cantidad, v.tipo_venta, v.valor, v.propina, v.estado, v.fecha 
    FROM ventas v
    JOIN usuarios u on u.id = v.usuario
    JOIN productos p on p.id_prod=v.producto 
    JOIN ubicaciones ub on v.ubicacion=ub.id
    JOIN correlativo c on c.correlativo = v.id_venta WHERE v.id_cl = '$id_cl' AND v.mesa = $nMesa AND v.estado='A' ORDER BY v.id ASC";
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
          'id_venta_num' => $row['id_venta_num'],
          'id_prod' => $row['id_prod'],
          'folio' => $venta,
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
