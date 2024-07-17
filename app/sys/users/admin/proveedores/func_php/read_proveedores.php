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
    

    require_once '../../../../conexion.php';

    //query
    $sql = 
    "SELECT id, nombre_proveedor, rut, estado, 
    DATE_FORMAT(fecha_registro, '%d-%m-%Y') AS fecha_registro
    FROM proveedores 
    WHERE id_cl = $id_cl
    AND estado != 'N'";
    $resultado = $conexion->query($sql);

    $item = 0;
    if ($resultado->num_rows > 0){
      $json = array();
      while ($row = $resultado->fetch_array())
      {
        $item++;
        $estado = $row['estado'];
        if($estado == "S")
        {
          $estado="ACTIVO";
        }
        if($estado == "N")
        {
          $estado="INACTIVO";
        };

        $json[] =array(
          "item" => $item,
          'id' => $row['id'],
          'nombre_proveedor' => ($row['nombre_proveedor']),
          'rut' => $row['rut'],
          'estado' => $estado,
          'fecha_registro' => $row['fecha_registro']
        );
      };
      echo json_encode($json, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
    }
    else
    {
      echo '{
        "sEcho": 1,
        "iTotalRecords": "0",
        "iTotalDisplayRecords": "0",
        "aaData": []
        }';    
    }

  }
}
else
{
  header('Location: ../');
}
?>
