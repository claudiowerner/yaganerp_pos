<?php
    require_once '../../../conexion.php';

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    date_default_timezone_set('America/Santiago');

    //id del plan
    $id = $_POST["id"];
    
    $sql = "SELECT * FROM cliente WHERE plan_comprado = $id";
    $res = $conexion->query($sql);
    echo $res -> num_rows;
?>