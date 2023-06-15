<?php 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);

    error_reporting(E_ALL);

    session_start();
    $id_us = $_SESSION['user']['id'];
    $nombre = $_SESSION['user']["nombre"];
    $id_cl = $_SESSION['user']["id_cl"];
    $piso = 1;

    require_once '../../../../conexion.php';

	//query
	$sql= "SELECT * FROM ubicaciones WHERE id_cl = '$id_cl' and estado ='S'";
	$resultado= mysqli_query($conexion, $sql);

        if(!$resultado)
        {
            die('Query error. '.mysqli_error($conexion));
        }

        $json = array();
        while($row=mysqli_fetch_array($resultado))
        {
            $json[] =array(
                'id' => $row['id'],
                'id_cl' => $row['id_cl'],
                'nombre' => $row['nombre'],
                'piso' => $row['piso'],
                'estado' => $row['estado'],
                'creado_por' => $row['creado_por'],
                'fecha_reg' => $row['fecha_reg']);
        } 

        echo json_encode($json);

?>