<?php

    session_start();
    $id_us = $_SESSION['user']['id'];
    $nombre = $_SESSION['user']["nombre"];
    $id_cl = $_SESSION['user']["id_cl"];  


    require_once '../../../conexion.php';
    $sql = "SELECT estado FROM config WHERE id_cl='$id_cl' AND id_opcion = 'CV'";
    $resultado = mysqli_query($conexion, $sql);

    if($resultado)
    {
        while($row = $resultado->fetch_array())
        {
            echo $row["estado"];
        }
    }
    else
    {
        die("Error al leer configuración de convenio". mysqli_error($conexion));
    }

?>