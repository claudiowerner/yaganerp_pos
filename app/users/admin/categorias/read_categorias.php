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
  $piso = 1;


  require_once '../../../conexion.php';

	//query
	$consulta = "SELECT * FROM categorias WHERE id_cl = $id_cl ";
  $resultado = $conexion->query($consulta);
  if ($resultado->num_rows > 0){
  $json = array();
  while ($row = $resultado->fetch_array())
  {
    $estado = "";
    if($row['estado']=="S")
    {
      $estado = "ACTIVO";
    }
    else
    {
      $estado = "INACTIVO";
    }
    $json[] =array(
         'id' => $row['id'],
         'nombre_cat' => $row['nombre_cat'],
         'estado' => $estado,
         'creado_por' => $row['creado_por'],
         'fecha_reg' => $row['fecha_reg']
     );
  }
  echo json_encode($json);
 }

?>
