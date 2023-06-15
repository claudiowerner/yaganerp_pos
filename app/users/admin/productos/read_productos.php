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
    "SELECT p.id_prod, p.nombre_prod, p.categoria, p.cantidad, smp.estado AS estado_stock, p.valor_neto, p.valor_venta, p.es_acompanamiento, p.tiene_acompanamiento, p.comanda_cocina, p.comanda_bar, p.creado_por, p.estado, p.fecha_reg, c.nombre_cat 
    FROM productos p 
    JOIN categorias c ON p.categoria = c.id 
    JOIN stock_minimo_producto smp ON smp.id_cl = p.id_cl
    WHERE p.id_cl = '$id_cl'";
    $resultado = $conexion->query($consulta);
    if ($resultado->num_rows > 0){
      $json = array();
      while ($row = $resultado->fetch_array())
      {
        $es_acom = $row['es_acompanamiento'];
        $tiene_acom = $row['tiene_acompanamiento'];
        $estado_stock = "";

        if($es_acom == "S")
        {
          $es_acom="SI";
        }
        else
        {
          $es_acom="NO";
        };

        if($tiene_acom == "S")
        {
          $tiene_acom="SI";
        }
        else
        {
          $tiene_acom="NO";
        };

        $comanda_cocina = $row['comanda_cocina'];
        if($comanda_cocina == "S")
        {
          $comanda_cocina="SI";
        }
        else
        {
          $comanda_cocina="NO";
        };

        $comanda_bar = $row['comanda_bar'];
        if($comanda_bar == "S")
        {
          $comanda_bar="SI";
        }
        else
        {
          $comanda_bar="NO";
        };

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
          'nombre_prod' => ($row['nombre_prod']),
          'nombre_cat' => $row['nombre_cat'],
          'cantidad' => $estado_stock,
          'valor_neto' => $row['valor_neto'],
          'valor_venta' => $row['valor_venta'],
          'es_acom' => $es_acom,
          'tiene_acom' => $tiene_acom,
          'comanda_cocina' => $comanda_cocina,
          'comanda_bar' => $comanda_bar,
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
