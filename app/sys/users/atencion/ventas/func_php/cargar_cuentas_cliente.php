<?php

  session_start();

  if(isset($_SESSION['user']))
  {
    $tipo = $_SESSION['user']['tipo_usuario'];
    $id_us = $_SESSION['user']['id'];
    $nombre = $_SESSION['user']["nombre"];
    $id_cl = $_SESSION['user']["id_cl"];
    $rut = $_POST["rut"];


    require_once '../../../../conexion.php';

    //query
    $sql = 
    "SELECT ccr.id_venta AS correlativo, DATE_FORMAT(ccr.fecha_registro, '%d-%m-%Y') AS fecha, (SUM(v.valor)-v.valor*(v.des/100)) AS valor
    FROM cuenta_corriente ccr
    JOIN correlativo corr 

    ON corr.id = ccr.id_venta
    JOIN ventas v 
    ON corr.correlativo = v.id_venta
    WHERE rut = '$rut'
    AND ccr.estado = 'A'
    AND ccr.id_cl = $id_cl
    AND v.estado != 'N'
    GROUP BY ccr.id_venta" ;
    $resultado = $conexion->query($sql);;
    $json = array();
    if ($resultado->num_rows > 0){
      while ($row = $resultado->fetch_array()) {
        $json[] =array(
          'correlativo' => $row['correlativo'],
          'fecha' => $row['fecha'],
          'valor' => $row['valor']
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
