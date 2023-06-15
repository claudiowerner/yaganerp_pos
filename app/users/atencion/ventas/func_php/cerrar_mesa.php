<?php


error_reporting(E_ALL);
ini_set('display_errors', 'On');
session_start();


require_once '../../../../conexion.php';

if(isset($_SESSION['user']))
{
    $tipo = $_SESSION['user']['tipo_usuario'];
    $id_us = $_SESSION['user']['id'];
    $nombre = $_SESSION['user']["nombre"];
    $id_cl = $_SESSION['user']["id_cl"];
    $piso = 1;
    $idMesa = $_POST["idMesa"];
    $idUbic = $_POST["idUbic"];
    $id_venta = $_POST["id_venta"];
    $fecha = $_POST["fecha"];
    $hora = $_POST["hora"];
    $nom_mesa = $_POST["nomMesa"];

    $arrayNom = explode("-",$nom_mesa);
    $nombre_trim = ltrim($arrayNom[0]);//nombre sin espacios en blanco al principio
    
    //Actualización estado de mesa de ocupado a desocupado
    $sql = 
    "UPDATE mesas m 
    JOIN correlativo c 
    SET m.nom_mesa = '$nombre_trim',
    m.estado_gral = 'S', 
    c.estado = 'C', 
    c.fecha_cierre= '$fecha $hora'
    WHERE c.correlativo = '$id_venta' AND m.id = '$idMesa'";
    $r = mysqli_query($conexion, $sql);

    //actualizar estado mesa_unificada

    $separar_mesas = 
    "UPDATE mesas m
    JOIN mesa_unificada mu 
    ON mu.num_mesa = m.id
    SET mu.estado_gral = 'C',
    m.estado_gral = 'S',
    m.unificada = 'N',
    m.fecha_unificacion = '0000-00-00',
    m.quien_unifico = '0'
    WHERE m.id_cl = $id_cl
    AND m.ubicacion = $idUbic
    AND m.unificada = 'S'
    AND mu.unificada_con = '$idMesa'
    OR mu.num_mesa = '$idMesa'";
    $r2 = mysqli_query($conexion, $separar_mesas);

    $renombrar_mesas = 
    "UPDATE mesas SET nom_mesa = '".ltrim($arrayNom[0])."' 
    WHERE id_cl = $id_cl 
    AND id = '$idMesa'";
    $r3 = mysqli_query($conexion, $renombrar_mesas);


    if($r&&$r2&&$r3)
    {
      echo "¡Venta cerrada!";
    }
}
else
{
  header('Location: ../');
}
?>
