<?php

  session_start();

  if(isset($_SESSION['user']))
  {
    $tipo = $_SESSION['user']['tipo_usuario'];
    $id_us = $_SESSION['user']['id'];
    $nombre = $_SESSION['user']["nombre"];
    $id_cl = $_SESSION['user']["id_cl"];
    $turno = $_POST["turno"];
    $caja = $_POST["caja"];


    require_once '../../../../conexion.php';

    //definición de arrays
    $arrId = array();
    $arrNombre = array();
    $arrMonto = array();
    $json = array();


    $sql = "SELECT id, nombre_metodo_pago FROM metodo_pago";
    $res = $conexion->query($sql);;
    while ($row = $res->fetch_array())
    {
      $arrId[] = $row["id"];
      $arrNombre[] = $row["nombre_metodo_pago"];
    }

    //contador de número de métodos de pago
    $contador = count($arrId);
    for($i=0; $i<$contador; $i++)
    {
      $id = $arrId[$i];
      $sql = 
      "SELECT SUM(v.valor-((v.valor*v.descto)/100)) AS valor
      FROM ventas v
      JOIN correlativo corr
      ON corr.correlativo = v.id_venta
      WHERE v.id_cl = $id_cl 
      AND v.estado = 'C' 
      AND corr.id_cierre = $turno
      AND v.forma_pago = $id
      AND v.id_caja = $caja";
      $res = $conexion->query($sql);;
      while($row = $res->fetch_array())
      {
        if($row["valor"]=="")
        {
          $arrMonto[] = 0;
        }
        else
        {
          $arrMonto[] = $row["valor"];
        }
      }
    }

    for($i=0; $i<$contador;$i++)
    {

      $json[] = array(
        "metodo_pago" => $arrNombre[$i],
        "valor" => $arrMonto[$i]
      );
    }
    echo json_encode($json, JSON_UNESCAPED_UNICODE);
  }
  else
  {
    header('Location: ../');
  }
?>
