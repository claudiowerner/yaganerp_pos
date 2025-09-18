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

	//Enviar correo
	$asunto = "VendeloPOS: Sugerencia de $nombre";
	$cuerpo = "Hola, Administrador
	\n
	Has recibido la siguente sugerencia de $nombre:
	\n
	$sugerencia.
	
	Correo del cliente: $correo";

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
	$mail -> setFrom("contacto@vendelopos.cl", "Contacto VendeloPOS Software");
	$mail -> addAddress("claudiowernern@hotmail.com", "contacto@vendelopos.cl");
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
			"mensaje" => "Correo de sugerencia enviado",
			"icono" => "success"
		);
	}
	else
	{
		$error = $mail->ErrorInfo;
		$json = array(
			"correo" => false,
			"titulo" => "Error",
			"mensaje" => "Error al enviar correo de cambio de contraseña: $error",
			"icono" => "error"
		);
	}

	echo json_encode($json);



?>