<?php
	session_start();



	$id_us = $_SESSION['user']['id'];
	$nombre = $_SESSION['user']["nombre"];
	$id_cl = $_SESSION['user']["id_cl"];
	

	$estado = "";

	require_once '../../../../../conexion.php';
    
    //query
    $sql = "SELECT estado FROM config_promociones WHERE id_cl = $id_cl";
	$resultado = $conexion->query($sql);

    $json = array();

    $estado = true;
	while ($row = $resultado->fetch_array()) 
	{
		if($row["estado"]=="S")
        {
            $estado = true;
        }
        else
        {
            $estado = false;
        }
	};

    $json = array(
        "estado" => $estado
    );

    echo json_encode($json);


?>
