<?php

    ini_set('display_errors', '1');

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;
	
	//clases de mailing
	require_once '../../../../vendor/phpmailer/phpmailer/src/PHPMailer.php';
	require_once '../../../../vendor/phpmailer/phpmailer/src/SMTP.php';
	require_once '../../../../vendor/phpmailer/phpmailer/src/Exception.php';

	//variables de entorno
	require_once "../../../../env_var/env_smtp.php";
	
	
    //creación de instancia Mail (true: habilita las excepciones)
    $mail = new PHPMailer(true);

	function enviarCorreo($nombre, $correo, $user, $pass, $fecha)
	{
		$asunto = "Credenciales de acceso a VendeloPOS";
		$cuerpo = "Hola, $nombre:
		\n
		\n
		A continuación, tus credenciales de acceso.
		\n
		\n
		Username: $user
		\n
		Contrsaseña: $pass
		\n
		Fecha de creación: $fecha
		\n
		\n
		Ten en cuenta que, la contraseña es PROVISORIA y CADUCARÁ EN 24 HORAS desde la fecha de creación mostrada más arriba.
		\n
		El equipo de VendeloPOS.";
    
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
		$mail -> setFrom("noreply@vendelopos.cl", "Contacto VendeloPOS Software");
		$mail -> addAddress($correo, $correo);
		//contenido del mail
		$mail -> Subject 		= $asunto;
		$mail -> Body 			= $cuerpo;
		$mail -> CharSet 		= 'UTF-8';

		//enviar correo
		$envio = $mail->send();
		return $envio;

	}

?>