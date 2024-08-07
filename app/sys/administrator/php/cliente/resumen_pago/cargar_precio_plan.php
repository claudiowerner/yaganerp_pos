<?php


    error_reporting(E_ALL);
    ini_set('display_errors', 'On');
    session_start();
    require_once '../../../../conexion.php';



    $id_plan = $_POST["id_plan"];

    $sql = "SELECT valor FROM planes WHERE id = $id_plan";
    $res = $conexion->query($sql);
    $resultado = $res -> fetch_array();

    echo $resultado["valor"];

?>