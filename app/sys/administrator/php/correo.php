<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//clases de mailing
require_once '../../../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require_once '../../../vendor/phpmailer/phpmailer/src/SMTP.php';
require_once '../../../vendor/phpmailer/phpmailer/src/Exception.php';
function enviarMail($cuerpo, $correo, $asunto)
	{
		try
		{
			//Configuracion del servidor
			$mail = new PHPMailer();
			$mail -> isSMTP();
			$mail -> Host 			= 'smtp-relay.sendinblue.com';
			$mail -> SMTPAuth 		= true;
			$mail -> Username 		= 'claudio.werner.neira@gmail.com';
			$mail -> Password 		= 'hJtKZADWFpQsqgS7';

			$mail->SMTPOptions = array(
				'ssl' => array(
				'verify_peer' => false,
				'verify_peer_name' => false,
				'allow_self_signed' => true
				));
			$mail -> SMTPSecure 	= 'ssl';
			$mail -> Port			= 465;

			//Receptores
			$mail -> setFrom("claudiowernern@hotmail.com", "Contacto WebPOS");
			$mail -> addAddress($correo, $correo);

			//contenido del mail
			$mail -> isHTML 		= true;
			$mail -> Subject 		= $asunto;
			$mail -> Body 			= $cuerpo;
			$mail -> CharSet 		= 'UTF-8';

			//enviar correo
			$mail -> send();
			
			
			if(!$mail->Send())
			{
				echo " Error al enviar el mensaje: " . $mail->ErrorInfo;
			}
			else
			{
				echo "Se ha enviado el correo al cliente. ";
			}
		}
		catch(Exception $e)
		{
			echo ". No se envió el mensaje. ";
		}
	}

?>