

<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 'On');


if(isset($_SESSION['user'])){
  $tipo = $_SESSION['user']['tipo_usuario'];
  if($tipo == 1){
    $id_us = $_SESSION['user']['id'];
    $nombre = $_SESSION['user']["nombre"];
    $id_cl = $_SESSION['user']["id_cl"];
    $año = $_POST["año"];
    

    require_once '../../../../conexion.php';

    $datos = array();//acá se guardan los datos emanados desde la base de datos

    $sql = "SELECT month(fecha) AS mes
    FROM correlativo 
    WHERE id_cl = $id_cl 
    AND year(fecha) = '$año' GROUP BY MONTH(fecha)";
    $res = $conexion->query($sql);;
    while($row=$res->fetch_array())
    {
      $datos[] = array(
        "mes"=>$row["mes"]
      );
    }
    echo json_encode($datos);
  }
}
else
{
  header('Location: ../');
}
?>
