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

    $id_prod = $_POST['id_prod'];

    //query
    $consulta = "SELECT * from productos p join categorias c on p.categoria = c.id WHERE p.id_cl = '$id_cl' AND id_prod = $id_prod";
    $resultado = $conexion->query($consulta);
    if ($resultado->num_rows > 0){
      $json = array();
      while ($row = $resultado->fetch_array())
      {
        $json[] =array(
          'id' => $row['id_prod'],
          'nombre_prod' => ($row['nombre_prod']),
          'codigo_barra' => ($row['codigo_barra']),
          'nombre_cat' => $row['nombre_cat'],
          'cantidad' => $row['cantidad'],
          'valor_neto' => $row['valor_neto'],
          'valor_venta' => $row['valor_venta'],
          'estado' => $row['estado'],
          'creado_por' => $row['creado_por'],
          'fecha_reg' => $row['fecha_reg']
        );
      };
      echo json_encode($json, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
    }
    else
    {
      echo die("Error al agregar categoría: ". mysqli_error($conexion));
    }

  }
}
else
{
  header('Location: ../');
}
?>
