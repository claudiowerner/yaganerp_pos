<?php

    ini_set('display_errors', '1');

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;
	
	//clases de mailing
	require_once '../../../../vendor/phpmailer/phpmailer/src/PHPMailer.php';
	require_once '../../../../vendor/phpmailer/phpmailer/src/SMTP.php';
	require_once '../../../../vendor/phpmailer/phpmailer/src/Exception.php';
	
    //creación de instancia Mail (true: habilita las excepciones)
    $mail = new PHPMailer(true);

    $correo = $_POST["correo"];
    $nombre = $_POST["nombre"];

    $asunto = "Registro exitoso en WebPOS - Contacto WebPOS";
	$cuerpo = "Hola, $nombre:\n\nTe informamos que se ha creado una cuenta en el sistema de ventas WebPOS exitosamente. En un próximo correo, deberían llegar las credenciales para que puedas acceder a tu cuenta.\n\n El equipo de WebPOS.";

	//respuesta que se enviará al DOM
	$json = array();
	
    try
    {
		//Configuracion del servidor
		$mail = new PHPMailer();
		$mail -> isSMTP();
		$mail -> Host 			= 'mail.calendarit.cl';
		$mail -> SMTPAuth 		= true;
		$mail -> Username 		= 'contacto@calendarit.cl';
		$mail -> Password 		= 'xXUzYTC.z+~N';
		$mail -> SMTPSecure 	= 'ssl';
		$mail -> Port			= 465;

		//Receptores
		$mail -> setFrom("noreply@calendarit.cl", "Contacto WebPOS Software");
		$mail -> addAddress($correo, $correo);
		//contenido del mail
		$mail -> isHTML 		= true;
		$mail -> Subject 		= $asunto;
		$mail -> Body 			= $cuerpo;
		$mail -> CharSet 		= 'UTF-8';

		//enviar correo
		$envio = $mail->send();
	
		if($envio==1)
		{
			$json = array(
				"envio" => true,
				"titulo" => "Excelente",
				"mensaje" => "Correo de bienvenida enviado correctamente al cliente.",
				"icono" => "success"
			);
		}
		else
		{
			$json = array(
				"envio" => false,
				"titulo" => "Error",
				"mensaje" => " Error al enviar el mensaje de bienvenida: " . $mail->ErrorInfo,
				"icono" => "error"
 			);
		}
	}
	catch(Exception $e)
	{
		$json = array(
			"envio" => false,
			"titulo" => "Error",
			"mensaje" => " Error al enviar el mensaje de bienvenida: " . $mail->ErrorInfo,
			"icono" => "error"
		 );
	}

	echo json_encode($json);



?>