<?php


	session_start();
    ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	date_default_timezone_set('America/Santiago');
	error_reporting(E_ALL);
    $id_us = $_SESSION['user']['id'];
    $nombre = $_SESSION['user']["nombre"];
    $id_cl = $_SESSION['user']["id_cl"];

    
    require_once '../../../../../../conexion.php';
    if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
        
        
        $mysqli->set_charset('utf8');



        $nombre = $mysqli->real_escape_string($_POST["nombre_promo"]);
        $id_prod = intval($_POST["id_prod"]); 
        $unidades = intval($_POST["unidades"]); 
        $precio = intval($_POST["precio_promo"]);
        
        $hoy = getdate();
        $fecha = $hoy['year']."-".$hoy['mon']."-".$hoy['mday']." ".$hoy["hours"].":".$hoy["minutes"].":".$hoy["seconds"];

        //obtener número ID de promoción
        $sql = "SELECT MAX(id)+1 AS num_filas FROM promociones";
        $res = $conexion -> query($sql);
        $arr = $res -> fetch_assoc();
        $num_filas = intval($arr["num_filas"]);


        //consulta para verificar si existe una password temporal
        if ($crear_promocion = $mysqli->prepare("INSERT INTO promociones VALUES (?, ?, ?, ?, ?, ?, 'S', ?, '$fecha')"))
        {
            $crear_promocion->bind_param("iisiiii", $num_filas, $id_cl, $nombre, $id_prod, $unidades, $precio, $id_us);

            $crear_promocion->execute();
        }

        $json = array(
            "registro" => true,
            "titulo" => "Excelente",
            "mensaje" => "Promoción creada correctamente.",
            "icono" => "success"
        );

        if($res)
        {
            $json = array(
                "registro" => true,
                "titulo" => "Excelente",
                "mensaje" => "Promoción creada correctamente.",
                "icono" => "success"
            );
        }
        echo json_encode($json);
    }


	

    
	
?>