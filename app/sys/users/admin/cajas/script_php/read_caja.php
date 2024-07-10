<?php


error_reporting(E_ALL);
ini_set('display_errors', 'On');
session_start();

if(isset($_SESSION['user'])){
  $tipo = $_SESSION['user']['tipo_usuario'];
  if($tipo == 1){
    $id_us = $_SESSION['user']['id'];
    $nombre = $_SESSION['user']["nombre"];
    $id_cl = $_SESSION['user']["id_cl"];
    

    require_once '../../../../conexion.php';

    //query
    
    $sql =
    "SELECT c.id, c.nom_caja, 
    u.nombre AS nom_usuario, c.estado,
    DATE_FORMAT(c.fecha_reg, '%d-%m-%Y') AS fecha_reg
    FROM cajas c 
    JOIN usuarios u ON u.id=c.creado_por 
    WHERE c.id_cl = '$id_cl'
    AND c.estado!='N'";
    $resultado = $conexion->query($sql);
    $contador = 1;
    if ($resultado->num_rows > 0){
      $json = array();
      while ($row = $resultado->fetch_array())
      {
        $json[] =array(
          
          'item' => $contador,
          'id' => $row['id'],
          'nombre' => $row['nom_caja'],
          'estado' => $row["estado"],
          'creado_por' => $row['nom_usuario'],
          'fecha_reg' => $row['fecha_reg']
        );
        $contador++;
      };
      echo json_encode($json, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
    }
    else
    {
      echo '{
        "sEcho": 1,
        "iTotalRecords": "0",
        "iTotalDisplayRecords": "0",
        "aaData": []
        }';    
    }

  }
}
else
{
  header('Location: ../');
}
?>
