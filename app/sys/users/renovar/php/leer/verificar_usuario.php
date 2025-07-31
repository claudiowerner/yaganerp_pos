<?php

	date_default_timezone_set('America/Santiago');
    
    
    require_once '../../../../conexion.php';


    $user = $_POST["user"];
    $json = array();
    
    if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){

        $mysqli->set_charset('utf8');

        $usuario = $mysqli->real_escape_string($user);
        
        $hoy = getdate();
        $fecha = $hoy['year']."-".$hoy['mon']."-".$hoy['mday']." ".$hoy["hours"].":".$hoy["minutes"].":".$hoy["seconds"];

        if ($consulta = $mysqli->prepare("SELECT * FROM usuarios WHERE user = ? AND estado = 'S'"))
        {
            $consulta->bind_param('s', $usuario);
            
            $consulta->execute();

            $resultado = $consulta->get_result();

            
            if($resultado->num_rows>0)
            {
                $json= array(
                    "usuarios" => true, 
                    "contenido" => "<div class='alert alert-success'>
                        Usuario encontrado
                    </div>"
                );
            }
            else
            {
                $json= array(
                    "usuarios" => false, 
                    "contenido" => "<div class='alert alert-danger'>
                        Usuario no encontrado
                    </div>"
                );
            }
        }
    }
    

    

    echo json_encode($json);

?>