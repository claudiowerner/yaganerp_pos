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


	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	$id = $_POST["id"];
	

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

			enviarMail($mensaje);

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
			Usuario:admin$id<br>
			Contraseña:$pass.
			
			Ante cualquier duda o problema, no dudes en contactarte con nosotros.";
			
			enviarMail($mensaje);
		}
	}


	function enviarMail($mensaje)
	{
		$mail = new PHPMailer(true);
		try
		{
			$mail->SMTPDebug = SMTP::DEBUG_SERVER;
			$mail->isSMTP();
			$mail->Host = 'host';
			$mail->SMTPAuth = true;
			$mail->Username = 'host';
			$mail->Password = 'host';
			$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
			$mail->Port = 'host';

			//datos de correo
			$mail->setFrom("ventas@webposerp.cl", "Equipo de ventas de WebPOS");
			$mail->addAddress("ventas@webposerp.cl", "Equipo de ventas de WebPOS");
			
			$mail->isHTML(true);
			$mail->Subject = "Prueba de venta";
			$mail->Body();
			
			echo "Se ha enviado el correo al cliente";
		}
		catch(Exception $e)
		{
			echo "Error: ".$mail->ErrorInfo;
		}
	}
?>