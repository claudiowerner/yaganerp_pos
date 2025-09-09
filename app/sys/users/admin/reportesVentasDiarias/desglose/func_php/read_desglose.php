<?php


  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);

  error_reporting(E_ALL);
  session_start();

  $id_us = $_SESSION['user']['id'];
  $nombre = $_SESSION['user']["nombre"];
  $id_cl = $_SESSION['user']["id_cl"];
  

  $idCierre = $_GET['idCierre'];
  

  $horaDesde = $_GET["horaDesde"];
  $horaHasta = $_GET["horaHasta"];  

  require_once '.././../../../../conexion.php';
  require_once '.././../../../../php/mb_encoding.php';


  
  $arrayCaja = array();
  $arrayNombre = array();
  $arrayVentasCaja = array();
  $arrayValorGenerado = array();
  $arrayEstado = array();

  //setear charset
  $conexion -> set_charset("utf8");
	//query
  $sql =
  "SELECT c.id, v.valor, c.nom_caja, c.estado
  FROM cajas c
  JOIN ventas v
  ON v.id_caja = c.id
  JOIN correlativo corr
  ON corr.id_cierre=$idCierre
  WHERE v.id_cl = '$id_cl'
  HAVING SUM(v.valor)>0";


  $res = $conexion->query($sql);
  while($row = $res->fetch_assoc())
  {
    $nom_caja = $row["nom_caja"];
    if($row["estado"]=="N")
    {
      $nom_caja = $nom_caja. "<br>(CAJA ELIMINADA)";
    }
    $arrayCaja[] = $row["id"];
    $arrayNombre[] = mb_encoding($nom_caja);
  }

  $cont = count($arrayCaja);
  
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
    
    $valor = 0;
    $descto = 0;
    $valorDescto = 0;
    $valorTotal = 0;
    $id = $arrayCaja[$i];
    $sql =
    "SELECT SUM((v.valor - v.descto)*v.cantidad) AS valor
    FROM ventas v 
    JOIN correlativo c 
    ON c.correlativo = v.id_venta
    AND v.id_cl = $id_cl 
    AND c.id_cierre = $idCierre
    AND c.caja = $id
    AND v.estado = 'C'";
    $valorGenerado = 0;
    $res = $conexion->query($sql);
    if($res->num_rows!=0)
    {
      while($row = $res->fetch_assoc())
      {
        if($row["valor"]!="")
        {
          $valorGenerado = $row["valor"];
        }
        else
        {
          $valorGenerado = 0;
        }
        $arrayValorGenerado[] = round($valorGenerado);
      }
    }
    else
    {
      $arrayValorGenerado[] = round($valorGenerado);
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
