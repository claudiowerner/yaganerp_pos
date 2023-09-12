<?php


  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);

  error_reporting(E_ALL);
  session_start();

  $id_us = $_SESSION['user']['id'];
  $nombre = $_SESSION['user']["nombre"];
  $id_cl = $_SESSION['user']["id_cl"];
  $piso = 1;

  $idCaja = $_GET['idCaja'];
  $idCierre = $_GET['idCierre'];
  

  $horaDesde = $_GET["horaDesde"];
  $horaHasta = $_GET["horaHasta"];  

  require_once '../../../../conexion.php';


  
  $arrayCaja = array();
  $arrayNombre = array();
  $arrayVentasCaja = array();
  $arrayValorGenerado = array();
  $arrayEstado = array();

	//query

  $sql =
  "SELECT id FROM cajas WHERE id_cl = '$id_cl'";

  $res = $conexion->query($sql);
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
    $res = $conexion->query($sql);
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
    $res = $conexion->query($sql);
    while($row = $res->fetch_assoc())
    {
      if($row["ventas_caja"]!=""||$row["estado"]!=null)
      {
        $arrayVentasCaja[] = $row["ventas_caja"];
      }
      else
      {
        $arrayVentasCaja[] = 0;
      }
      if($row["estado"]!=null)
      {
        if($row["estado"]=="C")
        {
          $arrayEstado[] = "CERRADO";
        }
        else 
        {
          $arrayEstado[] = "ABIERTO";
        }
      }
      else
      {
        $arrayEstado[] = "SIN VENTAS";
      }
    }
  }

  for($i=0;$i<$cont;$i++)
  {
    $id = $arrayCaja[$i];
    $sql =
    "SELECT SUM(v.valor) AS valor 
    FROM ventas v 
    JOIN correlativo c 
    ON c.correlativo = v.id_venta
    AND v.id_cl = $id_cl 
    AND c.id_cierre = $idCierre
    AND c.caja = $id";
    $res = $conexion->query($sql);
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
      "id" => $arrayCaja[$i],
      "nom_caja" => $arrayNombre[$i],
      "valor" => $arrayValorGenerado[$i],
      "estado" => $arrayEstado[$i],
    );
  }
  echo json_encode($json, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
?>
