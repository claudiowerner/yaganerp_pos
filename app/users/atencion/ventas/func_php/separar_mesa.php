<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 'On');
    session_start();

    if(isset($_SESSION['user'])){
        require_once '../../../../conexion.php';

        $tipo = $_SESSION['user']['tipo_usuario'];
        $id_us = $_SESSION['user']['id'];
        $nombre = $_SESSION['user']["nombre"];
        $id_cl = $_SESSION['user']["id_cl"];
        
        //procedimientos Array mesas
        $idMesa = $_POST["idMesa"];//mesa origen donde se hace la unificación
        $mesas = $idMesa.",".implode(",",$_POST["mesas"]);
        $mesas = explode(",",$mesas);

        $idUbic = $_POST["idUbic"];

        $claves = array_keys($mesas);
        $master = $mesas[$claves[0]];

        //indice del array de nombre mesas
        $array = 0;
        $i = 0;

        //procedimiento array nombre_mesa. Acá se separa la cadena String y se convierte en un array
        $nombre_mesa = ltrim($_POST["nombreMesa"]);
        $nombre_mesa = explode("-", $nombre_mesa);
        foreach ($mesas as $value)
        {
            //actualizar datos de mesa unificada
            
            /*"UPDATE mesas 
            SET estado_gral = 'S', 
            unificada = 'N',
            fecha_unificacion = '0000-00-00'
            WHERE id_cl = $id_cl 
            AND id = '$value' 
            AND id <> '$master' 
            AND ubicacion = '$idUbic'";*/


            $actualiza = 
            "UPDATE mesas m
            JOIN mesa_unificada mu
            SET m.estado_gral = 'S', 
            m.unificada = 'N',
            m.fecha_unificacion = '0000-00-00',
            mu.estado_gral = 'C'
            WHERE m.id_cl = $id_cl 
            AND m.id = '".$mesas[$i]."'
            AND m.ubicacion = '$idUbic'";
            $resultado = mysqli_query($conexion, $actualiza) or die ("Error al unificar mesa: ".mysqli_error());



            /*UPDATE mesa_unificada 
            SET estado_gral = 'C'
            WHERE id_cl = 1
            AND num_mesa = 1
            AND ubicacion = 1
            AND estado_gral = 'A'*/
            
            //actualizar estado unificación mesa en la tabla mesa_unificada
            $i++;
        
        }

        $nom_mesa_act = ltrim($nombre_mesa[0]);
        $inserta1 = 
        "UPDATE mesas SET nom_mesa = '$nom_mesa_act' 
        WHERE id_cl = $id_cl
        AND id = '$master'
        AND ubicacion = '$idUbic'";
        $resultado2 = mysqli_query($conexion, $inserta1);
        if(mysqli_errno($conexion)!=0)
        {
            echo "Error ".mysqli_errno($conexion).": ".mysqli_error();
        }
        else
        {
            echo "Mesas separadas correctamente";
        }

    }
    else
    {
    header('Location: ../');
    }
?>