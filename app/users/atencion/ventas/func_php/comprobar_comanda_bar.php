<?php


error_reporting(E_ALL);
ini_set('display_errors', 'On');
session_start();

if(isset($_SESSION['user'])){
  $tipo = $_SESSION['user']['tipo_usuario'];
  $id_us = $_SESSION['user']['id'];
    $nombre = $_SESSION['user']["nombre"];
    $id_cl = $_SESSION['user']["id_cl"];
    $piso = 1;

    $nMesa = $_GET['nMesa'];

    require_once '../../../../conexion.php';

    //query
    $consulta = "SELECT count(*) AS n_rows FROM ventas v
    JOIN productos p ON p.id_prod = v.producto 
    WHERE v.id_cl = $id_cl AND v.estado = 'A' 
    AND v.mesa = '$nMesa' 
    AND p.comanda_bar='S' ORDER BY v.id ASC";
    $resultado = $conexion->query($consulta);

    $claveOk = 0;
    while($row = $resultado->fetch_array())
    {
      $claveOk = $row["n_rows"];
    }
    echo $claveOk;
}
else
{
  header('Location: ../');
}
?>
