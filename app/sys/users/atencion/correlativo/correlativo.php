<?php

	session_start();
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);

	error_reporting(E_ALL);
	if(isset($_SESSION['user'])){
		$tipo = $_SESSION['user']['tipo_usuario'];
     	if($tipo == 1){
       	    //header('Location: ../');
     	}
     	    }else{
    	    header('Location: ../../../../index.php');
     	}
     	require_once '../../../conexion.php';

	    $id_us = $_SESSION['user']['id'];
	    $nombre = $_SESSION['user']["nombre"];
	    $id_cl = $_SESSION['user']["id_cl"];
	    $piso = 1;
	    $idCaja = $_GET['idCaja'];
	    $nomCaja = $_GET['nomCaja'];
		$hora = $_GET['hora'];

		//obtener fecha
		$hoy = getdate();
		$fecha = $hoy['year']."-".$hoy['mon']."-".$hoy['mday']." ".$hora;


		//obtener ID venta
		$sql = "SELECT MAX(id+1) as id FROM ventas WHERE id_cl='$id_cl'";
		$r1 = $conexion->query($sql);
		$id_venta = 0;
		while($row = $r1->fetch_array())
		{
			$id_venta = $row['id'];
		}

		//obtener ID caja/turno abierto
		$idCierre = "";
		$sql = 
		"SELECT id FROM cierre_caja 
		WHERE id_cl = '$id_cl'
		AND estado = 'A'";
		
		$r = mysqli_query($conexion,$sql);

		while($row = $r->fetch_array())
		{
			$idCierre = $row["id"];
		}

		//registro tabla correlativo
		
		$id_corr = "SELECT MAX(id+1) AS id, MAX(correlativo+1) as corr, max(boleta) AS boleta FROM correlativo WHERE id_cl = '$id_cl'";
		$r_id = mysqli_query($conexion, $id_corr);
		$arr = array();
		$id=1;
		$corr=1;
		$boleta=1;

		if($r_id)
		{
			while($row = $r_id->fetch_array())
			{
				if(isset($row['id'])&&isset($row['corr'])&&isset($row['boleta']))
				{
					$id = $row['id'];
					$corr = $row['corr'];
					$boleta = $row['boleta'];
				}
			}
		}
		else
		{
			echo "No se generó el ID";
		}		
		
		$correlativo = "INSERT INTO correlativo VALUES 
		(null, $corr, '$id_cl', '$idCaja', '$nomCaja', '$id_us', '$boleta', '0', '0', '$idCierre', 'A', '$fecha', '0000-00-00 00:00:00')";
		$r2 = mysqli_query($conexion, $correlativo);
		   
		if($r1&&$r2)
		{
			echo 1;
		}
		else
		{
			die("Error al agregar correlativo: ". mysqli_error($conexion));
		}
?>