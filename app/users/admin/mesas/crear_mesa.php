<?php


	session_start();
	if(isset($_SESSION['user'])){
      	$tipo = $_SESSION['user']['tipo_usuario'];
     	if($tipo == 1){
       	    //header('Location: ../');
     	}
     	    }else{
    	    header('Location: ../../../../index.php');
     	}
     	require_once '../../../conexion.php';


	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
    $id_us = $_SESSION['user']['id'];
    $nombre = $_SESSION['user']["nombre"];
    $id_cl = $_SESSION['user']["id_cl"];
    $piso = 1;

    $nom = $_GET['nomMesa'];
    $numMesa = $_GET['numMesa'];
    $ubic = $_GET['ubic'];
    $fecha = $_GET['fecha'];

	$sql = "INSERT INTO mesas VALUES (null, '$id_cl', '$id_us', '$numMesa', '$nom', '$piso', '$ubic', 'S', '$id_us', 'S', 'N', '$fecha', 'N', '0000-00-00', 'N');
";
	$resultado = mysqli_query($conexion, $sql);

	if($resultado)
	{
		echo "Mesa agregada correctamente";
	}
	else
	{
		die("Error al agregar mesa: ". mysqli_error($conexion));
	}
?>