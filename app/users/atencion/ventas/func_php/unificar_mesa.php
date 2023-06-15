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
        $fecha = date("Y-m-d");

        $claves = array_keys($mesas);
        $master = $mesas[$claves[0]];

        //indice del array de nombre mesas
        $array = 0;
        $i = 0;

        $nombres_mesa = Array();
        foreach ($mesas as $value)
        {
            $permissions_array[] = (int)$value;

            //buscar nombre de la mesa
            $buscar_nombre = 
            "SELECT nom_mesa FROM mesas WHERE id_cl = $id_cl AND id = ".$mesas[$i];
            $r = mysqli_query($conexion, $buscar_nombre) or die ("Error al obtener nombre de mesa: ".mysqli_error());
            if($r->num_rows!=0)
            {
                while($row = $r->fetch_array())
                {
                    $nombres_mesa[$i] = 
                        $row["nom_mesa"]
                    ;
                    $array++;
                }
            }

            //actualizar datos de mesa unificada
            $actualiza = 
            "UPDATE mesas 
            SET estado_gral = 'A', 
            unificada = 'S',
            fecha_unificacion = '$fecha',
            quien_unifico = '$id_us'
            WHERE id_cl = $id_cl 
            AND id = '$value' 
            AND id <> '$master' 
            AND ubicacion = '$idUbic'";
            $resultado = mysqli_query($conexion, $actualiza) or die ("Error al unificar mesa: ".mysqli_error());


            //insert en tabla mesa_unificada
            $insert_unificar = 
            "INSERT INTO mesa_unificada  VALUES (null, $id_cl, '$id_us', ".$mesas[$i].", $idMesa, '$idUbic', '$id_us', 'A', 'A', '$fecha');
            ";
            $r_insertar = mysqli_query($conexion, $insert_unificar);
            if(!$r_insertar)
            {
                die ("Error al registrar unificación de mesa: ".mysqli_error());
            }
            $i++;
        }
        //$insercion = implode("-", $permissions_array);
        $insercion = implode("-", $nombres_mesa);
        $inserta1 = 
        "UPDATE mesas SET nom_mesa = '$insercion' 
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
            echo "Mesas unificadas correctamente";
        }

    }
    else
    {
    header('Location: ../');
    }
?>