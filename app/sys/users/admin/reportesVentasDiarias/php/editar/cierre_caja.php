<?php

  session_start();
	date_default_timezone_set('America/Santiago');


  $id_us = $_SESSION['user']['id'];
  $nombre = $_SESSION['user']["nombre"];
  $id_cl = $_SESSION['user']["id_cl"];
  

	$hoy = getdate();
	$fecha = $hoy['year']."-".$hoy['mon']."-".$hoy['mday']." ".$hoy["hours"].":".$hoy["minutes"].":".$hoy["seconds"];
  $idCierre = $_POST['id'];

	require_once '../../../../../conexion.php';

	//Comprobar si existen mesas con ventas abiertas

	$sql = 
  "SELECT * FROM correlativo c
  WHERE c.estado = 'A' 
  AND caja = $idCierre
  AND c.id_cl = '$id_cl'";
  $resultado = $conexion->query($sql);;

  //Si no existen mesas abiertas (num_rows debe ser == 0)
  if ($resultado->num_rows == 0){
    
    //obtener nombre de caja al cerrar
    $nomCaja = "";
    $sql = 
    "SELECT nombre 
    FROM cierre_caja 
    WHERE id_cl = '$id_cl'
    AND id = '$idCierre';";
    $resultado = $conexion->query($sql);;
    while($row = $resultado->fetch_array())
    {
      $nomCaja = $row["nombre"];
    }

    //Cierre de caja
    $sql = 
    "UPDATE cierre_caja 
    SET hasta = '$fecha', 
    estado = 'C' 
    WHERE id_cl = '$id_cl' 
    AND id = $idCierre;";
    $resultado = $conexion->query($sql);;
    if($resultado)
    {
      echo "Cierre de caja '$nomCaja' realizado correctamente";
    }
    else
    {
      echo "Error al cerrar la caja: ". mysqli_error($conexion);
    }
  }
  else
  {
    echo "No se puede cerrar caja ya que existen ventas aún activas";
  }



?>
