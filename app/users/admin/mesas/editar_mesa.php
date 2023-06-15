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

    $id = $_GET['id'];
    $numMesa = $_GET['numMesa'];
    $nomMesa = $_GET['nomMesa'];
    $ubic = $_GET['ubic'];
    $estado = $_GET['estado'];

    if($estado == "ACTIVADO")
    {
    	$estado = "S";
    }
    if($estado == "DESACTIVADO")
    {
    	$estado = "N";
    }


    //obtener fecha
	$hoy = getdate();
	$fecha = $hoy['year']."-".$hoy['mon']."-".$hoy['mday'];
	$sql = "UPDATE mesas SET `num_mesa` = '$numMesa', `nom_mesa` = '$nomMesa', `ubicacion` = '$ubic', `estado` = '$estado' WHERE id_cl=$id_cl AND id = $id;";
	$resultado = mysqli_query($conexion, $sql);

	if($resultado)
	{
		echo "Mesa editada correctamente";
	}
	else
	{
		die("Error al modificar mesa: ". mysqli_error($conexion));
	}
?>