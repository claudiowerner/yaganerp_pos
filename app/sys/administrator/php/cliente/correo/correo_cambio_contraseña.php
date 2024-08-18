<?php
	date_default_timezone_set('America/Santiago');

    ini_set('display_errors', '1');

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;
	
	//clases de mailing
	require_once '../../../../vendor/phpmailer/phpmailer/src/PHPMailer.php';
	require_once '../../../../vendor/phpmailer/phpmailer/src/SMTP.php';
	require_once '../../../../vendor/phpmailer/phpmailer/src/Exception.php';
	require_once '../../../../conexion.php';
	
	//definicion de fecha
	$fh = getdate();
	$año = $fh["year"];
	$mes = $fh["mon"];
	$dia = $fh["mday"];
	if($mes<10)
	{
		$mes = "0$mes";
	}
	if($dia<10)
	{
		$dia = "0$dia";
	}
	$fechaRegistro = "$año-$mes-$dia";
	$fecha = "$dia-$mes-$año";

	//definicion de hora
	$h = $fh["hours"];
	$min = $fh["minutes"];
	$sec = $fh["seconds"];
	if($h<10)
	{
		$h = "0$h";
	}
	if($min<10)
	{
		$min = "0$min";
	}
	if($sec<10)
	{
		$sec = "0$sec";
	}
	
	$hora = "$h:$min:$sec";


	$id = $_POST["id"];
	$nombre = "";
	$user = "";
	$correo = "";
	$pass = str_shuffle("0123456789".uniqid());



	//seleccionar nombre de usuario
	$sql = "SELECT cl.nombre, us.user, cl.correo 
	FROM cliente cl 
	JOIN usuarios us 
	ON us.id_cl = cl.id
	WHERE cl.id = $id";
	$res = $conexion->query($sql);

	
	
	while($row = $res->fetch_array())
	{
		$nombre = $row["nombre"];
		$user = $row["user"];
		$correo = $row["correo"];
	}

	$sql = "INSERT INTO pass_provisoria VALUES(null, $id, '$pass', '$fechaRegistro $hora')";
	$res = $conexion->query($sql);

	//actualizar pass tabla usuario
	$sql = "UPDATE usuarios SET pass = '$pass' WHERE id_cl = '$id'";
	$res = $conexion->query($sql);


	$asunto = "Cambio de contraseña de acceso a WebPOS";
	$cuerpo = "Hola, $nombre
	\n
	\n
	Hemos recibido la solicitud de cambio de contraseña. A continuación, los datos de inicio de sesión actualizados:
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
	El equipo de WebPOS.";

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
			"mensaje" => "Correo de cambio de contraseña enviado correctamente",
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