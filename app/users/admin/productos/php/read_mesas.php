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
	$sql= "SELECT * FROM mesas WHERE id_cl = '$id_cl' and estado ='S'";
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
                'usuario' => $row['usuario'],
                'num_mesa' => $row['num_mesa'],
                'piso' => $row['piso'],
                'ubicacion' => $row['ubicacion'],
                'creado_por' => $row['creado_por'],
                'estado_gral' => $row['estado_gral'],
                'estado_pedido' => $row['estado_pedido'],
                'fecha_reg' => $row['fecha_reg'],
                'unificada' => $row['unificada'],
                'quien_unifico' => $row['quien_unifico'],
                'fecha_unificacion' => $row['fecha_unificacion']);
        } 

        echo json_encode($json);

?>