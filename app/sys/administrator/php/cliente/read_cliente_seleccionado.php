<?php


error_reporting(E_ALL);
ini_set('display_errors', 'On');
session_start();
  require_once '../../../conexion.php';
    $id = $_POST["id"];
    //query
    $sql =
    "SELECT c.id, c.nombre, c.rut, c.estado, c.nom_fantasia, 
    c.razon_social, c.direccion, c.correo, c.telefono, 
    c.plan_comprado, pg.fecha_desde, pg.fecha_hasta, pg.estado AS estado_pago, c.giro
    FROM cliente c
    JOIN pago_cliente pg 
    ON c.id = pg.id_cl
    WHERE c.id = $id;";
    $resultado = $conexion->query($sql);;
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
          'fecha_desde' => $row['fecha_desde'],
          'fecha_hasta' => $row['fecha_hasta'],
          'estado_pago' => $row['estado_pago'],
          'giro' => $row['giro']
        );
      };
      echo json_encode($json, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
    }
    else
    {
      echo die("Error al agregar categoría: ". mysqli_error($conexion));
    }
?>
