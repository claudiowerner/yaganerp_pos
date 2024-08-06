<?php


error_reporting(E_ALL);
ini_set('display_errors', 'On');
session_start();
require_once '../../../../conexion.php';

$json = array();

$sql = "SELECT * FROM plazos_pago";
$res = $conexion->query($sql);

if($res->num_rows!=0)
{
    while($row = $res->fetch_array())
    {
        $json[] = array(
            "registro" => true,
            "meses" => $row["meses"],
            "nombre_plazo" => $row["nombre_plazo"]
        );
    }
}
else
{
    $json = array(
        "registro" => false,
        "meses" => 0,
        "nombre_plazo" => "SIN REGISTRO DE PLAZOS"
    );
}

echo json_encode($json);

?>
