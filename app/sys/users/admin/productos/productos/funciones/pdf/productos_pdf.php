<?php

    session_start();
    $id_us = $_SESSION['user']['id'];
    $nombre = $_SESSION['user']["nombre"];
    $id_cl = $_SESSION['user']["id_cl"];
    
	# Incluyendo librerias necesarias #
    require "../../../../../../vendor/fpdf/code128.php";
    require_once '../../../../../../conexion.php';
    include("clases/item.php");
    include("clases/item3.php");
    include("clases/function_normaliza.php");


    //Definición de arrays
    $arrId = array();
    $arrNombre = array();

    
    


    //GENERAR PDF
    
    $pdf = new PDF_Code128('P','mm','A4');
    $pdf->SetMargins(10,10,10,10);
    $pdf->AddPage();
    $pdf->SetTitle("Productos");

    $pdf->SetFont('Helvetica','',12);
    $pdf->SetTextColor(0,0,0);

    //$pdf->MultiCell(0,5,utf8_decode("Cajero: Nombre Persona"),0,'C',false);
    //$pdf->SetFont('Arial','B',10);
    //$pdf->MultiCell(0,5,utf8_decode(strtoupper("Ticket Nro: 1")),0,'C',false);
    //$pdf->SetFont('Arial','',9);

    //$pdf->Ln(1);
    //$pdf->Cell(0,5,utf8_decode("-------------------------------------------------------------------"),0,0,'C');
    
    //Descargar ID de categorias
    $sql = 
    "SELECT id, nombre_cat FROM categorias 
    WHERE id_cl = $id_cl 
    AND estado != 'N'";
    $res = $conexion->query($sql);
    while($row = $res->fetch_array())
    {
        $arrId[] = $row["id"];
        $arrNombre[] = $row["nombre_cat"];
    }
    
    $pdf->Ln(5);

    $cont = count($arrId);
    
    for($i=0; $i<$cont; $i++)
    {
        $id = $arrId[$i];
        //añadir título de categoría al PDF
        $pdf->Cell(10,5,utf8_decode(strtoupper($arrNombre[$i])),0,0,'L');
        $pdf->Ln(5);
        
        //Rellenar según categoria
        $sql = 
        "SELECT nombre_prod, valor_venta FROM productos WHERE categoria = $id AND estado!='N'";
        $res = $conexion->query($sql);
        while($row = $res->fetch_array())
        {
            
            $pdf->Cell(10,5,utf8_decode($row["nombre_prod"]),0,0,'L');
            $pdf->Cell(118,5,utf8_decode("$".$row["valor_venta"]),0,0,'R');
            $pdf->Ln(2);
            $pdf->Cell(10,5,"-----------------------------------------------------------------------------------------",0,0,'L');
            $pdf->Ln(5);
        }

        $pdf->Ln(5);
        $pdf->Ln(5);
    }
    $pdf->Cell(75,5,utf8_decode("TOTAL"),0,0,'R');

    $pdf->Cell(75,5,utf8_decode("----------------------------------------------------------------------------"),0,0,'C');
    $pdf->Ln(5);

    //$pdf->Ln(5);
    //$pdf->Cell(18,5,utf8_decode(""),0,0,'C');
    //$pdf->Cell(22,5,utf8_decode("USTED AHORRA"),0,0,'C');
    //$pdf->Cell(32,5,utf8_decode("$0.00 USD"),0,0,'C');

    //$pdf->Ln(9);
    //$pdf->Ln(45);

    # Codigo de barras #
    //$pdf->Code128(5,$pdf->GetY(),"COD000001V0001",70,20);
    //$pdf->SetXY(0,$pdf->GetY()+21);
    //$pdf->SetFont('Arial','',14);
    //$pdf->MultiCell(0,5,utf8_decode("COD000001V0001"),0,'C',false);
    
    # Nombre del archivo PDF #
    $pdf->Output("I","productos.pdf",true);