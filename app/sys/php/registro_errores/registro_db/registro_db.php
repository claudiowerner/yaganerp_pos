<?php

	date_default_timezone_set('America/Santiago');
	//require_once '../correo.php';

	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

    function registrar_errores($datos, $conexion)
    {
        //seleccionar ID de error
        $sql = "SELECT COALESCE(MAX(id), 0)+1 AS cant FROM registro_errores";
        $res = $conexion -> query($sql);
        $arr = $res -> fetch_assoc();
        $cant = intval($arr["cant"]);

        //Registro de error en la tabla "registro_errores"
        $error = intval($datos["error"]);
        $id_cl = intval($datos["id_cl"]);
        $query = $datos["query"];
        $ubic_script = $datos["ubic_script"];
        $mensaje = $datos["mensaje"];

        $mensaje_registro = 
        "QUERY SQL: $query<br>
        UBICACIÓN DEL SCRIPT PHP: $ubic_script<br>
        MENSAJE:<br>$mensaje";
        $json = array();
        //consulta para verificar si existe una password temporal
        $sql = "INSERT INTO registro_errores VALUES(?,?,?,?)";
        if ($registro = $conexion->prepare($sql))
        {
            $registro->bind_param('iiis', $cant, $id_cl, $error, $mensaje_registro);

            $registro->execute();

            $resultado = $registro->get_result();
        }
    }
?>