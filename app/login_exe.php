<?php

if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){

	require 'conexion.php';
	session_start();

	$mysqli->set_charset('utf8');

	$usuario = $mysqli->real_escape_string($_POST['t_user']);
	$pas = $mysqli->real_escape_string($_POST['t_pass']);


	//consulta para verificar si existe una password temporal
	if ($pass_provisoria = $mysqli->prepare("SELECT * FROM pass_provisoria WHERE pass = ? "))
	{
		$pass_provisoria->bind_param('s', $pass);

		$pass_provisoria->execute();

		$resultado = $pass_provisoria->get_result();

		if($resultado->num_rows > 0)
		{
			$datos = $resultado->fetch_assoc();
		}
	}
	//consulta para iniciar sesion
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
					echo json_encode(array('error' => false, 'tipo' => $datos['tipo_usuario']));
				}
				else
				{
					echo json_encode(array('error' => true));
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

$mysqli->close();

?>
