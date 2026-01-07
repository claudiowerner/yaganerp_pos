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


    require_once '../../../../../conexion.php';
    require_once '../../../../../php/mb_encoding.php';

    //definición de arrays
    $arrId = array();
    $arrNombre = array();
    $arrMonto = array();
    $valorTotal = 0;
    $json = array();


    //setear charset
    $conexion -> set_charset("utf8");
    //query
    $sql = "SELECT id, nombre_metodo_pago FROM metodo_pago";
    $res = $conexion->query($sql);
    while ($row = $res->fetch_array())
    {
      $arrId[] = $row["id"];
      $arrNombre[] = mb_encoding($row["nombre_metodo_pago"]);
    }

    //contador de número de métodos de pago
    $contador = count($arrId);
    for($i=0; $i<$contador; $i++)
    {
      $valorTotal = 0;
      $id = $arrId[$i];
      $sql = 
      "SELECT v.valor, corr.descuento, v.cantidad
      FROM ventas v
      JOIN correlativo corr
      ON corr.correlativo = v.id_venta
      WHERE v.id_cl = $id_cl 
      AND v.estado = 'C' 
      AND corr.id_cierre = $turno
      AND v.forma_pago = $id
      AND v.id_caja = $caja";
      $res = $conexion->query($sql);
      while($row = $res->fetch_array())
      {
        $valor = $row["valor"]*$row["cantidad"];
        $descto = ($valor*($row["descuento"]/100));
        $valorTotal = $valorTotal + ($valor-$descto);
      }
      $arrMonto[] = $valorTotal;
    };

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
