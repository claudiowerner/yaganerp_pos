<?php

session_start();


  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);

  error_reporting(E_ALL);

  $id_us = $_SESSION['user']['id'];
  $nombre = $_SESSION['user']["nombre"];
  $id_cl = $_SESSION['user']["id_cl"];
  

  
  require_once '../../../../../../conexion.php';
  
  //rellenar array de id de producto
  $arrId = array();
  $arrNombre = array();
  $arrCantidad = array();
  $arrayValor = array();
  $json = array();

	//query
	$sql = "SELECT p.id_prod FROM productos p
    JOIN ventas v 
    ON v.producto = p.id_prod
    WHERE p.id_cl = $id_cl
    AND p.estado != 'N'
    AND v.estado != 'N'
    GROUP BY p.id_prod";
    $res = $conexion->query($sql);

    if($res->num_rows>0)
    {
      while ($row = $res->fetch_array())
      {
        $arrId[] = $row["id_prod"];
      };

      $length = count($arrId);
      //rellenar array nombre 
      for($i=0;$i<$length;$i++)
      {
        $id = $arrId[$i];
        $sql = "SELECT p.nombre_prod FROM productos p
        WHERE p.id_cl = $id_cl
        AND p.estado != 'N'
        AND p.id_prod = $id
        GROUP BY p.id_prod";
        $res = $conexion->query($sql);
        while($row = $res->fetch_array())
        {
          $arrNombre[] = $row["nombre_prod"];
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
      //rellenar array con valor en dinero generado por producto
      for($i=0;$i<$length;$i++)
      {
        $id = $arrId[$i];
        $sql = "SELECT SUM(valor) AS valor
        FROM ventas 
        WHERE id_cl = $id_cl
        AND producto = $id
        AND estado = 'C'";
        $res = $conexion->query($sql);
        while($row = $res->fetch_array())
        {
          $valor = 0;
          if($row["valor"]!=""||$row["valor"]!=null)
          {
            $valor = $row["valor"];
          }
          $arrayValor[] = $valor;
        }
      }
      for($i=0;$i<$length;$i++)
      {
        $json[] = array(
          "nombre_producto" => $arrNombre[$i],
          "cantidad" => $arrCantidad[$i],
          "valor" => $arrayValor[$i]
        );
      }
      
    }
    
    echo json_encode($json, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);

?>
