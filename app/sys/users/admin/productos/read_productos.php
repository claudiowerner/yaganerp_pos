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
    $consulta = 
    "SELECT p.id_prod, p.codigo_barra, p.nombre_prod, prov.nombre_proveedor, p.categoria, p.cantidad, 
    smp.estado AS estado_stock, 
    p.valor_neto, p.valor_venta, p.margen_ganancia, p.monto_ganancia, p.descuento, u.nombre AS creado_por, 
    p.estado, DATE_FORMAT(p.fecha_reg, '%d-%m-%Y') AS fecha_reg, c.nombre_cat 
    FROM productos p 
    JOIN usuarios u 
    ON u.id = p.creado_por
    JOIN categorias c 
    ON p.categoria = c.id 
    JOIN stock_minimo_producto smp 
    ON smp.id_cl = p.id_cl
    JOIN proveedores prov 
    ON prov.id = p.proveedor
    WHERE p.id_cl = '$id_cl'
    GROUP BY id_prod";
    $resultado = $conexion->query($consulta);
    if ($resultado->num_rows > 0){
      $json = array();
      while ($row = $resultado->fetch_array())
      {

        $estado = $row['estado'];
        if($estado == "S")
        {
          $estado="ACTIVO";
        }
        if($estado == "N")
        {
          $estado="INACTIVO";
        };

        if($row["estado_stock"]=="S")
        {
          $estado_stock = $row["cantidad"];
        }
        else
        {
          $estado_stock = "Deshab...";
        }

        $json[] =array(
          'id' => $row['id_prod'],
          'codigo_barra' => ($row['codigo_barra']),
          'nombre_prod' => $row['nombre_prod'],
          'nombre_proveedor' => $row['nombre_proveedor'],
          'nombre_cat' => $row['nombre_cat'],
          'cantidad' => $estado_stock,
          'valor_neto' => "$".$row['valor_neto'],
          'margen_ganancia' => $row['margen_ganancia']."%",
          'monto_ganancia' => "$".$row['monto_ganancia'],
          'valor_venta' => "$".$row['valor_venta'],
          'descuento' => $row['descuento']."%",
          'estado' => $estado,
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
