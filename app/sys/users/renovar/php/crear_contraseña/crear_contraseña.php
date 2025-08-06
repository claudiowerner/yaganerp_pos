<?php

	date_default_timezone_set('America/Santiago');
    
    
    require_once '../../../../conexion.php';


    $pass = password_hash($_POST["pass"], PASSWORD_DEFAULT);
    $user = $_POST["user"];

    $json = array(
        "cambio" => false,
        "mensaje" => "Error al cambiar la contraseña."
    );
    
    if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){

	    $mysqli->set_charset('utf8');

        $password = $mysqli->real_escape_string($pass);
        $usuario = $mysqli->real_escape_string($user);
        $hoy = getdate();
        $fecha = $hoy['year']."-".$hoy['mon']."-".$hoy['mday']." ".$hoy["hours"].":".$hoy["minutes"].":".$hoy["seconds"];

        $final_query = "UPDATE usuarios SET pass = ? WHERE user = ?";
        if ($consulta = $mysqli->prepare($final_query))
        {
            $consulta->bind_param("ss",$password, $usuario);
            if($consulta -> execute())
            {
                $json = array(
                    "cambio" => true,
                );
            }
        }
    }
    

    

    echo json_encode($json);

?>