<?php

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;

	//clases de mailing
	require_once '../../../../../vendor/phpmailer/phpmailer/src/PHPMailer.php';
	require_once '../../../../../vendor/phpmailer/phpmailer/src/SMTP.php';
	require_once '../../../../../vendor/phpmailer/phpmailer/src/Exception.php';
    require_once '../../../../../conexion.php';

    //obtener nombre de usuario
	require_once "obtener_nombre_propietario.php";
	require_once "obtener_nombre_usuario.php";
	require_once "obtener_id_solicitud.php";

    $json = array();

    function enviar_correo($correo, $id_cl, $id_us, $mysqli)
    {
        $nombre_propietario = obtener_nombre_propietario($id_cl, $mysqli);
        $respuesta_usuario = obtener_nombre_usuario($id_cl, $id_us, $mysqli);
        $id_solicitud = obtener_id_solicitud($id_cl, $id_us, $mysqli);

        $nom_usu = $respuesta_usuario["nombre"];
        $user = $respuesta_usuario["user"];
        try
        {
            //Configuracion del servidor
            $mail = new PHPMailer();
            $mail -> isSMTP();
            $mail -> Host 			= 'mail.vendelopos.cl';
            $mail -> SMTPAuth 		= true;
            $mail -> Username 		= 'rest_contrasena@vendelopos.cl';
            $mail -> Password 		= 'dF=7Ok8~dH2+';

            $mail->SMTPOptions = array(
                'ssl' => array(
                'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
            ));
            $mail -> SMTPSecure 	= 'ssl';
            $mail -> Port			= 465;
            //Receptores
            $mail -> setFrom("rest_contrasena@vendelopos.cl", "Notificación VendeloPOS");
            $mail -> addAddress($correo, $correo);
            //contenido del mail
            $mail -> isHTML 		= true;
            $mail -> Subject 		= "Solicitud de cambio de contraseña";
            $mail -> Body 			= 
            "Hola, $nombre_propietario:
            \n
            \n
            Te comunicamos que $nom_usu ($user) ha ingresado una SOLICITUD de CAMBIO DE CONTRASEÑA. 
            \nIngresa a tu cuenta de administrador y dirígete al apartado de Solicitudes para aprobar o declinar la autorización.
            \n
            \nTe recordamos que este es un correo 100% real, generado automáticamente cuando una de las cuentas asociadas a tu suscripción de VendeloPOS realiza una solicitud crítica que creemos debe ser visada por el administrador de la suscripción, buscando evitar situaciones de vulnerabilidad.";
            $mail -> CharSet 		= 'UTF-8';
            
            
            //enviar correo
            $correo_enviado = $mail -> send();
            
            if(!$correo_enviado)
            {
                $json = array(
                    "correo" => false,
                    "titulo" => "Error",
                    "mensaje" => "Error al enviar el mensaje: " . $mail->ErrorInfo,
                    "icono" => "error"
                );
            }
            else
            {
                $json = array(
                    "correo" => true,
                    "titulo" => "Excelente",
                    "mensaje" => "Se ha enviado una solicitud al administrador VendeloPOS de ésta tienda. Por favor, espera a que se tome una decisión de tu solicitud. NO CIERRES ÉSTA VENTANA.",
                    "icono" => "success",
                    "id_solicitud" => $id_solicitud
                );
            }
        }
        catch(Exception $e)
        {
            echo ". No se envió el mensaje. $e";
        }
        return json_encode($json,  JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);;
    }


?>