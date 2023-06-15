<?php

    session_start();
    $id_us = $_SESSION['user']['id'];
    $nombre = $_SESSION['user']["nombre"];
    $id_cl = $_SESSION['user']["id_cl"];  

    $estado = $_POST["estado"];

    require_once '../../../../conexion.php';
    $sql = "UPDATE metodo_pago SET `estado` = '$estado' WHERE id_cl='$id_cl' AND id = '4'";
    $resultado = mysqli_query($conexion, $sql);

    if($resultado)
    {
        echo "Configuración de convenios actualizada";
    }
    else
    {
        die("Error al modificar la configuración de convenio: ". mysqli_error($conexion));
    }

?>