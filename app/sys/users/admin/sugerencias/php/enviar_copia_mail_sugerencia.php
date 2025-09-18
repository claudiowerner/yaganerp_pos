<?php

	session_start();
	date_default_timezone_set('America/Santiago');
    ini_set('display_errors', '1');

	$id_us = $_SESSION['user']['id'];
	$nombre = $_SESSION['user']["nombre"];
	$id_cl = $_SESSION['user']["id_cl"];

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;
	
	//Llamadas clases de Mailing y de Environment variables
	require_once '../../../../vendor/phpmailer/phpmailer/src/PHPMailer.php';
	require_once '../../../../vendor/phpmailer/phpmailer/src/SMTP.php';
	require_once '../../../../vendor/phpmailer/phpmailer/src/Exception.php';
	require_once '../../../../conexion.php';
	require_once '../../../../env_var/env_smtp.php';
	require_once '../../../../env_var/env_db.php';
	
	//definicion de fecha
	$fh = getdate();
	$año = $fh["year"];
	$mes = $fh["mon"];
	$dia = $fh["mday"];

	$nombre = "";
	$correo = "";

	/* ----------------------------------------------------- CONSULTA SQL ------------------------------------------------ */
	//Obtener ID de consulta
    $sql = "SELECT COALESCE(MAX(id), 0)+1 AS id FROM sugerencias";
    $res = $conexion -> query($sql);
    $arrRes = $res->fetch_assoc();
    $num_sugerencia = $arrRes["id"];

    /* ------------------------------------------------- CONSULTA SQL ---------------------------------------------------- */
	$sql = 
	"SELECT nombre, correo 
	FROM cliente 
	WHERE id = ?";

	$nombre = "";
	$correo = "";
	$sugerencia = $_POST["sugerencia"];

	if ($consulta = $mysqli->prepare($sql))
	{
		$consulta->bind_param('i', $id_cl);
            
        $consulta->execute();

        $resultado = $consulta->get_result();
            
        if($resultado -> num_rows>0)
        {
            while($row = $resultado -> fetch_array())
            {
                $nombre = $row["nombre"];
                $correo = $row["correo"];
            }
        }
    }

	
    /* -------------------------------------------------- ENVIAR CORREO -------------------------------------------------- */
	//Enviar correo
    $sugerencia = $_POST["sugerencia"];
	$asunto = "VendeloPOS: Copia de sugerencia #$num_sugerencia";
	$cuerpo = "Hola, $nombre,
	\n
        Esta es una copia de tu sugerencia enviada al equipo de VendeloPOS:
	\n$sugerencia.
    
    El número de tu sugerencia es el #$num_sugerencia.";

	//Configuracion del servidor
	$mail = new PHPMailer();
	$mail -> isSMTP();
	$mail -> Host 			= getenv("SMTP_HOST");							
	$mail -> SMTPAuth 		= getenv("SMTP_AUTH");																
	$mail -> Username 		= getenv("SMTP_USER");					
	$mail -> Password 		= getenv("SMTP_PASS");									
	$mail -> SMTPSecure 	= getenv("SMTP_SECURE");													
	$mail -> Port			= getenv("SMTP_PORT");						

	//Receptores
	$mail -> setFrom("contacto@vendelopos.cl", "Copia de sugerencia enviada");
	$mail -> addAddress($correo);
	//contenido del mail
	$mail -> Subject 		= $asunto;
	$mail -> Body 			= $cuerpo;
	$mail -> CharSet 		= 'UTF-8';

	//enviar correo
	$envio = $mail->send();

	$json = array();
	if($envio)
	{
		$json = array(
			"correo" => true,
			"titulo" => "Excelente",
			"mensaje" => "Copia de sugerencia enviada a tu correo personal.",
			"icono" => "success"
		);
	}
	else
	{
		$error = $mail->ErrorInfo;
		$json = array(
			"correo" => false,
			"titulo" => "Error",
			"mensaje" => "Error al enviar la copia de tu sugerencia: $error",
			"icono" => "error"
		);
	}

	echo json_encode($json);



?>