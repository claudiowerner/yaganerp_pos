<?php
	session_start();



	$id_us = $_SESSION['user']['id'];
	$nombre = $_SESSION['user']["nombre"];
	$id_cl = $_SESSION['user']["id_cl"];
	

	$estado = $_POST["estado"];

	require_once '../../../../../conexion.php';

    
    //query
    $sql = "UPDATE config_promociones 
    SET estado = '$estado' 
    WHERE id_cl = $id_cl";
	$res = $conexion->query($sql);

    $json = array();

    if($res)
    {
        $json = array(
            "titulo" => "Excelente",
            "mensaje" => "Configuración de las promociones modificada correctamente.",
            "icono" => "success"
        );
    }
    else
    {
        $json = array(
            "titulo" => "Error",
            "mensaje" => "Error al modificar configuración de las promociones.",
            "icono" => "error"
        );
    }

    echo json_encode($json);


?>
