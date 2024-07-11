<?php

session_start();

if(isset($_SESSION['user'])){


  $id_us = $_SESSION['user']['id'];
  $nombre = $_SESSION['user']["nombre"];
  $id_cl = $_SESSION['user']["id_cl"];
  

  require_once '../../../../conexion.php';

	//query
	$sql = "SELECT id, nombre_cat FROM categorias WHERE id_cl = $id_cl AND estado!='N'";
  $resultado = $conexion->query($sql);;
  if ($resultado->num_rows > 0){
  $json = array();
   while ($row = $resultado->fetch_array()) {
     $json[] =array(
         'id' => $row['id'],
         'nombre_cat' => $row['nombre_cat']
        );
    };
   echo json_encode($json);
  }
}

?>
