<?php

session_start();

if(isset($_SESSION['user'])){
  $tipo = $_SESSION['user']['tipo_usuario'];


  $id_us = $_SESSION['user']['id'];
  $nombre = $_SESSION['user']["nombre"];
  $id_cl = $_SESSION['user']["id_cl"];
  $piso = 1;


  require_once '../../../conexion.php';



    //query
    $consulta = "SELECT id, nombre FROM pisos WHERE id_cl = $id_cl and estado = 'S'";
  $resultado = $conexion->query($consulta);
  if ($resultado->num_rows > 0){
  $json = array();
   while ($row = $resultado->fetch_array()) {
     $json[] =array(
         'id' => $row['id'],
         'nombre' => $row['nombre']
       );
   }
   echo json_encode($json);
 }
}

?>