<?php


session_start();
error_reporting(E_ALL);
ini_set('display_errors', 'On');
if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){

    
    
	if(isset($_SESSION['user'])){
		$tipo = $_SESSION['user']['tipo_usuario'];
		$id_us = $_SESSION['user']['id'];
		$cod_barra = $_SESSION['user']["nombre"];
		$id_cl = $_SESSION['user']["id_cl"];

		require_once '../../../../../../conexion.php';

		//query
		$sql = 
		"SELECT COUNT(*) AS prod_activos 
		FROM productos 
		WHERE id_cl = ?
		AND estado != 'N'";

		if($res = $mysqli->prepare($sql))
		{
			$res->bind_param('i',$id_cl);
			$res -> execute();
			$res = $res->get_result();
			$res = $res->fetch_assoc();

			$json = array(
				"prod_activos" => $res["prod_activos"]
			);
			echo json_encode($json);
		}
	}
	else
	{
		header('Location: ../');
	}
}
?>
