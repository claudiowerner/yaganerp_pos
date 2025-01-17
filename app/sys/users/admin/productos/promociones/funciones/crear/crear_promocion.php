<?php


	session_start();
	date_default_timezone_set('America/Santiago');
  
	if(isset($_SESSION['user'])){
      	$tipo = $_SESSION['user']['tipo_usuario'];
     	if($tipo == 1){
       	    //header('Location: ../');
     	}
    }
    else
    {
        header('Location: ../../../../index.php');
    }
    require_once '../../../../../../conexion.php';

	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	date_default_timezone_set('America/Santiago');
	error_reporting(E_ALL);
    $id_us = $_SESSION['user']['id'];
    $nombre = $_SESSION['user']["nombre"];
    $id_cl = $_SESSION['user']["id_cl"];

    
	$hoy = getdate();
	$fecha = $hoy['year']."-".$hoy['mon']."-".$hoy['mday'];

	$json = array();

    $sql = 
    "INSERT INTO promociones 
    VALUES (null, '1', '', '0', '0', '0', 'S', '1', '$fecha');";
    $res = $conexion -> query($sql);

    $sql = 
    "SELECT id FROM promociones 
    WHERE id_cl = $id_cl";
    $res = $conexion -> query($sql);
    
    while($row = $res->fetch_array())
    {
        $json = array(
            "id" => $row["id"]
        );
    }
	echo json_encode($json);
?>