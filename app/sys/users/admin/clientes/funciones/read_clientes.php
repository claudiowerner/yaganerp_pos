<?php


error_reporting(E_ALL);
ini_set('display_errors', 'On');
session_start();
require_once '../../../../conexion.php';

if(isset($_SESSION['user'])){
  $tipo = $_SESSION['user']['tipo_usuario'];
  if($tipo == 1)
  {
    $id_us = $_SESSION['user']['id'];
    $nombre = $_SESSION['user']["nombre"];
    $id_cl = $_SESSION['user']["id_cl"];

    //definicion de arrays
    $arrId = array();
    $arrRut = array();
    $arrNombre = array();
    $arrApellido = array();
    $arrNombreUsuario = array();
    $arrFechaRegistro = array();
    $arrTotalCuentas = array();

    //consultar ID del cliente 
    $sql = "SELECT id 
    FROM clientes_negocio 
    WHERE id_cl = $id_cl 
    AND estado!='N'
    GROUP BY id";
    $res = $conexion->query($sql);;
    if($res->num_rows>0)
    {
      while($row=$res->fetch_array())
      {
        $arrId[] = $row["id"];
      }
    }

    $largo_array_id = count($arrId);
    //consultar rut
    for($i=0; $i<$largo_array_id; $i++)
    {
      $id = $arrId[$i];
      $sql = "SELECT rut 
      FROM clientes_negocio 
      WHERE id = $id
      AND id_cl = $id_cl";

      $res = $conexion->query($sql);;
      if($res->num_rows>0)
      {
        while($row = $res->fetch_array())
        {
          $arrRut[] = $row["rut"];
        }
      }
    }

    //consultar nombre, apellido, estado, nombre del usuario creador del registro y fecha del registro
    for($i=0; $i<$largo_array_id; $i++)
    {
      $id = $arrId[$i];
      $sql = "SELECT cln.rut, cln.nombre, cln.apellido, us.nombre AS nombre_usuario, 
      DATE_FORMAT(cln.fecha_registro, '%d-%m-%Y') AS fecha_registro
      FROM clientes_negocio cln 
      JOIN usuarios us 
      ON cln.creado_por = us.id
      WHERE cln.id = $id
      AND cln.id_cl = $id_cl";

      $res = $conexion->query($sql);;
      if($res->num_rows>0)
      {
        while($row = $res->fetch_array())
        {
          $arrNombre[] = $row["nombre"];
          $arrApellido[] = $row["apellido"];
          $arrNombreUsuario[] = $row["nombre_usuario"];
          $arrFechaRegistro[] = $row["fecha_registro"];
          
          
        }
      }
    }

    //obtener número total de cuentas según rut
    for($i=0; $i<$largo_array_id; $i++)
    {
      $rut = $arrRut[$i];
      $sql = "SELECT COUNT(id) AS total_cuentas 
      FROM cuenta_corriente 
      WHERE rut = '$rut' 
      AND id_cl = $id_cl
      AND estado != 'N'";

      $res = $conexion->query($sql);;
      if($res->num_rows>0)
      {
        while($row = $res->fetch_array())
        {
          $arrTotalCuentas[] = $row["total_cuentas"];
        }
      }
    }

    //definicion array json
    $json = array();

    //rellenado array json
    if($largo_array_id>0)
    {
      for($i=0; $i<$largo_array_id; $i++)
      {
        $json[] = array(
          "item" => ($i+1),
          "id" => $arrId[$i],
          "rut" => $arrRut[$i],
          "nombre" => $arrNombre[$i],
          "apellido" => $arrApellido[$i],
          "nombre_usuario" => $arrNombreUsuario[$i],
          "fecha_registro" => $arrFechaRegistro[$i],
          "total_cuentas" => $arrTotalCuentas[$i]
        );
      }
    }
    else
    {
      echo '{
        "sEcho": 1,
        "iTotalRecords": "0",
        "iTotalDisplayRecords": "0",
        "aaData": []
        }';
        die();
    }


    
    
      echo json_encode($json, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
    }
  }
  

else
{
  header('Location: ../');
}
?>
