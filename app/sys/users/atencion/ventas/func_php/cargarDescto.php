<?php

  session_start();

    require_once '../../../../conexion.php';

    //query
    $id_cl = $_SESSION['user']["id_cl"];
    $idVenta = $_POST['id_venta'];

    $consulta = 
    "SELECT descto FROM ventas WHERE id_cl = $id_cl AND estado = 'A' AND id_venta = $idVenta" ;
    $resultado = $conexion->query($consulta);
    $descto = 0;
    if ($resultado->num_rows > 0)
    {
      while ($row = $resultado->fetch_array())
      {
        $descto = $row['descto'];
      }
      echo $descto;
    }
?>
