<?php

  session_start();

  if(isset($_SESSION['user']))
  {
    $nCaja = $_GET['nCaja'];
    $idVenta = $_GET['idVenta'];


    require_once '../../../../conexion.php';

    //query



    $consulta = 
    "SELECT descto FROM ventas WHERE id_cl = $id_cl AND id_venta = $idVenta" ;
    $resultado = $conexion->query($consulta);
    $json = array();
    if ($resultado->num_rows > 0){
      while ($row = $resultado->fetch_array()) {
        $json[] =array(
          'descto' => $row['descto']
        );
      };
    }
    echo json_encode($json);
  }
  else
  {
    header('Location: ../');
  }
?>
