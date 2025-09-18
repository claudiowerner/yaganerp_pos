<?php

	require_once '../../../../conexion.php';
	require_once '../../../../php/mb_encoding.php';

	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	date_default_timezone_set('America/Santiago');

	$json = array();

    /* ---------------------------------------------------- CONSULTA SQL ---------------------------------------------- */
	
    if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
        
        $conexion->set_charset('utf8');
        $id_sug = $_POST["id"];
        $sql = "UPDATE `webpos`.`sugerencias` SET `estado` = 'C' WHERE (`id` = ?)";
        if($consulta = $conexion -> prepare($sql))
        {
            $consulta->bind_param("i", $id_sug);
            if($consulta->execute())
            {
                echo "ok";
            }
        }

    }
    echo json_encode($json);
?>