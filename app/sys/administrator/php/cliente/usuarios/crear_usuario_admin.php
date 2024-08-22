<?php

	date_default_timezone_set('America/Santiago');
	require_once '../../../../conexion.php';
	require_once 'crear_pass_provisoria.php';
	require_once '../correo/correo_envio_credenciales.php';
	//require_once '../correo.php';
	date_default_timezone_set('America/Santiago');
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
    
    $hoy = getdate();
	$fecha = $hoy['year']."-".$hoy['mon']."-".$hoy['mday']." ".$hoy["hours"].":".$hoy["minutes"].":".$hoy["seconds"];
	

	/* -------------------------------------- REGISTRO EN TABLA USUARIOS -------------------------------- */
    
    
    //variables de usuario
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $correo = $_POST["correo"];
    $user = "admin$id";
	$pass = str_shuffle("0123456789".uniqid());
    $tipo_usuario = 1;

    $sql = "INSERT INTO usuarios VALUES (null, 'Admin', '$user', '$pass', '$tipo_usuario', '$id', 'S', '1,2','$fecha')";
    $res = $conexion->query($sql);

    $registro = true;
    if($res)
    {
        $registro = true;
    }
    else
    {
        $registro = false;
    }

    $clave_provisoria = passCaducable($id, $pass, $fecha, $conexion);
    $correo_enviado = enviarCorreo($nombre, $correo, $user, $pass, $fecha);
    
    $json = array(
        "registro" => $registro,
        "clave_provisoria" => $clave_provisoria,
        "correo" => $correo_enviado
    );

    echo json_encode($json);
    
	
?>