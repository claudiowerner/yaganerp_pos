<?php


error_reporting(E_ALL);
ini_set('display_errors', 'On');
session_start();
  require_once '../../../conexion.php';
    $id = $_POST["id"];
    //query
    $consulta =
    "SELECT id, nombre, rut, estado, nom_fantasia, razon_social, direccion, correo, telefono, plan_comprado, 
    fecha_pago FROM cliente WHERE id = $id;";
    $resultado = $conexion->query($consulta);
    if ($resultado->num_rows > 0){
      $json = array();
      while ($row = $resultado->fetch_array())
      {
        $estado = $row['estado'];
        if($estado=="S")
        {
          $estado = "ACTIVO";
        }
        else
        {
          $estado = "INACTIVO";
        }
        $json[] =array(
          'id' => $row['id'],
          'nombre' => $row['nombre'],
          'rut' => $row['rut'],
          'estado' => $estado,
          'correo' => $row['correo'],
          'telefono' => $row['telefono'],
          'plan_comprado' => $row['plan_comprado'],
          'nom_fantasia' => $row['nom_fantasia'],
          'razon_social' => $row['razon_social'],
          'direccion' => $row['direccion'],
          'fecha_pago' => $row['fecha_pago']
        );
      };
      echo json_encode($json, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
    }
    else
    {
      echo die("Error al agregar categoría: ". mysqli_error($conexion));
    }
?>
