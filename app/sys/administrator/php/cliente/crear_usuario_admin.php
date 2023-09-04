<?php

	

	require_once '../../../conexion.php';
	require_once '../../../vendor/autoload.php';
	require_once '../correo.php';


	error_reporting(E_ALL);
	ini_set('display_errors', '1');

	$id = $_POST["id"];
	$correo = $_POST["correo"];

	$hoy = getdate();
	$fecha = $hoy['year']."-".$hoy['mon']."-".$hoy['mday']." ".$hoy["hours"].":".$hoy["minutes"].":".$hoy["seconds"];
	$fecha_correo = $hoy['mday']."-".$hoy['mon']."-".$hoy['year']." ".$hoy["hours"].":".$hoy["minutes"].":".$hoy["seconds"];


	$pass = str_shuffle("0123456789".uniqid());

	$sql = 
	"SELECT * FROM usuarios
	WHERE id_cl = '$id'";

	$res = $conexion->query($sql);
	if($res->num_rows == 0)
	{
		//registrar pass caducable
		$pass_caducable = passCaducable($id, $pass, $fecha, $conexion);

		//insertar usuario administrador en la tabla usuarios
		$sql = 
		"INSERT INTO usuarios VALUES 
		(null, 'Admin', 'admin$id', '$pass', '1', '$id', 'S', '1,2,3,4');";
		$resultado = mysqli_query($conexion, $sql);

		if($resultado)
		{
			echo "Admin creado correctamente. ";
			$mensaje = 
			"¡Hola!<br>
			Somos del equipo de WebPOS, y hemos creado tus credenciales de acceso. Recuerda que esta contraseña estará disponible durante 24 horas desde su creación.<br>
			Hora de creación: $fecha_correo
			<br>
			<br>
			Tus datos son:<br>
			Usuario: admin$id<br>
			Contraseña: $pass<br>
			
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
		//registrar pass caducable
		$pass_caducable = passCaducable($id, $pass, $fecha, $conexion);
		$sql = 
		"UPDATE usuarios
		SET pass = '$pass'
		WHERE user = 'admin$id'";
		$res = $conexion->query($sql);
		
		if($res)
		{
			echo "Clave modificada correctamente. ";
			$mensaje = 
			"¡Hola!<br>
			Somos del equipo de WebPOS, y hemos cambiado tu contraseña. Recuerda que esta contraseña estará disponible durante 24 horas desde su creación.<br>
			Hora de creación: $fecha_correo
			<br>
			<br>
			Tus datos son:<br>
			Usuario: admin$id<br>
			Contraseña: $pass<br>
			
			Ante cualquier duda o problema, no dudes en contactarte con nosotros.";
			$asunto = "WebPOS - Modificación de contraseña";
			enviarMail($mensaje, $correo, $asunto);
		}
	}

	function passCaducable($id_cl, $pass, $fecha, $conexion)
	{
		$pass."\n";
		//eliminar registro de clave creada previamente
		$sql = 
		"DELETE FROM pass_provisoria WHERE id_cl = '$id_cl'";
		$conexion->query($sql);
		//registrar contraseña en tabla de contraseñas caducables
		$sql =
		"INSERT INTO pass_provisoria 
		VALUES(null, $id_cl, '$pass', '$fecha')";

		return $conexion->query($sql);
	}
?>