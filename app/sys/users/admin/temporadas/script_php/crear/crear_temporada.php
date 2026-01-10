<?php
if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){

    
    session_start();
	date_default_timezone_set('America/Santiago');
    require '../../../../../conexion.php';
	$id_us = $_SESSION['user']['id'];
    $nombre = $_SESSION['user']["nombre"];
    $id_cl = $_SESSION['user']["id_cl"];

	$mysqli->set_charset('utf8');
    $nt = $_POST["nt"];//nombre de temporada
    

    //variable de impresión que indica si se hizo el registro o no
    $json = array();
    //obtención de ID de registro
    $id_registro = 0;
    $sql = 
    "SELECT COUNT(id)+1 AS id 
    FROM temporada";
    
    if($res = $mysqli->prepare($sql))
    {
        if($res->execute())
        {
            $resultado = $res->get_result();
            $resultado = $resultado->fetch_assoc();

            $id_registro = intval($resultado["id"]);


            //inserción de nueva temporada
            $hoy = getdate();
            $fecha = $hoy['year']."-".$hoy['mon']."-".$hoy['mday']." ".$hoy["hours"].":".$hoy["minutes"].":".$hoy["seconds"];
            
            
            $sql = 
            "INSERT INTO temporada VALUES(?,?,?,?, '0000-00-00 00:00:00',?, 'S')";
            if ($res = $mysqli->prepare($sql))
            {
                $res->bind_param('iissi',$id_registro, $id_cl, $nt, $fecha, $id_us);
                
                if($res->execute())
                {
                    $json = array(
                        "insercion" => true,
                        "titulo" => "Excelente",
                        "mensaje" => "Temporada creada correctamente",
                        "icono" => "success"
                    );
                }
                else
                {
                    $json = array(
                        "insercion" => false,
                        "titulo" => "Error",
                        "mensaje" => "Error al crear temporada",
                        "icono" => "error"
                    );
                }
            }
            echo json_encode($json);
        }
    }
}



$mysqli->close();

?>
