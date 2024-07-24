<?php
    $año = $_POST["año"];
    $mes = $_POST["mes"];
    $numero_dias = cal_days_in_month(CAL_GREGORIAN, $mes, $año);
    $json = array();

    for($i=0; $i<$numero_dias; $i++)
    {
        $dia = date("l", mktime(0, 0, 0, $mes, ($i+1), $año));
        $fecha = ($i+1);
        $json[] = array(
            "dia" => $dia,
            "fecha" => $fecha,
            "n_dias" => $numero_dias
        );
    }

    echo json_encode($json);
?>