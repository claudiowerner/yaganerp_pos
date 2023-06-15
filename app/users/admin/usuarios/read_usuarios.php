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

    //query
    $consulta = "SELECT id, nombre, user, tipo_usuario, estado, permisos FROM usuarios WHERE id_cl = $id_cl";
    $resultado = $conexion->query($consulta);
    if ($resultado->num_rows > 0){
      $json = array();
      $permisos = array();
      while ($row = $resultado->fetch_array())
      {
        $estado = $row['estado'];

        if($estado=="S")
        {
          $estado = "ACTIVADO";
        }
        if($estado=="N")
        {
          $estado = "DESACTIVADO";
        }

        $tipo_usuario = $row['tipo_usuario'];
        if($tipo_usuario=="1")
        {
          $tipo_usuario = "ADMINISTRADOR";
        };
        if($tipo_usuario=="2")
        {
          $tipo_usuario = "CAJERO";
        };
        if($tipo_usuario=="3")
        {
          $tipo_usuario = "GARZÓN";
        };

        //permisos
        $permisos = explode(",",$row["permisos"]);//array de permisos
        $mostrar_permisos = "";
        if(in_array("1", $permisos))
        {
          $mostrar_permisos = $mostrar_permisos."Vender, ";
        }
        if(in_array("2", $permisos))
        {
          $mostrar_permisos = $mostrar_permisos."Pagar mesa, ";
        }
        if(in_array("3", $permisos))
        {
          $mostrar_permisos = $mostrar_permisos."Anular venta, ";
        }
        if(in_array("4", $permisos))
        {
          $mostrar_permisos = $mostrar_permisos."Cambiar mesa ";
        }

        $json[] =array(
          'id' => $row['id'],
          'nombre' => $row['nombre'],
          'user' => $row['user'],
          'tipo_usuario' => $tipo_usuario,
          'estado' => $estado,
          'permisos' => $mostrar_permisos
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
