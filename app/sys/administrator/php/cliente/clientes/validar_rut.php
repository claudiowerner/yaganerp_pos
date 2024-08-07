<?php


    error_reporting(E_ALL);
    ini_set('display_errors', 'On');
    session_start();
    require_once '../../../../conexion.php';

    $rut = $_POST["rut"];
    //query
    $sql = "SELECT * FROM cliente WHERE rut = $rut";
    $res = $conexion->query($sql);

    echo $res->num_rows;
?>
