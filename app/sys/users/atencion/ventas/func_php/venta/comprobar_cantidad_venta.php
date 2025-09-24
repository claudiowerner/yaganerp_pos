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
$sql = "SELECT p.cantidad - SUM(v.cantidad) AS cantidad
FROM productos p
JOIN ventas v
ON v.producto = p.id_prod
WHERE p.id_cl = $id_cl 
AND p.id_prod = $idProd
AND v.estado = 'A'
GROUP BY id_prod";
$resultado = $conexion->query($sql);;

while($row = $resultado->fetch_array())
{
    $cantidad = $row["cantidad"];
}
echo $cantidad;


?>