<?php

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;

	require_once '../../../conexion.php';
	require_once '../../../vendor/autoload.php';

	//clases de mailing
	require_once '../../../vendor/phpmailer/phpmailer/src/PHPMailer.php';
	require_once '../../../vendor/phpmailer/phpmailer/src/SMTP.php';
	require_once '../../../vendor/phpmailer/phpmailer/src/Exception.php';


	error_reporting(E_ALL);
	ini_set('display_errors', '1');

	$id = $_POST["id"];
	$correo = $_POST["correo"];
	

	$pass = str_shuffle("0123456789".uniqid());

	$sql = 
	"SELECT * FROM usuarios
	WHERE user = 'admin$id'";

	$res = $conexion->query($sql);
	if($res->num_rows == 0)
	{
		$sql = 
		"INSERT INTO usuarios VALUES 
		(null, 'Admin', 'admin$id', '$pass', '1', '$id', 'S', '1,2,3,4');";
		$resultado = mysqli_query($conexion, $sql);

		if($resultado)
		{
			echo "Admin creado correctamente";
			$mensaje = 
			"¡Hola!<br>
			Somos del equipo de WebPOS, y hemos creado tus credenciales de acceso. Recuerda que esta contraseña estará disponible durante 24 horas desde su creación.
			<br>
			<br>
			Tus datos son:<br>
			Usuario:admin$id<br>
			Contraseña:$pass.
			
			Ante cualquier duda o problema, no dudes en contactarte con nosotros.";
			$asunto = "WebPOS - Creación de credenciales";

			enviarMail($mensaje, $correo, $asunto);

		}
		else
		{
			die("Error al asignar usuario admin al cliente ID $id: ". mysqli_error($conexion));
		}
	}
	else
	{
		$sql = 
		"UPDATE usuarios
		SET pass = '$pass'
		WHERE user = 'admin$id'";
		$res = $conexion->query($sql);
		
		if($res)
		{
			echo "Clave modificada correctamente.";
			$mensaje = 
			"¡Hola!<br>
			Somos del equipo de WebPOS, y hemos cambiado tu contraseña. Recuerda que esta contraseña estará disponible durante 24 horas desde su creación.
			<br>
			<br>
			Tus datos son:<br>
			Usuario: admin$id<br>
			Contraseña: $pass.<br>
			
			Ante cualquier duda o problema, no dudes en contactarte con nosotros.";
			$asunto = "WebPOS - Modificación de contraseña";
			enviarMail($mensaje, $correo, $asunto);
		}
	}


	function enviarMail($cuerpo, $correo, $asunto)
	{
		try
		{
			//Configuracion del servidor
			$mail = new PHPMailer();
			$mail -> SMTPDebug 		= 2;
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
			$mail -> addAddress($correo, "User");

			//contenido del mail
			$mail -> isHTML 		= true;
			$mail -> Subject 		= $asunto;
			$mail -> Body 			= $cuerpo;
			$mail -> AltBody 		= "Alt body :v";
			$mail -> CharSet 		= 'UTF-8';

			//enviar correo
			$mail -> send();
			
			
			if(!$mail->Send())
			{
				echo " Error al enviar el mensaje: " . $mail->ErrorInfo;
			}
			else
			{
				echo "Se ha enviado el correo al cliente";
			}
		}
		catch(Exception $e)
		{
			echo ". No se envió el mensaje. ";
		}
	}
?>