<?php

session_start();

if(isset($_SESSION['user']))
{
  $tipo = $_SESSION['user']['tipo_usuario'];
  if($tipo == 3)
  {
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

  $nomCaja = $_GET['nomCaja'];

  $fecha = $_GET['fecha'];
  $hora = $_GET['hora'];

  require_once '../../../conexion.php';

	//query
	$consulta = 
  "INSERT INTO cierre_caja 
  VALUES (
    null, 
    '$id_cl',
    '$nomCaja', 
    '$id_us', 
    '$fecha $hora', 
    '0000-00-00 00:00:00', 
    'A', 
    '0', 
    '$fecha $hora'
  );";
  $resultado = $conexion->query($consulta);

  if($resultado)
  {
    echo "Registro de caja creado correctamente";
  }
  else
  {
    echo "Error al crear registro de caja: ".mysqli_error($conexion);
  }
?>
