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
        $consulta = 
        "SELECT m.id AS id_mesa,
        m.num_mesa,
        m.nom_mesa
        FROM mesas m
		JOIN mesa_unificada mu 
        ON mu.num_mesa = m.id
		WHERE m.id_cl = $id_cl
        AND m.ubicacion = $id_ubic
        AND m.id != $idMesa
        AND mu.estado_gral = 'A'";
        $resultado = $conexion->query($consulta);

        
        if ($resultado->num_rows > 0){
            $json = array();
            while ($row = $resultado->fetch_array())
            {
                $json[] =array(
                    'id' => $row['id_mesa'],
                    'num_mesa' => $row['num_mesa'],
                    'nom_mesa' => $row['nom_mesa']
                );
            }
            echo json_encode($json);
        }

    }
    else
    {
    header('Location: ../');
    }
?>