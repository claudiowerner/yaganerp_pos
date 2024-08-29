<?php

	date_default_timezone_set('America/Santiago');
	require_once '../../../../conexion.php';
	//require_once '../correo.php';

	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

    /* --------------------------------------------- DECLARACIÓN DE VARIABLES --------------------------------------- */
    $pago = $_POST["pago"]; 
    $cl = $_POST["cl"]; 
    $metodo = $_POST["metodo"]; 
    $periodo = $_POST["periodo"];
    $plan = $_POST["plan"];

    //Variables de registro
    $rc = "";
    $rp = "";
    $res_plazo = "";
    $rum = "";
    $rrd = "";
    $rrp = "";
    $rrc = "";

    //contador de acciones que resultaron. De esto depende si el mensaje que se muestra en pantalla es de "modificación correcta" o no
    $modificacion = 0;

    //Definicion de JSON que se mostrará en pantalla
    $json = array();
    /* ------------------------------------------------ DEFINICION DE FECHAS ---------------------------------------- */
    $f = getdate();
    $año = $f["year"];
    $mes = $f["mon"];
    $dia = $f["mday"];

    if($mes<10)
    {
        $mes = "0$mes";
    }
    if($dia<10)
    {
        $dia = "0$dia";
    }
    $fecha = "$año-$mes-$dia";

    /* ----------------------------------------- INSERTAR CAMBIO DE PLAN -------------------------------------------- */
    //Seleccionar plan comprado por el cliente
    $sql = "SELECT plan_comprado FROM cliente WHERE id = $cl";
    $res = $conexion->query($sql);
    $array = $res->fetch_array();
    $plan_bd = $array["plan_comprado"];

    $cambio_plan = "N";

    //verificar si el plan registrado en la BD coincide con el enviado desde el DOM
    if($plan!=$plan_bd)
    {
        //actualizar tabla cliente
        $sql = "UPDATE cliente SET plan_comprado = $plan WHERE id = $cl";
        $rc = $conexion->query($sql);
        if(!$rc)
        {
            $json = array(
                "editar" => false, 
                "titulo" => "Error", 
                "mensaje" => "Ocurrió un error al modificar datos relacionados con el cliente",
                "icono" => "error"
            );
            die(json_encode($json));
        }
        else
        {
            $modificacion++;
        }

        //actualizar tabla pago_cliente
        $sql = "UPDATE pago_cliente SET plan = $plan WHERE id = $pago";
        $rp = $conexion->query($sql);
        if(!$rp)
        {
            $json = array(
                "editar" => false, 
                "titulo" => "Error", 
                "mensaje" => "Ocurrió un error al modificar datos relacionados con el pago",
                "icono" => "error"
            );
            die(json_encode($json));
        }
        else
        {
            $modificacion++;
        }
        //Actualizar tabla cambio_plan
        $sql = 
        "UPDATE cambio_plan SET estado_cambio = 'N' WHERE id_cl = $cl";
        $ruc = $conexion->query($sql);
        //Insertar en tabla cambio_plan
        $sql = 
        "INSERT INTO cambio_plan 
        VALUES(null, $cl, $plan_bd, $plan, 'S', '$fecha');";
        $rrc = $conexion->query($sql);
        if(!$rrc)
        {
            $json = array(
                "editar" => false, 
                "titulo" => "Error", 
                "mensaje" => "Ocurrió un error al registrar el cambio de plan",
                "icono" => "error"
            );
            die(json_encode($json));
        }
        else
        {
            $modificacion++;
        }

        $cambio_plan = "S";

    }
    
    /* ------------------------------------------- INSERTAR CAMBIO PERIODO --------------------------------------- */
    //Seleccionar periodo seleccionado por el cliente
    $sql = "SELECT plazo_pago FROM cliente WHERE id = $cl";
    $res = $conexion->query($sql);
    $array = $res->fetch_array();
    $periodo_bd = $array["plazo_pago"];
    
    $cambio_plazo = "N";

    if($periodo!=$periodo_bd)
    {
        $cambio_plazo = "S";
        $sql = "UPDATE cliente SET plazo_pago = $periodo WHERE id = $cl";
        $res_plazo = $conexion->query($sql);
        if(!$res_plazo)
        {
            $json = array(
                "editar" => false, 
                "titulo" => "Error", 
                "mensaje" => "Ocurrió un error al modificar el plazo de pago.",
                "icono" => "error"
            );
            die(json_encode($json));
        }
        else
        {
            $modificacion++;
        }

        //Actualizar tabla cambio_periodo
        $sql = 
        "UPDATE cambio_periodo SET estado_cambio = 'N' WHERE id_cl = $cl";
        $rrc = $conexion->query($sql);
        if(!$rrc)
        {
            $json = array(
                "editar" => false, 
                "titulo" => "Error", 
                "mensaje" => "Ocurrió un error al modificar el cambio de periodo",
                "icono" => "error"
            );
            die(json_encode($json));
        }
        else
        {
            $modificacion++;
        }

        //Seleccionar fecha de inicio
        $sql = "SELECT fecha_desde FROM pago_cliente WHERE id = $pago";
        $res = $conexion->query($sql);
        $array = $res->fetch_array();
        $fecha_desde = $array["fecha_desde"];

        //-------------------calculo de fecha fin
        //tokenize de fecha
        $arr_fecha = explode("-", $fecha_desde);
        $año_nuevo = $arr_fecha[0];
        $mes_nuevo = $arr_fecha[1];
        $dia_nuevo = ($arr_fecha[2]-1);
        $mes_plazo = $periodo + $mes_nuevo;
        //Verificar si el mes de plazo resultante es mayor a 12
        if($mes_plazo>12)
        {
            $mes_plazo = $mes_plazo - 12;
            $año_nuevo++;
        }
        //Si el mes resultante de fin de plazo es Febrero
        if($mes_plazo==2)
        {
            //verificar si el año es bisiesto o no
            $año_bisiesto = date('L', strtotime("$año_nuevo-01-01"));
            if($año_bisiesto)
            {
                if($dia_nuevo>=29)
                {
                    $dia_nuevo = 29;
                }
            }
            else
            {
                if($dia_nuevo>28)
                {
                    $dia_nuevo = 28;
                }
            }
        }
        $fecha_nueva = "$año_nuevo-$mes_plazo-$dia_nuevo";

        //actualizar fecha fin 
        $sql = "UPDATE pago_cliente SET fecha_hasta = '$fecha_nueva' WHERE id = $pago";
        $res = $conexion->query($sql);
        if(!$res)
        {
            $json = array(
                "editar" => false, 
                "titulo" => "Error", 
                "mensaje" => "Ocurrió un error al editar la fecha del fin del periodo de pago",
                "icono" => "error"
            );
            die(json_encode($json));
        }
        else
        {
            $modificacion++;
        }
        
        //Insertar en tabla cambio_plan
        $sql = 
        "INSERT INTO cambio_periodo
        VALUES(null, $cl, $plan_bd, $plan, 'S', '$fecha');";
        $rrp = $conexion->query($sql);

        if(!$rrp)
        {
            $json = array(
                "editar" => false, 
                "titulo" => "Error", 
                "mensaje" => "Ocurrió un error al registrar el cambio de periodo",
                "icono" => "error"
            );
            die(json_encode($json));
        }
        else
        {
            $modificacion++;
        }
    }
    /* ----------------------------------------- VERIFICAR MÉTODO DE PAGO -------------------------------------------- */
    $sql = "SELECT metodo_pago FROM pago_cliente WHERE id = $pago";
    $res = $conexion->query($sql);
    $array = $res->fetch_array();
    $metodo_pago_bd = $array["metodo_pago"];

    //verificar si el método de pago de la BD y el indicado en el DOM es distinto 
    if($metodo_pago_bd!=$metodo)
    {
        $sql = "UPDATE pago_cliente SET metodo_pago = $metodo WHERE id = $pago";
        $rum = $conexion->query($sql);
        if(!$rum)
        {
            $json = array(
                "editar" => false, 
                "titulo" => "Error", 
                "mensaje" => "Ocurrió un error al actualizar el método de pago.",
                "icono" => "error"
            );
            die(json_encode($json));
        }
        else
        {
            $modificacion++;
        }
    }


    /* ---------------------------------- VERIFICAR SI EXISTEN CAMBIOS EN EL PAGO ------------------------------------ */
    
    $dif_metodo_pago = $metodo_pago_bd-$metodo;
    
    if($cambio_plan=="S"||$cambio_plazo=="S"||$dif_metodo_pago!=0||$modificacion!=0)
    {
        $sql_cambio = "INSERT INTO diferencia_pago VALUES
        (null, $cl, '$cambio_plan', '$cambio_plazo', 'S')";
        $rrd = $conexion->query($sql_cambio);

        $json = array(
            "editar" => true,
            "titulo" => "Excelente",
            "mensaje" => "Cambios registrados correctamente.",
            "icono" => "success"
        );
    }
    else
    {
        $json = array(
            "editar" => false,
            "titulo" => "Aviso",
            "mensaje" => "No existen cambios a registrar.",
            "icono" => "warning"
        );
    }

    echo json_encode($json);
?>