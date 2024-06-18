<?php

session_start();

if(isset($_SESSION['user'])){
  


  $id_us = $_SESSION['user']['id'];
  $nombre = $_SESSION['user']["nombre"];
  $id_cl = $_SESSION['user']["id_cl"];
  $piso = 1;


  require_once '../../../conexion.php';
  
	//query
	$sql = "SELECT * FROM categorias WHERE id_cl = $id_cl ";
  $resultado = $conexion->query($sql);;
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
