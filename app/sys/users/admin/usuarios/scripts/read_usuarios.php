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
    $sql = "SELECT id, nombre, user, tipo_usuario, estado, permisos, DATE_FORMAT(fecha_reg, '%d-%m-%Y %H:%i:%S') AS fecha_reg
    FROM usuarios 
    WHERE id_cl = $id_cl
    AND estado = 'S'";
    $resultado = $conexion->query($sql);;
    if ($resultado->num_rows > 0){
      $json = array();
      $permisos = array();
      $contador = 0;
      while ($row = $resultado->fetch_array())
      {
        $contador++;
        $estado = $row['estado'];

        $tipo_usuario = $row['tipo_usuario'];
        if($tipo_usuario=="1")
        {
          $tipo_usuario = "ADMINISTRADOR";
        };
        if($tipo_usuario=="2")
        {
          $tipo_usuario = "VENDEDOR";
        };

        //permisos
        $permisos = explode(",",$row["permisos"]);//array de permisos
        $mostrar_permisos = "";
        if(in_array("1", $permisos))
        {
          $mostrar_permisos = $mostrar_permisos."Administrar, ";
        }
        if(in_array("2", $permisos))
        {
          $mostrar_permisos = $mostrar_permisos."Vender, ";
        }

        $json[] =array(
          'item' => $contador,
          'id' => $row['id'],
          'nombre' => $row['nombre'],
          'user' => $row['user'],
          'tipo_usuario' => $tipo_usuario,
          'id_tipo_usuario' => $row["tipo_usuario"],
          'fecha_reg' => $row["fecha_reg"],
          'estado' => $estado,
          'permisos' => $mostrar_permisos,
          "permisos_separados" => $row["permisos"]
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
