<?php

session_start();
if(isset($_SESSION['user']['id_cl'])){
  $tipo = $_SESSION['user']['tipo_usuario'];

  $id_us = $_SESSION['user']['id'];
  $nombre = $_SESSION['user']["nombre"];
  $id_cl = $_SESSION['user']["id_cl"];
  $piso = 1;
  $ubic = $_GET['nroUbic'];
  require_once '../../../conexion.php';

	//query
	$consulta = "SELECT * from mesas where id_cl = $id_cl 
  AND ubicacion = $ubic 
  AND estado = 'S'
  AND unificada = 'N' 
  ORDER BY id ASC";
  $resultado = $conexion->query($consulta);

  if ($resultado->num_rows > 0){
    $json = array();
    while ($row = $resultado->fetch_array())
    {
      $json[] =array(
        'id' => $row['id'],
        'num_mesa' => $row['num_mesa'],
        'nom_mesa' => $row['nom_mesa'],
        'estado_gral' => $row['estado_gral'],
        'ubicacion' => $row['ubicacion']
      );
    }
    echo json_encode($json);
  }
  else
  {
    echo json_encode("s/r");
  }
}
else
{
  echo "usuario no seteado";
}


?>
