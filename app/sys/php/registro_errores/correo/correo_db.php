<?php

    require_once "../../../env_var/env_smtp.php";
    require_once "../../../php/mb_encoding.php";
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;

	//clases de mailing
	require_once '../../../vendor/phpmailer/phpmailer/src/PHPMailer.php';
	require_once '../../../vendor/phpmailer/phpmailer/src/SMTP.php';
	require_once '../../../vendor/phpmailer/phpmailer/src/Exception.php';

    $mensaje = $_POST["mensaje"];

    $json = array();


    $cuerpo = 
    "Hola,

        Se acaba de producir el siguiente error:
        $mensaje";
	//Configuracion del servidor
				$mail = new PHPMailer();
				$mail -> isSMTP();
				$mail -> Host 			= getenv("SMTP_HOST");
				$mail -> SMTPAuth 		= getenv("SMTP_AUTH");
				$mail -> Username 		= getenv("SMTP_USER");
				$mail -> Password 		= getenv("SMTP_PASS");

				$mail->SMTPOptions = array(
					'ssl' => array(
					'verify_peer' => false,
					'verify_peer_name' => false,
					'allow_self_signed' => true
					));
				$mail -> SMTPSecure 	= 'ssl';
				$mail -> Port			= 465;

				//Receptores
				$mail -> setFrom("sist_registro_errores@vendelopos.cl", "Error en VendeloPOS");
				$mail -> addAddress("claudiowernern@hotmail.com");

				//contenido del mail
				$mail -> isHTML 		= true;
				$mail -> Subject 		= "Error de conexión en VendeloPOS";
				$mail -> Body 			= $cuerpo;
				$mail -> CharSet 		= 'UTF-8';

				//enviar correo
				
				if($mail->Send())
                {
                    $json = array(
                        "titulo" => "Aviso",
                        "mensaje" => mb_encoding("VendeloPOS está experimentando intermitencias en su funcionamiento. Ya se le envió un reporte al equipo del programa."),
                        "icono" => "warning"
                    );
                }
                else
                {
                    $json = array(
                        "titulo" => "Aviso",
                        "mensaje" => mb_encoding("VendeloPOS está experimentando intermitencias en su funcionamiento. Intente comunicarse por correo, teléfono u otro canal de comunicación existente."),
                        "icono" => "warning"
                    );
                }
    
    echo json_encode($json);
                

?>