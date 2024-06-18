<?php

  session_start();

    require_once '../../../../conexion.php';

    //query
    $id_cl = $_SESSION['user']["id_cl"];
    $idVenta = $_POST['id_venta'];

    $sql = 
    "SELECT descto FROM ventas WHERE id_cl = $id_cl AND estado = 'A' AND id_venta = $idVenta GROUP BY id_venta" ;
    $resultado = $conexion->query($sql);;
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
