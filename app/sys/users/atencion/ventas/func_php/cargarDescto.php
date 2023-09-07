<?php

  session_start();

  if(isset($_SESSION['user']))
  {
    $id_cl = $_SESSION['user']["id_cl"];
    $idVenta = $_POST['id_venta'];


    require_once '../../../../conexion.php';

    //query



    $consulta = 
    "SELECT descto FROM ventas WHERE id_cl = $id_cl AND id_venta = $idVenta AND estado = 'A'" ;
    $resultado = $conexion->query($consulta);
    $descto = 0;
    if ($resultado->num_rows > 0){
      while ($row = $resultado->fetch_array())
      {
        $descto = $row['descto'];
      }
      echo $descto;
    }
    else
    {
      header('Location: ../');
    }
  }
?>
