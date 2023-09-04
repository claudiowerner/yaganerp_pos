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



    $consulta = 
    "SELECT ccr.correlativo, DATE_FORMAT(ccr.fecha, '%d-%m-%Y') AS fecha, corr.valor
    FROM cuenta_corriente ccr
    JOIN correlativo corr 
    ON corr.id = ccr.correlativo
    WHERE rut = '$rut'
    AND ccr.estado = 'A'
    AND ccr.id_cl = $id_cl
    GROUP BY ccr.correlativo" ;
    $resultado = $conexion->query($consulta);
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
