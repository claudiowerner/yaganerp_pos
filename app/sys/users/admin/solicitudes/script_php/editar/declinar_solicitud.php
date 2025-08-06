<?php

	require "../../../../../php/headers.php"; 

	$id_us = $_SESSION['user']['id'];
	$nombre = $_SESSION['user']["nombre"];
	$id_cl = $_SESSION['user']["id_cl"];

    $id = $_POST["id"];

    $json = array(
        "declinar" => false, 
        "titulo" => "Error",
        "mensaje" => "Error al conceder autorización",
        "icono" => "error"
    );

	require_once '../../../../../conexion.php';

    if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
        $mysqli->set_charset('utf8');

        $sql = 
        "UPDATE solicitud_usuario 
        SET autorizacion = 'N' 
        WHERE id_cl = ?
        AND id = ?";
        
        if ($consulta = $mysqli->prepare($sql))
        {
            $consulta->bind_param('ii', $id_cl, $id);
            
            if($consulta->execute())
            {
                $json = array(
                    "declinar" => true, 
                    "titulo" => "Excelente",
                    "mensaje" => "Autorización concedida correctamente",
                    "icono" => "success"
                );
            }
        }
    }

    echo json_encode($json, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
    
?>
