<?php

    $retorno = "";
    
    
    function obtener_id_solicitud($id_cl, $id_us, $mysqli)
    {
        $retorno = "";
        if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
        {
            $sql = 
            "SELECT id 
            FROM solicitud_usuario 
            WHERE id_cl = ? 
            AND usuario = ? 
            AND estado_reg_solicitud = 'A' 
            AND autorizacion = 'A'";
            if ($consulta = $mysqli->prepare($sql))
            {
                $consulta->bind_param('ii', $id_cl, $id_us);
                if($consulta->execute())
                {
                    $resultado = $consulta->get_result();
                    while($row = $resultado -> fetch_array())
                    {
                        $retorno = $row["id"];
                    }

                }
            }
            else
            {
                $retorno = $mysqli -> error;
            }
            return $retorno;
        }
    }

?>