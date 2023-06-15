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
    $consulta = "SELECT id, nombre FROM pisos WHERE id_cl = '$id_cl' ";
    $resultado = $conexion->query($consulta);
    if ($resultado->num_rows > 0){
    $json = array();
    while ($row = $resultado->fetch_array()) {
         $json[] =array(
             'id' => $row['id'],
             'nombre' => $row['nombre']);
       }
       echo json_encode($json);
     }


?>