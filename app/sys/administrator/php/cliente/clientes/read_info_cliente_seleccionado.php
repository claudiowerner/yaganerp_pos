<?php


error_reporting(E_ALL);
ini_set('display_errors', 'On');
session_start();
date_default_timezone_set('America/Santiago');
require_once '../../../../conexion.php';
    $id = $_POST["id"];
    $id_cl = "";
    $nombre = "";
    $rut = "";
    $correo = "";
    $telefono = "";
    $direccion = "";
    $estado = "";
    $nom_fantasia = "";
    $razon_social = "";
    $nombre_giro = "";
    $giro = "";
    $plazo_pago = "";
    $nombre_plazo = "";
    $plan_comprado = "";
    $fecha_registro = "";
    $fecha_desde = "";
    $fecha_hasta = "";
    //query
    $sql =
    "SELECT 
    c.id, 
    c.nombre, 
    c.rut, 
    c.correo, 
    c.telefono, 
    c.direccion, 
    c.estado, 
    c.nom_fantasia, 
    c.razon_social, 
    g.nombre AS nombre_giro,
    c.giro,
    c.plazo_pago,
    pp.nombre_plazo,
    DATE_FORMAT(c.fecha_registro, '%d-%m-%Y') AS fecha_registro,
    pl.nombre AS plan_comprado
    FROM cliente c
    JOIN giros g
    ON g.id = c.giro
    JOIN planes pl
    ON pl.id = c.plan_comprado
    JOIN plazos_pago pp
    ON pp.meses = c.plazo_pago
    WHERE c.id = $id";
    $res = $conexion->query($sql);
    if ($res->num_rows > 0){
      $json = array();
      while ($row = $res->fetch_array())
      {
        $id_cl = $row["id"]; 
        $nombre = $row["nombre"];
        $rut = $row["rut"];
        $correo = $row["correo"];
        $telefono = $row["telefono"];
        $direccion = $row["direccion"];
        $estado = $row["estado"];
        $nom_fantasia = $row["nom_fantasia"];
        $razon_social = $row["razon_social"];
        $nombre_giro = $row["nombre_giro"];
        $giro = $row["giro"];
        $plazo_pago = $row["plazo_pago"];
        $nombre_plazo = $row["nombre_plazo"];
        $plan_comprado = $row["plan_comprado"];
        $fecha_registro = $row["fecha_registro"];
      };

      $sql = "SELECT DATE_FORMAT(fecha_desde, '%d-%m-%Y') AS fecha_desde,
      DATE_FORMAT(fecha_hasta, '%d-%m-%Y') AS fecha_hasta
      FROM pago_cliente 
      WHERE id_cl = $id 
      AND periodo_actual = 'S'";
      $res = $conexion->query($sql);
      while($row = $res->fetch_array())
      {
        $fecha_desde = $row["fecha_desde"];
        $fecha_hasta = $row["fecha_hasta"];
      }

      $json = array(
        "id" => $id_cl,
        "nombre" => $nombre,
        "rut" => $rut,
        "correo" => $correo,
        "telefono" => $telefono,
        "direccion" => $direccion,
        "estado" => $estado,
        "nom_fantasia" => $nom_fantasia,
        "razon_social" => $razon_social,
        "nombre_giro" => $nombre_giro,
        "giro" => $giro,
        "plazo_pago" => $plazo_pago,
        "nombre_plazo" => $nombre_plazo,
        "plan_comprado" => $plan_comprado,
        "fecha_registro" => $fecha_registro,
        "fecha_desde" => $fecha_desde,
        "fecha_hasta" => $fecha_hasta,
      );
      echo json_encode($json, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
    }
    else
    {
      echo die("Error al agregar categoría: ". mysqli_error($conexion));
    }
?>
