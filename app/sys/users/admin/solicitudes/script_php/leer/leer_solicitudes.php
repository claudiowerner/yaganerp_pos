<?php

	require "../../../../../php/headers.php"; 

	$id_us = $_SESSION['user']['id'];
	$nombre = $_SESSION['user']["nombre"];
	$id_cl = $_SESSION['user']["id_cl"];

    $arr_mes = array();
    $arr_data = array();
    $salida = "<br>";

	require_once '../../../../../conexion.php';

    if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
        $mysqli->set_charset('utf8');


        $mysqli->query("SET lc_time_names = 'es_ES'");
        $sql = 
        "SELECT day(fecha) AS dia, monthname(fecha) AS mes, year(fecha) AS año, 
        DATE_FORMAT(fecha, '%Y-%m-%d') AS fecha
        FROM solicitud_usuario
        WHERE id_cl = ?
        AND estado_reg_solicitud != 'X'
        GROUP BY day(fecha)
        ORDER BY day(fecha) DESC";
        
        if ($consulta = $mysqli->prepare($sql))
        {
            $consulta->bind_param('i', $id_cl);
            
            $consulta->execute();

            $resultado = $consulta->get_result();
            
            if($resultado -> num_rows>0)
            {
                while($row = $resultado -> fetch_array())
                {
                    $arr_mes[] = array(
                        "fecha" => $row["fecha"],
                        "dia" => $row["dia"]." de ".$row["mes"]." de ".$row["año"]
                    );
                }
            }
        }

        $cont = count($arr_mes);
        $salida = "$salida<strong>Se encontraron $cont solicitudes</strong><br>";
        //crear DIVs y "cáscara" de tabla
        for($i = 0; $i < $cont; $i++)
        {
            $fecha_legible = $arr_mes[$i]["dia"];
            $fecha = $arr_mes[$i]["fecha"];
            $rellenar_tabla = rellenar_tabla($fecha,$id_cl, $mysqli);
            $salida = 
            "$salida
            <div class='breadcrumb'>
                <div class='text-end'><strong>$fecha_legible</strong></div>
                <table class='table'>
                    <tr>
                    
                        <th>ID</th>
                        <th>Usuario</th>
                        <th>Tipo de solicitud</th>
                        <th>Estado solicitud</th>
                        <th>Fecha</th>
                        <th>Acción</th>
                    
                    </tr>";
                    $salida = "$salida$rellenar_tabla";
                $salida = "$salida</table>
            </div>";
        }


        echo $salida;
    }



    function rellenar_tabla($fecha, $id_cl, $mysqli)
    {
        $retorno = "";
        //rellenar tabla
        $sql = 
        "SELECT su.id, u.nombre, sol.nombre_solicitud, su.autorizacion, su.estado_reg_solicitud, 
        DATE_FORMAT(su.fecha, '%d/%m/%Y a las %H:%i:%s') AS fecha
        FROM solicitud_usuario su 
        JOIN usuarios u 
        ON su.usuario = u.id 
        JOIN tipo_solicitud_usuario sol 
        ON sol.id = su.solicitud 
        WHERE su.id_cl = ?
        AND DATE_FORMAT(su.fecha, '%Y-%m-%d') = '$fecha'
        AND estado_reg_solicitud != 'X'";
        //La letra X significa que el registro fue eliminado de la lista 
        
        if ($consulta = $mysqli->prepare($sql))
        {
            $consulta->bind_param('i', $id_cl);
                
            if($consulta->execute())
            {
                $resultado = $consulta->get_result();
                while($row = $resultado -> fetch_array())
                {
                    $aut = "";
                    if($row["autorizacion"]=="A")
                    {
                        $aut = 
                        "<button class='btn btn-success' onclick='aprobar_solicitud(".$row["id"].")'>Aprobar</button>
                        <button class='btn btn-danger' onclick='declinar_solicitud(".$row["id"].")'>Declinar</button>";
                    }
                    if($row["autorizacion"]=="S")
                    {
                        $aut = "<button class='btn btn-success' disabled style='width: 100%'>APROBADA</button>";
                    }
                    if($row["autorizacion"]=="N")
                    {
                        $aut = "<button class='btn btn-danger' disabled style='width: 100%'>DECLINADA</button>";
                    }
                    
                    
                    $retorno = "$retorno<td width='10%'>".$row["id"]."</td>";
                    $retorno = "$retorno<td width='20%'>".$row["nombre"]."</td>";
                    $retorno = "$retorno<td width='20%'>".$row["nombre_solicitud"]."</td>";
                    $retorno = "$retorno<td width='20%'>$aut</td>";
                    $retorno = "$retorno<td width='20%'>".$row["fecha"]."</td>";
                    $retorno = "$retorno<td width='20%'><button class='btn btn-danger' onclick='eliminarSolicitud(".$row["id"].")'>Eliminar</button</td>";
                    $retorno = "$retorno</tr><tr>";
                }
            }
            else
            {
                echo "no";
            }
        }
        else
        {
            $retorno = "Error";
        }
        return $retorno;
    }
    
?>
