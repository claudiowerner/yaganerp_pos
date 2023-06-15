<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 'On');
    session_start();

    if(isset($_SESSION['user'])){
        $tipo = $_SESSION['user']['tipo_usuario'];
        $id_us = $_SESSION['user']['id'];
        $nombre = $_SESSION['user']["nombre"];
        $id_cl = $_SESSION['user']["id_cl"];
        $piso = "";
        $nMesa = $_POST["nMesa"];

        require_once '../../../../conexion.php';

        //query
        $consulta = "SELECT p.nombre AS nom_piso, u.id AS id_ubic, u.nombre AS nom_ubic, m.nom_mesa AS nom_mesa 
        FROM pisos p
        JOIN ubicaciones u ON p.id = u.piso 
        JOIN mesas m ON u.id = m.ubicacion 
        WHERE m.id_cl = $id_cl AND m.id = $nMesa";
        $resultado = $conexion->query($consulta);
        $json = array();

        while($row = $resultado->fetch_array())
        {
            $json[] =array(
                'id_ubic' => $row['id_ubic'],
                'nom_piso' => $row['nom_piso'],
                'nom_ubic' => $row['nom_ubic'],
                'nom_mesa' => $row['nom_mesa']
            );
        }

        echo json_encode($json);
    }
?>