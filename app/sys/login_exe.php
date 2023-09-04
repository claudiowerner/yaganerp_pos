<?php

if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){

	require 'conexion.php';
	session_start();

	$mysqli->set_charset('utf8');

	$usuario = $mysqli->real_escape_string($_POST['t_user']);
	$pas = $mysqli->real_escape_string($_POST['t_pass']);

	
	$hoy = getdate();
	$fecha = $hoy['year']."-".$hoy['mon']."-".$hoy['mday']." ".$hoy["hours"].":".$hoy["minutes"].":".$hoy["seconds"];



	//consulta para verificar si existe una password temporal
	if ($pass_provisoria = $mysqli->prepare("SELECT * FROM pass_provisoria WHERE pass = ? "))
	{
		$pass_provisoria->bind_param('s', $pas);

		$pass_provisoria->execute();

		$resultado = $pass_provisoria->get_result();

		if($resultado->num_rows > 0)
		{
			$datos = $resultado->fetch_assoc();
			$fecha_bd = new DateTime($datos["fecha"]);
			$fecha_hoy = new DateTime($fecha);

			//se calcula el total de horas pasadas a partir de la generación de la clave provisoria
			$diferencia = $fecha_bd->diff($fecha_hoy);

			$dias = $diferencia -> format('%d');

			if($dias==0)
			{
				if ($nueva_consulta = $mysqli->prepare("SELECT u.id, u.id_cl, u.nombre, u.pass, u.tipo_usuario FROM usuarios u JOIN cliente c ON c.id = u.id_cl WHERE u.user = ? AND u.estado = 'S' AND c.estado = 'S'"))
				{
					$nueva_consulta->bind_param('s', $usuario);

					$nueva_consulta->execute();

					$resultado = $nueva_consulta->get_result();

					if($resultado->num_rows > 0){
						$datos = $resultado->fetch_assoc();
						if(password_verify($pas, $datos["pass"]))
						{
							unset($datos["pass"]);
							$_SESSION['user'] = $datos;
							echo json_encode(array('error' => false, 'tipo' => $datos['tipo_usuario']));
						}
						else
						{
							if($pas == $datos["pass"])
							{
								unset($datos["pass"]);
								$_SESSION['user'] = $datos;
								echo json_encode(array('error' => false, 'tipo' => $datos['tipo_usuario'], "renovar"=>true));
							}
							else
							{
								echo json_encode(array('error' => true,'mensaje' => 'Los datos ingresados no son correctos. Intente nuevamente.'));
							}
						}
					}
					else
					{
						echo json_encode(array('error' => true));
					}
					$nueva_consulta->close();
				}
			}
			else
			{
				echo json_encode(array('error' => true,'mensaje' => 'Su contraseña provisoria ya caducó. Póngase en contacto con el equipo de WebPOS. Días transcurridos: '.$dias));
			}
		}
		else
		{
			if ($nueva_consulta = $mysqli->prepare("SELECT u.id, u.id_cl, u.nombre, u.pass, u.tipo_usuario FROM usuarios u JOIN cliente c ON c.id = u.id_cl WHERE u.user = ? AND u.estado = 'S' AND c.estado = 'S'"))
			{
				$nueva_consulta->bind_param('s', $usuario);

				$nueva_consulta->execute();

				$resultado = $nueva_consulta->get_result();

				if($resultado->num_rows > 0)
				{
					$datos = $resultado->fetch_assoc();
					if(password_verify($pas, $datos["pass"]))
					{
						unset($datos["pass"]);
						$_SESSION['user'] = $datos;
						echo json_encode(array('error' => false, 'tipo' => $datos['tipo_usuario']));
					}
					else
					{
						if($pas == $datos["pass"])
						{
							unset($datos["pass"]);
							$_SESSION['user'] = $datos;
							echo json_encode(array('error' => false, 'tipo' => $datos['tipo_usuario'], ""));
						}
						else
						{
							echo json_encode(array('error' => true,'mensaje' => 'Los datos ingresados no son correctos. Intente nuevamente.'));
						}
					}
				}
				else
				{
					echo json_encode(array('error' => true,"mensaje"=>'Los datos ingresados no son correctos. Intente nuevamente.'));
				}
				$nueva_consulta->close();
			}
		}
	}
}


$mysqli->close();

?>
