<?php

	date_default_timezone_set('America/Santiago');
    
    
    require_once '../../../../../conexion.php';


    $id = $_POST["id"];
    $json = array();
    
    if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){

        $mysqli->set_charset('utf8');

        
        $hoy = getdate();
        $fecha = $hoy['year']."-".$hoy['mon']."-".$hoy['mday']." ".$hoy["hours"].":".$hoy["minutes"].":".$hoy["seconds"];

        $json = array();

        $sql = 
        "SELECT autorizacion
        FROM solicitud_usuario
        WHERE id = ?";
        if ($consulta = $mysqli->prepare($sql))
        {
            $consulta->bind_param('i', $id);
            
            $consulta->execute();

            $resultado = $consulta->get_result();
            while($row = $resultado -> fetch_array())
            {
                $json = array(
                    "aut" => $row["autorizacion"]
                );
            }
            
            echo json_encode($json);
        }
    }

?>