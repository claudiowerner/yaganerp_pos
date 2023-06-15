<?php
    require("../../../../vendor/fpdf/fpdf.php");
    
    require_once '../../../../conexion.php';


    //usuario

    session_start();
    $id_us = $_SESSION['user']['id'];
    $nombre = $_SESSION['user']["nombre"];
    $id_cl = $_SESSION['user']["id_cl"];
    
    $nMesa = $_GET["nMesa"];

    
    //Creación de PDF
    $pdf = new FPDF('p', 'mm', array(80,80));
    $pdf->AddPage();
    $pdf->SetTitle("Cuenta mesa ".$nMesa);
    $pdf->SetFont('courier','',7);
    $pdf->Cell(40,4,utf8_decode(''),0,11,"L");
    $pdf->Cell(40,4,utf8_decode(''),0,11,"L");
    $pdf->Cell(40,4,utf8_decode(''),0,11,"L");
    $pdf->Cell(40,4,utf8_decode(''),0,11,"L");
    $pdf->Cell(40,1,utf8_decode('-----------------------------------------'),0,1,"L");
    $pdf->Cell(37,4,utf8_decode("Comanda cocina"),0,0,"R");
    $pdf->SetFont('courier','B',7);
    $pdf->Cell(0,4,utf8_decode('Mesa '.$nMesa),0,1,"L");
    $pdf->Cell(40,1,utf8_decode('-----------------------------------------'),0,1,"L");
    $pdf->SetFont('courier','B',7);
    $pdf->Cell(30,4,utf8_decode('Producto'),0,0,"L");
    $pdf->Cell(20,4,utf8_decode('Cantidad'),0,0,"L");
    $pdf->Cell(10,4,utf8_decode('Estado'),0,1,"L");
    $pdf->SetFont('courier','',7);

    $consulta_bd = "SELECT v.id_venta, p.nombre_prod, v.cantidad, v.valor, v.propina, (v.valor+v.propina) AS valor_total FROM ventas v
    JOIN productos p ON p.id_prod = v.producto 
    WHERE v.id_cl = 1 AND v.estado = 'A' 
    AND v.mesa = '$nMesa' 
    AND p.comanda_cocina='S' ORDER BY v.id ASC";

    $resultado = mysqli_query($conexion, $consulta_bd);
    $nVenta = "";
    while($row = $resultado->fetch_array())
    {
      $nVenta = $row["id_venta"];
      $pdf->Cell(30,4,utf8_decode(substr($row["nombre_prod"], 0, 20)),1,0,"L");
      $pdf->Cell(20,4,utf8_decode($row["cantidad"]),1,0,"L");
      $pdf->Cell(10,4,"",1,1,"L");
    }

    $pdf->SetFont('courier','B',7);
    $pdf->Cell(26,4,utf8_decode(("Núm. de venta : ")),0,0,"R");
    $pdf->Cell(30,4,utf8_decode($nVenta),0,1,"L");
    
    
    $pdf->Output();
?>