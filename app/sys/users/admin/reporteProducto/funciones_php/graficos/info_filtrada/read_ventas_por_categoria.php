<?php

session_start();


  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);

  error_reporting(E_ALL);

  $id_us = $_SESSION['user']['id'];
  $nombre = $_SESSION['user']["nombre"];
  $id_cl = $_SESSION['user']["id_cl"];


  $fecha_inicio = $_POST["fecha_inicio"];
  $fecha_fin = $_POST["fecha_fin"];
  
  
  require_once '../../../../../../conexion.php';
  
  //rellenar array de id de producto
  $arrId = array();
  $arrNombre = array();
  $arrCantidad = array();
  $json = array();
  

	//query
	$sql = "SELECT id, nombre_cat 
  FROM categorias 
  WHERE id_cl = $id_cl";
    $res = $conexion->query($sql);

    if($res->num_rows>0)
    {
      while ($row = $res->fetch_array())
      {
        $arrId[] = $row["id"];
        $arrNombre[] = $row["nombre_cat"];
      };

      $length = count($arrId);
      //rellenar array nombre 
      for($i=0;$i<$length;$i++)
      {
        $id = $arrId[$i];
        $sql = "SELECT COUNT(v.cantidad) AS cantidad
        FROM productos p
        JOIN ventas v 
        ON p.id_prod = v.producto
        WHERE p.categoria = $id
        AND v.estado!='N'
        AND p.id_cl = $id_cl
        AND v.fecha_pago BETWEEN '$fecha_inicio' AND '$fecha_fin'";
        $res = $conexion->query($sql);
        while($row = $res->fetch_array())
        {
          $arrCantidad[] = $row["cantidad"];
        }
      }

      
      //rellenar array cantidad 
      for($i=0;$i<$length;$i++)
      {
        $id = $arrId[$i];
        $sql = "SELECT SUM(cantidad) AS cantidad 
        FROM ventas 
        WHERE id_cl = $id_cl 
        AND producto = $id";
        $res = $conexion->query($sql);
        while($row = $res->fetch_array())
        {
          $cantidad = 0;
          if($row["cantidad"]!=""||$row["cantidad"]!=null)
          {
            $cantidad = $row["cantidad"];
          }
          $arrCantidad[] = $cantidad;
        }
      }
      
      for($i=0;$i<$length;$i++)
      {
        $json[] = array(
          "nombre_categoria" => $arrNombre[$i],
          "cantidad" => $arrCantidad[$i]
        );
      }
      
    }
    
    echo json_encode($json, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);

?>
