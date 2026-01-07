<?php

	session_start();
	


	$id_us = $_SESSION['user']['id'];
	$nombre = $_SESSION['user']["nombre"];
	$id_cl = $_SESSION['user']["id_cl"];
	
	require_once '../../../../../../../conexion.php';
	

	$id_temp = $_POST["id_temp"];

	//query
	$sql = 
	"SELECT SUM(pd.valor*pd.cantidad) AS valor	
	FROM pedidos_detalle pd
	JOIN pedidos p 
	ON p.id = pd.id_pedido
	WHERE pd.id_cl = $id_cl
	AND p.estado_pago = 'C'
	AND p.estado = 'C'
	AND pd.estado!='N'
	AND p.temporada = '$id_temp'";
	$resultado = $conexion->query($sql);
	if ($resultado->num_rows > 0){
		
		while ($row = $resultado->fetch_array())
		{
			echo $row["valor"];
		}
	}
	else
	{
		echo "Sin pedidos registrados";
	}

?>
