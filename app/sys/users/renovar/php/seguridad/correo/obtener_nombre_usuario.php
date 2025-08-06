<?php

    $retorno = "";
    
    
    function obtener_nombre_usuario ($id_cl, $id_us, $mysqli)
    {
        $retorno = "";
        if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
        {
            
            $sql = "SELECT nombre, user FROM usuarios WHERE id_cl = ? AND id = ?";
            if ($consulta = $mysqli->prepare($sql))
            {
                $consulta->bind_param('ii', $id_cl, $id_us);
                if($consulta->execute())
                {
                    $resultado = $consulta->get_result();
                    while($row = $resultado -> fetch_array())
                    {
                        $retorno = array(
                            "nombre" => $row["nombre"],
                            "user" => $row["user"]
                        );
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