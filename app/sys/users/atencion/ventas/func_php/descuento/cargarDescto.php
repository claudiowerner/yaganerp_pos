<?php

	session_start();

	require_once '../../../../../conexion.php';

	//query
	$id_cl = $_SESSION['user']["id_cl"];
	$idVenta = $_POST['correlativo'];

	$sql = 
	"SELECT descuento
	FROM correlativo
	WHERE id_cl = $id_cl  
	AND correlativo = $idVenta 
	GROUP BY correlativo" ;
	$resultado = $conexion->query($sql);;
	$descto = 0;
	if ($resultado->num_rows > 0)
	{
		while ($row = $resultado->fetch_array())
		{
			$descto = $row['descuento'];
		}
		echo $descto;
	}
?>
