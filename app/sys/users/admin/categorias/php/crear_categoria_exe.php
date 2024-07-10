<?php


	session_start();
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);

	error_reporting(E_ALL);
	if(isset($_SESSION['user'])){
      	$tipo = $_SESSION['user']['tipo_usuario'];
     	if($tipo == 1){
       	    //header('Location: ../');
     	}
     	    }else{
    	    header('Location: ../../../../index.php');
     	}
     	require_once '../../../../conexion.php';

	    $id_us = $_SESSION['user']['id'];
	    $nombre = $_SESSION['user']["nombre"];
	    $id_cl = $_SESSION['user']["id_cl"];
	    

		if(isset($_POST['nomCat']))
		{
			$nom = $_POST['nomCat'];
		    //obtener fecha
		    $hoy = getdate();
		    $fecha = $hoy['year']."-".$hoy['mon']."-".$hoy['mday'];
		    $sql = "INSERT INTO categorias VALUES (null,'$id_cl','$nom','S', '$nombre','$fecha')";
			$resultado = $conexion->query($sql);

			if($resultado)
			{
				echo "Categoría agregada correctamente";
			}
			else
			{
				die("Error al agregar categoría: ". mysqli_error($conexion));
			}
		}
		else
		{
			echo "Error al recibir nombre de piso y su estado";
		}


?>