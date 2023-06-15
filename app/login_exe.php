<?php

if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){

	require 'conexion.php';
	session_start();

	$mysqli->set_charset('utf8');

	$usuario =  $mysqli->real_escape_string($_POST['t_user']);
	$pas = $mysqli->real_escape_string($_POST['t_pass']);

	if ($nueva_consulta = $mysqli->prepare("SELECT id, id_cl, nombre, tipo_usuario FROM usuarios WHERE user = ? AND pass = ? AND estado = 'S' ")){

		$nueva_consulta->bind_param('ss', $usuario, $pas);

		$nueva_consulta->execute();

		$resultado = $nueva_consulta->get_result();

		if($resultado->num_rows > 0){
			$datos = $resultado->fetch_assoc();
			$_SESSION['user'] = $datos;
			echo json_encode(array('error' => false, 'tipo' => $datos['tipo_usuario']));
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
