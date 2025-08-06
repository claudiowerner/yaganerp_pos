<?php

    $retorno = "";
    
    
    function obtener_nombre_propietario ($id_cl, $mysqli)
    {
        $retorno = "";
        if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
        {
            $mysqli->set_charset('utf8');
            
            $sql = "SELECT nombre FROM cliente WHERE id = ?";
            if ($consulta = $mysqli->prepare($sql))
            {
                $consulta->bind_param('i', $id_cl);
                if($consulta->execute())
                {
                    $resultado = $consulta->get_result();
                    $resultado = $resultado->fetch_array();
                    $retorno = $resultado["nombre"];
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