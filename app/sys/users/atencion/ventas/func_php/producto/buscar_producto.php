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

    require_once '../../../../../conexion.php';

    //query
    $sql = 
    "SELECT p.id_prod, p.codigo_barra, c.nombre_cat, p.nombre_prod, smp.stock_minimo, smp.estado, p.cantidad, smp.estado
    FROM productos p 
    JOIN categorias c ON p.categoria = c.id 
    JOIN stock_minimo_producto smp ON p.id_cl = smp.id_cl
    WHERE p.id_cl = $id_cl
    AND p.estado = 'S' 
    GROUP BY p.id_prod";
    $resultado = $conexion->query($sql);;
    if ($resultado->num_rows > 0){
    $json = array();
    while ($row = $resultado->fetch_array()) {
      $json[] =array(
        'codigo_barra' => ($row['codigo_barra']),
        'nombre_prod' => ($row['nombre_prod']),
        'cantidad' => ($row['cantidad']),
        'nombre_cat' => ($row['nombre_cat']),
      );
    };
    echo json_encode($json, JSON_UNESCAPED_UNICODE);

  }
}
else
{
  header('Location: ../');
}
?>
