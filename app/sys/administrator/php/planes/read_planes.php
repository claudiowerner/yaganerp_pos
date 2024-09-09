<?php


  error_reporting(E_ALL);
  ini_set("display_errors", "On");
  session_start();
  date_default_timezone_set("America/Santiago");

  
  $json = array();


  require_once "../../../conexion.php";
  //query
  $sql =
  "SELECT * FROM planes 
  WHERE estado = 'S'";
  $res = $conexion->query($sql);
  
  if ($res->num_rows > 0){
    $n_fila = 0;
    while ($row = $res->fetch_array())
    {
      $n_fila++;
      $json[] =array(
        "id" => $row["id"],
        "numero_fila" => $n_fila,
        "nombre" => $row["nombre"],
        "usuarios" => $row["usuarios"],
        "cajas" => $row["cajas"],
        "valor" => $row["valor"]
      );
    };
  }
  else
  {
    $json = array(
      "sEcho"=> 1,
      "iTotalRecords"=>"0",
      "iTotalDisplayRecords"=>"0",
      "aaData"=>[] 
    );
  }

  echo json_encode($json, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
?>
