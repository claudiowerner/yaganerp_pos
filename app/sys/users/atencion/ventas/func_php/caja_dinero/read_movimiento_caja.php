<?php

  session_start();

  if(isset($_SESSION['user']))
  {
    $tipo = $_SESSION['user']['tipo_usuario'];
    $id_us = $_SESSION['user']['id'];
    $nombre = $_SESSION['user']["nombre"];
    $id_cl = $_SESSION['user']["id_cl"];
    
    $caja = $_POST['caja'];
    $id_cierre = $_POST['id_cierre'];

    require_once '../../../../../conexion.php';
    $cont_mov = 0;
    $json = array();
    //query
    $sql = 
    "SELECT mc.monto, mmmc.descripcion
    FROM monto_caja mc 
    JOIN motivo_mov_monto_caja mmmc
    ON mc.motivo = mmmc.id
    WHERE id_cl = $id_cl 
    AND id_caja = $caja 
    AND id_cierre = $id_cierre 
    ORDER BY mc.id ASC" ;
    $res = $conexion->query($sql);;
    while($row = $res->fetch_array())
    {
      $cont_mov++;
      $json[] = array(
        "n_op" => $cont_mov,
        "descripcion" => $row["descripcion"],
        "monto" => $row["monto"]
      );
    }
    echo json_encode($json);
  }
  else
  {
    header('Location: ../');
  }
?>
