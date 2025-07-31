<?php

	date_default_timezone_set('America/Santiago');
    
    
    require_once '../../../../conexion.php';


    $pass = password_hash($_POST["t_pass"], PASSWORD_DEFAULT);
    $user = $_POST["t_user"];

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

        if ($consulta = $mysqli->prepare("UPDATE usuarios SET pass = ? WHERE user = ?"))
        {
            $consulta->bind_param("ss",$usuario, $password);

            if($consulta -> execute())
            {
                $json = array(
                    "cambio" => true,
                    "mensaje" => "Contraseña cambiada correctamente. Será redirigido a la pantalla inicial para iniciar sesión."
                );
            }
        }
    }
    

    

    echo json_encode($json);

?>