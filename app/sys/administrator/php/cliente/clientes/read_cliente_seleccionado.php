<?php


error_reporting(E_ALL);
ini_set('display_errors', 'On');
session_start();
    date_default_timezone_set('America/Santiago');
require_once '../../../../conexion.php';
    $id = $_POST["id"];
    //query
    $sql =
    "SELECT c.id, 
    c.nombre, 
    c.rut, 
    c.correo, 
    c.telefono, 
    c.direccion, 
    c.nom_fantasia, 
    c.razon_social, 
    c.giro, 
    c.plan_comprado, 
    c.plazo_pago, 
    pc.metodo_pago
    FROM cliente c 
    JOIN pago_cliente pc
    ON pc.id_cl = c.id
    WHERE c.id = $id";
    $resultado = $conexion->query($sql);
    if ($resultado->num_rows > 0){
      $json = array();
      while ($row = $resultado->fetch_array())
      {

        $json = array(
          'id' => $row['id'],
          'nombre' => $row['nombre'],
          'rut' => $row['rut'],
          'correo' => $row['correo'],
          'telefono' => $row['telefono'],
          'direccion' => $row['direccion'],
          'nom_fantasia' => $row['nom_fantasia'],
          'razon_social' => $row['razon_social'],
          'giro' => $row['giro'],
          'plan_comprado' => $row['plan_comprado'],
          'plazo_pago' => $row['plazo_pago'],
          'metodo_pago' => $row['metodo_pago'],
        );
      };
      echo json_encode($json, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
    }
    else
    {
      echo die("Error al agregar categoría: ". mysqli_error($conexion));
    }
?>
