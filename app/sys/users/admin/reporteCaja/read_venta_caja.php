<?php

session_start();


  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);

  error_reporting(E_ALL);

  $id_us = $_SESSION['user']['id'];
  $nombre = $_SESSION['user']["nombre"];
  $id_cl = $_SESSION['user']["id_cl"];
  $piso = 1;

  require_once '../../../conexion.php';

	//query
  $arrayCaja = array();
  $arrayNombre = array();
  $arrayVentasCaja = array();
  $arrayValorGenerado = array();
  $arrayEstado = array();

  $sql =
  "SELECT id FROM cajas WHERE id_cl = '$id_cl'";

  $res = $conexion->query($sql);;
  while($row = $res->fetch_assoc())
  {
    $arrayCaja[] = $row["id"];
  }

  $cont = count($arrayCaja);


  for($i=0;$i<$cont;$i++)
  {
    $id = $arrayCaja[$i];
    $sql =
    "SELECT nom_caja FROM cajas WHERE id = '$id' AND id_cl = '$id_cl'";
    $res = $conexion->query($sql);;
    while($row = $res->fetch_assoc())
    {
      $arrayNombre[] = $row["nom_caja"];
    }
  }
  
  for($i=0;$i<$cont;$i++)
  {
    $id = $arrayCaja[$i];
    $sql =
    "SELECT COUNT(caja) AS ventas_caja, estado FROM correlativo WHERE caja = $id AND id_cl = '$id_cl'";
    $res = $conexion->query($sql);;
    while($row = $res->fetch_assoc())
    {
      if($row["ventas_caja"]!=""||$row["estado"]!="")
      {
        $arrayVentasCaja[] = $row["ventas_caja"];
        $arrayEstado[] = $row["estado"];
      }
      else
      {
        $arrayVentasCaja[] = 0;
        $arrayEstado[] = 0;
      }
    }
  }

  for($i=0;$i<$cont;$i++)
  {
    $id = $arrayCaja[$i];
    $sql =
    "SELECT SUM(valor) AS valor FROM ventas WHERE id_caja = $id AND id_cl = $id_cl";
    $res = $conexion->query($sql);;
    while($row = $res->fetch_assoc())
    {
      if($row["valor"]!="")
      {
        $arrayValorGenerado[] = round($row["valor"],0);
      }
      else
      {
        $arrayValorGenerado[] = 0;
      }
    }
  }

  $json = array();

  for($i=0;$i<$cont;$i++)
  {
    $json[] = array(
      "caja" => $arrayCaja[$i],
      "nom_caja" => $arrayNombre[$i],
      "ventas_caja" => $arrayVentasCaja[$i],
      "valor_total" => $arrayValorGenerado[$i],
    );
  }
  
  echo json_encode($json, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);

?>
