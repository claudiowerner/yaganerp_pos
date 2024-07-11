<?php

session_start();



  $id_us = $_SESSION['user']['id'];
  $nombre = $_SESSION['user']["nombre"];
  $id_cl = $_SESSION['user']["id_cl"];
  


  require_once '../../../../conexion.php';

	//query
	$sql = "SELECT * FROM proveedores WHERE id_cl = $id_cl;";
  $resultado = $conexion->query($sql);;
  if ($resultado->num_rows > 0){
  $json = array();
   while ($row = $resultado->fetch_array()) {
     $json[] =array(
         'id' => $row['id'],
         'nombre_proveedor' => $row['nombre_proveedor']
     );
   };
   echo json_encode($json);
 }

?>
