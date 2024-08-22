

<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 'On');
    session_start();
    require_once '../../../conexion.php';

	date_default_timezone_set('America/Santiago');

    $id = $_POST["id_cl"];
    //query
    $sql =
    "SELECT plan_comprado FROM cliente WHERE id = $id_cl";
    $res = $conexion->query($sql);

?>
