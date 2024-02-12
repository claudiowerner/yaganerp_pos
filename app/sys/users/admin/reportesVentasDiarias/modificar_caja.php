<?php


error_reporting(E_ALL);
ini_set('display_errors', 'On');
session_start();

if(isset($_SESSION['user'])){
  $tipo = $_SESSION['user']['tipo_usuario'];
  $id_us = $_SESSION['user']['id'];
  $nombre = $_SESSION['user']["nombre"];
  $id_cl = $_SESSION['user']["id_cl"];
  $idCaja = $_POST["id"];
  $nomCaja = $_POST["nombre"];

  require_once '../../../conexion.php';

  //query
  $sql = 
  "UPDATE cierre_caja 
  SET nombre = '$nomCaja'
  WHERE id_cl = $id_cl
  AND id = $idCaja";
  $res = $conexion->query($sql);

  $arrRespta = array();
  if($res)
  {
    $arrRespta = array(
      "titulo"=>"Excelente",
      "mensaje"=>"Nombre de caja modificado correctamente",
      "tipo"=>"success"
    );
  }
  else
  {
    $arrRespta = array(
      "titulo"=>"Error",
      "mensaje"=>"Ha ocurrido un error: ".$conexion->error,
      "tipo"=>"error"
    );
  }
  echo json_encode($arrRespta);
}
else
{
  header('Location: ../');
}
?>
