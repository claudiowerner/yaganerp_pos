<?php
    require("../../../../vendor/fpdf/fpdf.php");
    
    require_once '../../../../conexion.php';


    //usuario

    session_start();
    $id_us = $_SESSION['user']['id'];
    $nombre = $_SESSION['user']["nombre"];
    $id_cl = $_SESSION['user']["id_cl"];
    
    $nombre_caja = $_GET["nombre_caja"];
    $id_cierre = $_GET["id_cierre"];

    
    //Creación de PDF
    $pdf = new FPDF('p', 'mm', array(80,80));
    $pdf->AddPage();
    $pdf->SetTitle("Voucher ".$nombre_caja);
    $pdf->SetFont('courier','',7);
    $pdf->Cell(65,4,utf8_decode("Comprobante de caja"),0,1,"C");
    $pdf->Cell(40,1,utf8_decode('-----------------------------------------'),0,1,"L");
    $pdf->SetFont('courier','B',7);
    $pdf->Cell(0,4,utf8_decode('Turno:  '.$nombre_caja),0,1,"C");
    $pdf->SetFont('courier','',7);
    $pdf->Cell(40,1,utf8_decode('-----------------------------------------'),0,1,"L");
    $pdf->SetFont('courier','B',7);
    $pdf->Cell(15,4,utf8_decode("Forma pago: "),0,0,"L");
    $pdf->Cell(15,4,utf8_decode("Valor: "),0,0,"L");
    $pdf->Cell(15,4,utf8_decode("Propina: "),0,0,"L");
    $pdf->Cell(15,4,utf8_decode("Valor total: "),0,1,"L");
    $pdf->SetFont('courier','',7);

    $sql = 
    "SELECT DATE_FORMAT(cc.hasta,'%d/%m/%Y-%H:%i:%s') 
    AS hasta,
    mp.nombre_metodo_pago,
    SUM(v.valor) AS valor,
    SUM(v.propina) AS propina_total,
    SUM(v.valor+v.propina) AS valor_total
    FROM correlativo c
    JOIN cierre_caja cc
    ON cc.id = c.id_cierre
    JOIN ventas v
    ON v.id_venta = c.correlativo
    JOIN metodo_pago mp
    ON v.forma_pago = mp.id
    JOIN usuarios u 
    ON u.id = v.usuario
    WHERE v.id_cl = 1
    AND c.id_cierre = $id_cierre
    AND v.estado = 'C'
    GROUP BY mp.nombre_metodo_pago";

    $valor_suma = 0;
    $prop_suma = 0;
    $valor_total = 0;
    $fecha = "";

    $resultado = mysqli_query($conexion, $sql);
    while($row = $resultado->fetch_array())
    {
        $pdf->Cell(15,4,utf8_decode(substr($row["nombre_metodo_pago"],0,8)),0,0,"L"); 
        $pdf->Cell(15,4,utf8_decode("$".$row["valor"]),0,0,"R"); 
        $pdf->Cell(15,4,utf8_decode("$".$row["propina_total"]),0,0,"R"); 
        $pdf->Cell(15,4,utf8_decode("$".$row["valor_total"]),0,1,"R"); 
        
        $valor_suma = $row["valor"] + $valor_suma;
        $prop_suma = $row["propina_total"] + $prop_suma;

        $fecha = $row["hasta"];
    }   
    $valor_total = $valor_suma + $prop_suma;
    
    $pdf->SetFont('courier','B',7);
    $pdf->Cell(15,4,utf8_decode("Total"),0,0,"L"); 
    $pdf->Cell(15,4,utf8_decode("$".$valor_suma),0,0,"R"); 
    $pdf->Cell(15,4,utf8_decode("$".$prop_suma),0,0,"R"); 
    $pdf->Cell(15,4,utf8_decode("$".$valor_total),1,1,"R"); 
    $pdf->Cell(15,4,"",0,1,"L"); 
    
    $pdf->SetFont('courier','',7);
    $pdf->Cell(65,4,utf8_decode("Fecha-hora cierre: ".$fecha),0,1,"C");

    
    $pdf->Output();
?>