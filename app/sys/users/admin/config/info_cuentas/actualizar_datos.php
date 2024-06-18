<?php

    session_start();
    $id_us = $_SESSION['user']['id'];
    $nombre = $_SESSION['user']["nombre"];
    $id_cl = $_SESSION['user']["id_cl"];

    $nom_fantasia = $_POST["nom_fantasia"];    
    $razon_social = $_POST["razon_social"];
    $direccion = $_POST["direccion"];
    $correo = $_POST["correo"];
    $telefono = $_POST["telefono"];   
    $giro = $_POST["giro"];    

    require_once '../../../../conexion.php';
    $sql = "UPDATE cliente SET nom_fantasia = '$nom_fantasia', 
                                    razon_social = '$razon_social', 
                                    direccion = '$direccion', 
                                    correo = '$correo', 
                                    telefono = '$telefono', 
                                    giro = '$giro' 
                                    WHERE id = '$id_cl'";
    $resultado = $conexion->query($sql);

    if($resultado)
    {
        echo "Datos guardados correctamente";
    }
    else
    {
        die("Error al modificar datos: ". mysqli_error($conexion));
    }

?>