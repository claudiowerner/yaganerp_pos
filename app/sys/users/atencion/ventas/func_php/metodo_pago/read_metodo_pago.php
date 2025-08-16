<?php

	session_start();

	if(isset($_SESSION['user'])){
		require_once '../../../../../conexion.php';
		require_once '../../../../../php/mb_encoding.php';



		$json = array();
		
		//setear charset
		$conexion -> set_charset("utf8");
		//query
		$sql = 
		"SELECT * FROM metodo_pago";
		$resultado = $conexion->query($sql);;
		if ($resultado->num_rows > 0){
			$json = array();
			while ($row = $resultado->fetch_array()) {
				$json[] =array(
					'id' => $row['id'],
					'nombre_opcion' => mb_encoding($row['nombre_metodo_pago'])
				);
			} 
		}
		
		echo json_encode($json, JSON_UNESCAPED_UNICODE);
	}

?>