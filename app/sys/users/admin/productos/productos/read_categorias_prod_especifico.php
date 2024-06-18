<?php

session_start();

if(isset($_SESSION['user'])){
  $tipo = $_SESSION['user']['tipo_usuario'];
 if($tipo == 3){
   header('Location: ../');
 }
 }else{
 header('Location: ../');
 }


  $id_us = $_SESSION['user']['id'];
  $nombre = $_SESSION['user']["nombre"];
  $id_cl = $_SESSION['user']["id_cl"];
  $nomCat = $_POST['nomCat'];
  $piso = 1;

  require_once '../../../../conexion.php';
	//query
	$sql = "SELECT id FROM categorias WHERE id_cl = $id_cl and nombre_cat = '$nomCat'";
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
