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

	//query

  $sql = 
  "SELECT id 
  FROM cajas 
  WHERE id_cl = $id_cl";

  $query = mysqli_query($conexion, $sql);

  $id_caja = array();
  while($row = $query->fetch_array())
  {
    $id_caja[] = $row["id"];
  }

  $contador = count($id_caja);

  $array_desglose = array();
  for($i=0;$i<$contador;$i++)
  {
    $id = $id_caja[$i];
    $sql = "SELECT c.id, c.nom_caja, c.estado, SUM(corr.valor) AS valor
    FROM cajas c 
    JOIN correlativo corr
    WHERE c.id_cl = $id_cl
    AND corr.caja = $id
    AND corr.id_cierre = $idCierre
    AND c.id = $id
    GROUP BY c.id";
    $res = mysqli_query($conexion, $sql);
    while($row = $res->fetch_array())
    {
      $array_desglose[] = array(
        "id" => $row["id"],
        "nom_caja" => $row["nom_caja"],
        "estado" => $row["estado"],
        "valor" => $row["valor"],
      );
    }
  }
  echo json_encode($array_desglose, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
?>
