<?php

session_start();


$id_us = $_SESSION['user']['id'];
$nombre = $_SESSION['user']["nombre"];
$id_cl = $_SESSION['user']["id_cl"];
$piso = 1;

$clave = $_POST['clave'];
$estado = $_POST['estado'];

require_once '../../../../conexion.php';

	//query
$sql = "SELECT * FROM autorizacion WHERE id_cl = $id_cl";
$resultado = mysqli_query($conexion, $sql);

if($resultado -> num_rows==0)
{
  $sql = "INSERT INTO autorizacion VALUES (null, '$id_cl', '$clave', 'S');";
  $resultado = mysqli_query($conexion, $sql);


  if($resultado)
  {
    echo "Clave creada correctamente";
  }
  else
  {
    die("Error al crear clave: ". mysqli_error($conexion));
  }
}
else
{
  $sql = "";
  if($clave=="")
  {
    $sql = "UPDATE autorizacion SET estado = '$estado' WHERE id_cl = '$id_cl';";
  }
  else
  {
    $sql = "UPDATE autorizacion SET clave = '$clave', estado = '$estado' WHERE id_cl = '$id_cl';";
  }
  $resultado = mysqli_query($conexion, $sql);
  if($resultado)
  {
    echo "Configuración de clave modificada exitosamente.";
  }
  else
  {
    die("Error al modificar clave: ". mysqli_error($conexion));
  }
}

?>
