<?php
session_start();
$tipo = $_SESSION['user']['tipo_usuario'];
$id_us = $_SESSION['user']['id'];
$nombre = $_SESSION['user']["nombre"];
$id_cl = $_SESSION['user']["id_cl"];

$id_caja = 0;
$idProd = $_POST["idProd"];
require_once '../../../../../conexion.php';

//query
$sql = "SELECT cantidad FROM productos WHERE id_cl = $id_cl AND id_prod = $idProd";
$resultado = $conexion->query($sql);;

while($row = $resultado->fetch_array())
{
    $cantidad = $row["cantidad"];
}
echo $cantidad;


?>