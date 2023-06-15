<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 'On');
    session_start();

    if(isset($_SESSION['user'])){
        $tipo = $_SESSION['user']['tipo_usuario'];
        $id_us = $_SESSION['user']['id'];
        $nombre = $_SESSION['user']["nombre"];
        $id_cl = $_SESSION['user']["id_cl"];
        $piso = 1;
        $id_caja = 0;

        $id_ubic = $_GET["idUbic"];
        $idMesa = $_GET["idMesa"];

        require_once '../../../../conexion.php';

        //query
        $consulta = "SELECT * FROM mesas WHERE id_cl = $id_cl 
        AND ubicacion = $id_ubic 
        AND id != $idMesa
        AND estado_gral = 'S'";
        $resultado = $conexion->query($consulta);

        
        if ($resultado->num_rows > 0){
            $json = array();
            while ($row = $resultado->fetch_array())
            {
            $json[] =array(
                'id' => $row['id'],
                'num_mesa' => $row['num_mesa'],
                'nom_mesa' => $row['nom_mesa'],
                'estado_gral' => $row['estado_gral'],
                'ubicacion' => $row['ubicacion']
            );
            }
            echo json_encode($json);
        }
        else
        {
            echo json_encode("s/r");
        }

    }
    else
    {
    header('Location: ../');
    }
?>