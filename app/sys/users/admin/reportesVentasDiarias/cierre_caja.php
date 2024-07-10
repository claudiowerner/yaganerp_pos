<?php

  session_start();

  if(isset($_SESSION['user']))
  {
    $tipo = $_SESSION['user']['tipo_usuario'];
    if($tipo == 3){
      header('Location: ../');
    }
  }
  else
  {
    header('Location: ../');
  }


  $id_us = $_SESSION['user']['id'];
  $nombre = $_SESSION['user']["nombre"];
  $id_cl = $_SESSION['user']["id_cl"];
  

	$hoy = getdate();
	$fecha = $hoy['year']."-".$hoy['mon']."-".$hoy['mday']." ".$hoy["hours"].":".$hoy["minutes"].":".$hoy["seconds"];
  $idCierre = $_GET['idCierre'];

  require_once '../../../conexion.php';

  //anular ventas con valor 0
  $sql = 
  "UPDATE correlativo 
  SET estado = 'N',
  fecha_cierre = '$fecha'
  WHERE valor = 0 
  AND id_cl = $id_cl
  AND id_cierre = $idCierre";
  $res = $conexion->query($sql);;

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
