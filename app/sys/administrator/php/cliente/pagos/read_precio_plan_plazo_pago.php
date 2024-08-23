

<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 'On');
    session_start();
    require_once '../../../../conexion.php';

	date_default_timezone_set('America/Santiago');

    $id = $_POST["id_plan"];
    /* -------------------------------------- SELECCIONAR VALOR DEL PLAN COMPRADO -------------------------------------- */
    $sql = "SELECT valor FROM planes WHERE id = $id";
    $res = $conexion->query($sql);
    $array = $res->fetch_array();
    $mostrar = $array["valor"];

    $json = array(
        "valor" => $mostrar
    );

    echo json_encode($json);
    

?>
