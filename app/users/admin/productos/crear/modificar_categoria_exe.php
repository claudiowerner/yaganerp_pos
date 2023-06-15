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
	    $id_cat = $_POST['idCat'];
	    $piso = 1;

		if(isset($_POST['nomCat'])&&isset($_POST['estadoCat']))
		{
			$nom = $_POST['nomCat'];
			$estado = $_POST['estadoCat'];

		    //obtener fecha
		    $hoy = getdate();
		    $fecha = $hoy['year']."-".$hoy['mon']."-".$hoy['mday'];
		    $sql = "UPDATE categorias SET nombre_cat = '$nom', estado = '$estado' where id = '$id_cat'";
			$resultado = mysqli_query($conexion, $sql);

			if($resultado)
			{
				echo "Categoría modificada correctamente";
			}
			else
			{
				die("Error al modificar categoría: ". mysqli_error($conexion));
			}
		}
		else
		{
			echo "Error al recibir datos para modificar la categoría";
		}


?>