<?php

	require_once '../../../../conexion.php';
	require_once '../../../../php/mb_encoding.php';

	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	date_default_timezone_set('America/Santiago');

	$json = array(
        "eliminar" => false,
        "titulo" => "Error",
        "mensaje" => "Error al eliminar sugerencia",
        "icono" => "error"
    );

    /* ---------------------------------------------------- CONSULTA SQL ---------------------------------------------- */
	
    if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
        
        $conexion->set_charset('utf8');
        $id_sug = $_POST["id"];
        $sql = "UPDATE `webpos`.`sugerencias` SET `estado` = 'N' WHERE (`id` = ?)";
        if($consulta = $conexion -> prepare($sql))
        {
            $consulta->bind_param("i", $id_sug);
            if($consulta->execute())
            {
                $json = array(
                    "eliminar" => true,
                    "titulo" => "Excelente",
                    "mensaje" => "Sugerencia eliminada correctamente",
                    "icono" => "success"
                );
            }
        }

    }
    echo json_encode($json);
?>