

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

    //array con los meses del año
    $meses = array(
      0 => 'Enero',
      1 => 'Febrero',
      2 => 'Marzo',
      3 => 'Abril',
      4 => 'Mayo',
      5 => 'Junio',
      6 => 'Julio',
      7 => 'Agosto',
      8 => 'Septiembre',
      9 => 'Octubre',
      10 => 'Noviembre',
      11 => 'Diciembre'
    );

    $ano = $_GET['ano'];
    $datos = array();//acá se guardan los datos emanados desde la base de datos

    for($i=1;$i<=12;$i++)
    {
      $sql = 
      "SELECT sum(valor) AS valor_total 
      FROM correlativo WHERE id_cl = $id_cl
      AND date_format(fecha, '%m') = $i AND year(fecha) = $ano";
      $res = $conexion->query($sql);
      while($row=$res->fetch_array())
      {
        $contenido = $row['valor_total'];
        if($contenido==""||$contenido==null)
        {
          $contenido=0;
        }
        else
        {
          $contenido=$row['valor_total'];
        }
        $datos[] = array(
          $meses[$i-1]=>$contenido
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
