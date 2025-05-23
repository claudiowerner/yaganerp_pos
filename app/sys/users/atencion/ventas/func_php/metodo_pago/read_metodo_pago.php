<?php

	session_start();

	if(isset($_SESSION['user'])){
		require_once '../../../../../conexion.php';



		$json = array();
		//query
		$sql = 
		"SELECT * FROM metodo_pago";
		$resultado = $conexion->query($sql);;
		if ($resultado->num_rows > 0){
			$json = array();
			while ($row = $resultado->fetch_array()) {
				$json[] =array(
					'id' => $row['id'],
					'nombre_opcion' => $row['nombre_metodo_pago']
				);
			} 
		}
		
		echo json_encode($json, JSON_UNESCAPED_UNICODE);
	}

?>