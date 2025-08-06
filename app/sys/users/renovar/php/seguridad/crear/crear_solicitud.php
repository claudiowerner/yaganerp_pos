<?php

	date_default_timezone_set('America/Santiago');
        
    require_once '../../../../../conexion.php';
    require_once "../correo/correo.php";

    $json = array();
    
    if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
    {
        $id_cl = $_POST["id_cl"];
        $id_usu = $_POST["id_usu"];
        $correo = $_POST["correo"];

        $mysqli->set_charset('utf8');
        
        $hoy = getdate();
        $fecha = $hoy['year']."-".$hoy['mon']."-".$hoy['mday']." ".$hoy["hours"].":".$hoy["minutes"].":".$hoy["seconds"];

        //Seleccionar número de filas o registros de la tabla *solicitud_usuario*
        $sql = "SELECT COUNT(id)+1 AS id FROM solicitud_usuario";
        $res = $conexion->query($sql);
        $id_reg = $res -> fetch_assoc();
        $id_reg = $id_reg["id"];

        
        //Inserción del registro de la solicitud de usuario
        $sql = 
        "INSERT INTO solicitud_usuario 
        (`id`, `id_cl`, `usuario`, `solicitud`, `estado_reg_solicitud`, `autorizacion`, `fecha`)
        VALUES ($id_reg, ?, ?, 1, 'A', 'A', '$fecha');";
        if ($consulta = $mysqli->prepare($sql))
        {
            $consulta->bind_param('ii', $id_cl, $id_usu);
            $sql_string = str_replace("?", $id_usu, $sql);
            if($consulta->execute())
            {
                echo enviar_correo($correo, $id_cl, $id_usu,$mysqli);
            }
            else
            {
                echo "error";
            }
        }
        else
        {
            echo $mysqli -> error;
        }
    }

?>