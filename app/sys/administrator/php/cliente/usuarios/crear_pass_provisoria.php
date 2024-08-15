<?php


    function passCaducable($id_cl, $pass, $fecha, $conexion)
    {
        $pass."\n";
        //eliminar registro de clave creada previamente
        $sql = 
        "DELETE FROM pass_provisoria WHERE id_cl = '$id_cl'";
        $conexion->query($sql);;
        //registrar contraseña en tabla de contraseñas caducables
        $sql =
        "INSERT INTO pass_provisoria 
        VALUES(null, $id_cl, '$pass', '$fecha')";

        return $conexion->query($sql);;
    }




?>