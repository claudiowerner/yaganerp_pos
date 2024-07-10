<?php

session_start();

if(isset($_SESSION['user'])){
  $tipo = $_SESSION['user']['tipo_usuario'];


  $id_us = $_SESSION['user']['id'];
  $nombre = $_SESSION['user']["nombre"];
  $id_cl = $_SESSION['user']["id_cl"];
  


  require_once '../../../../../conexion.php';



    //query
    $sql = 
    "SELECT * FROM metodo_pago
    WHERE id_cl = 0";
    $resultado = $conexion->query($sql);;
    if ($resultado->num_rows > 0){
      $json = array();
      while ($row = $resultado->fetch_array()) {
        $json[] =array(
          'id' => $row['id'],
          'nombre_opcion' => $row['nombre_metodo_pago']
        );
      }

      //consulta tabla config
      $sql = 
      "SELECT * FROM metodo_pago 
      WHERE id_cl = '$id_cl' 
      AND estado = 'S'";
      $resultado = $conexion->query($sql);;
      if($resultado->num_rows > 0)
      {
        while($row = $resultado->fetch_array())
        {
          $json[] = $json + array(  
            'id' => $row['id'],
            'nombre_opcion' => $row['nombre_metodo_pago']
          );
        }
      }
      echo json_encode($json, JSON_UNESCAPED_UNICODE);
    }
  }

?>