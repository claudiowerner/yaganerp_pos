<?php

session_start();

if(isset($_SESSION['user'])){
  


  $id_us = $_SESSION['user']['id'];
  $nombre = $_SESSION['user']["nombre"];
  $id_cl = $_SESSION['user']["id_cl"];
  


  require_once '../../../../conexion.php';
  
	//query
	$sql = "SELECT c.id, c.nombre_cat, u.nombre, DATE_FORMAT(c.fecha_reg, '%d-%m-%Y') AS fecha_reg
  FROM categorias c
  JOIN usuarios u 
  ON c.creado_por = u.id
  WHERE c.id_cl = $id_cl
  AND c.estado!='N'";
  $resultado = $conexion->query($sql);
  $i = 1;
  if ($resultado->num_rows > 0){
    $json = array();
    while ($row = $resultado->fetch_array())
    {
      $json[] =array(
          "item" => $i++,
          'id' => $row['id'],
          'nombre_cat' => $row['nombre_cat'],
          'creado_por' => $row['nombre'],
          'fecha_reg' => $row['fecha_reg']
      );
    }
    echo json_encode($json);
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

?>
