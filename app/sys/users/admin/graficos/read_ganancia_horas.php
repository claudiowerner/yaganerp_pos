

<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
session_start();

if(isset($_SESSION['user'])){
  $tipo = $_SESSION['user']['tipo_usuario'];
  if($tipo == 1){
    $id_us = $_SESSION['user']['id'];
    $nombre = $_SESSION['user']["nombre"];
    $id_cl = $_SESSION['user']["id_cl"];
    $piso = 1;

    require_once '../../../conexion.php';

    $datos = array();//acá se guardan los datos emanados desde la base de datos
    $fecha = $_GET['fecha'];

    for($i=0;$i<=23;$i++)
    {
      $hf = $i+1;//hora final
      $sql = 
      "SELECT SUM(valor) AS valor FROM correlativo 
      WHERE id_cl = $id_cl 
      AND fecha_cierre BETWEEN '$fecha $i:00:00' AND '$fecha $hf:00:00'
      AND estado = 'C'";
      $res = $conexion->query($sql);
      while($row=$res->fetch_array())
      {
        $contenido = $row["valor"];
        if($contenido==""||$contenido==null)
        {
          $contenido=0;
        }
        $datos[] = array(
          "h".$i=>$contenido
        );
      }
    }
    echo json_encode($datos);
  }
}
else
{
  header('Location: ../');
}
?>
