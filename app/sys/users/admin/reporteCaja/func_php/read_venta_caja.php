<?php

session_start();


  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);

  error_reporting(E_ALL);

  $id_us = $_SESSION['user']['id'];
  $nombre = $_SESSION['user']["nombre"];
  $id_cl = $_SESSION['user']["id_cl"];
  

  require_once '../../../../conexion.php';
  require_once '../../../../php/mb_encoding.php';

	//arrays
  $arrayCaja = array();
  $arrayNombre = array();
  $arrayVentasCaja = array();
  $arrayValorGenerado = array();
  $arrayEstado = array();

  //set charset
  $conexion -> set_charset("utf8");
  //query
  $sql =
  "SELECT id, estado
  FROM cajas 
  WHERE id_cl = '$id_cl'
  AND estado = 'S'";

  $res = $conexion->query($sql);;
  while($row = $res->fetch_assoc())
  {
    $arrayCaja[] = $row["id"];
    $arrayEstado[] = $row["estado"];
  }

  //Agregar las cajas eliminadas a la lista
  $sql = "SELECT c.id, c.estado
  FROM cajas c
  JOIN ventas v 
  ON v.id_caja = c.id
  WHERE c.id_cl = $id_cl
  HAVING SUM(v.cantidad*v.valor)>1";
  $res = $conexion->query($sql);;
  while($row = $res->fetch_assoc())
  {
    $arrayCaja[] = $row["id"];
    $arrayEstado[] = $row["estado"];
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
      $arrayNombre[] = mb_encoding($row["nom_caja"]);
    }
  }
  
  for($i=0;$i<$cont;$i++)
  {
    $id = $arrayCaja[$i];
    $sql =
    "SELECT COUNT(caja) AS ventas_caja, estado 
    FROM correlativo 
    WHERE caja = $id 
    AND id_cl = '$id_cl'
    AND estado = 'C'";
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
    "SELECT SUM(valor) AS valor 
    FROM ventas 
    WHERE id_caja = $id 
    AND id_cl = $id_cl
    AND estado = 'C'";
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
    $nombre_caja = $arrayNombre[$i];
    if($arrayEstado[$i]=="N")
    {
      $nombre_caja = "$nombre_caja <br>(Caja eliminada)";
    }
    $json[] = array(
      "caja" => $arrayCaja[$i],
      "nom_caja" => $nombre_caja,
      "ventas_caja" => $arrayVentasCaja[$i],
      "valor_total" => $arrayValorGenerado[$i],
    );
    sort($json);
  }
  
  echo json_encode($json, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);

?>
