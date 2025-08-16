<?php

session_start();



  $id_us = $_SESSION['user']['id'];
  $nombre = $_SESSION['user']["nombre"];
  $id_cl = $_SESSION['user']["id_cl"];
  

  require_once '../../../../../../conexion.php';
  require_once '../../../../../../php/mb_encoding.php';

  //setear charset
  $conexion -> set_charset("utf8");
	//query
	$sql = "SELECT * FROM proveedores WHERE id_cl = $id_cl;";
  $resultado = $conexion->query($sql);;
  if ($resultado->num_rows > 0){
    $json = array();
    while ($row = $resultado->fetch_array()) {
      $json[] =array(
        'id' => $row['id'],
        'nombre_proveedor' => mb_encoding($row['nombre_proveedor'])
      );
    };
    echo json_encode($json);
 }

?>
