<?php

session_start();



  $id_us = $_SESSION['user']['id'];
  $nombre = $_SESSION['user']["nombre"];
  $id_cl = $_SESSION['user']["id_cl"];
  $nomCat = $_POST['nomCat'];
  

  require_once '../../../../conexion.php';
	//query
  $sql = "SELECT id FROM categorias 
  WHERE id_cl = $id_cl 
  AND nombre_cat = '$nomCat'";
  $resultado = $conexion->query($sql);;
  if ($resultado->num_rows > 0){
    $json = array();
    while ($row = $resultado->fetch_array()) {
      $json[] =array(
        'id' => $row['id']
      );
    };
   echo json_encode($json);
 }

?>
