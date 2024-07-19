<?php

session_start();

if(isset($_SESSION['user']))
{
  $tipo = $_SESSION['user']['tipo_usuario'];
  if($tipo == 3){
    header('Location: ../');
  }
}
else
{
  header('Location: ../');
}


  $id_us = $_SESSION['user']['id'];
  $nombre = $_SESSION['user']["nombre"];
  $id_cl = $_SESSION['user']["id_cl"];
  


  require_once '../../../../../conexion.php';

	//query
	$sql = "SELECT nom_fantasia, razon_social, giro, direccion, correo, telefono FROM cliente WHERE id = $id_cl ";
    $resultado = $conexion->query($sql);;
    if ($resultado->num_rows > 0){
    $json = array();
    while ($row = $resultado->fetch_array()) {
    $json[] =array(
         'nom_fantasia' => $row['nom_fantasia'],
         'razon_social' => $row['razon_social'],
         'direccion' => $row['direccion'],
         'correo' => $row['correo'],
         'telefono' => $row['telefono'],
         'giro' => $row['giro']
        );
    };
  echo json_encode($json, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
 }

?>
