<?php

	date_default_timezone_set('America/Santiago');
    
    
    require_once '../../../../../conexion.php';


    $user = $_POST["user"];
    $json = array();
    
    if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){

        $mysqli->set_charset('utf8');

        $usuario = $mysqli->real_escape_string($user);
        
        $hoy = getdate();
        $fecha = $hoy['year']."-".$hoy['mon']."-".$hoy['mday']." ".$hoy["hours"].":".$hoy["minutes"].":".$hoy["seconds"];



        $sql = 
        "SELECT u.id, u.id_cl, c.correo
        FROM usuarios u
        JOIN cliente c
        ON c.id = u.id_cl
        WHERE u.user = ? 
        AND u.estado = 'S'";
        if ($consulta = $mysqli->prepare($sql))
        {
            $consulta->bind_param('s', $usuario);
            
            $consulta->execute();

            $resultado = $consulta->get_result();
            
            if($resultado->num_rows>0)
            {
                $res = $resultado->fetch_assoc();
                $json = array(
                    "id_cl" => $res["id_cl"],
                    "id_usu" => $res["id"],
                    "correo" => $res["correo"]
                );
            }
            echo json_encode($json);
        }
    }

?>