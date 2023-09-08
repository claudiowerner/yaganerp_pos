<?php

	# Incluyendo librerias necesarias #
    require "../../../../vendor/fpdf/code128.php";
	
	$prod1 = 'PRODUCTO DE PRUEBA CON CORTE FINAL DE CARACTERES PARA SALTO DE LINEA MULTICELL';

    $pdf = new PDF_Code128('P','mm',array(90,208));
    $pdf->SetMargins(0,0,0,0);
    $pdf->AddPage();
    
    # Encabezado y datos de la empresa #
    $pdf->SetFont('Helvetica','B',8);
    $pdf->SetTextColor(0,0,0);
    $pdf->MultiCell(0,5,utf8_decode(strtoupper("MARIO ANDRES HENRIQUEZ AZOCAR")),0,'L',false);
    $pdf->SetFont('Arial','',8);
    $pdf->MultiCell(0,5,utf8_decode("RUT: 15.283.098-K"),0,'L',false);
    $pdf->MultiCell(0,5,utf8_decode("EUSEBIO LILLO 43, LLANQUIHUE"),0,'L',false);
    $pdf->MultiCell(0,5,utf8_decode("GIRO: GIRO DE MI NEGOCIO"),0,'L',false);
    $pdf->MultiCell(0,5,utf8_decode("COMPROBANTE DE VENTA N° 67"),0,'L',false);
	$pdf->MultiCell(0,5,utf8_decode("REF. VENDEDOR 15283098K"),0,'L',false); //tambien puede ir el nombre de usuario de la caja asignada

    $pdf->Ln(1);
    $pdf->Cell(0,5,utf8_decode("------------------------------------------------------"),0,0,'C');
    $pdf->Ln(5);

    $pdf->MultiCell(0,5,utf8_decode("FECHA: ".date("Y-m-d H:i:s", strtotime("2023-08-29 22:58:36"))." "),0,'L',false);
    $pdf->MultiCell(0,5,utf8_decode("CAJA N°: 1"),0,'L',false);
    //$pdf->MultiCell(0,5,utf8_decode("Cajero: Nombre Persona"),0,'C',false);
    //$pdf->SetFont('Arial','B',10);
    //$pdf->MultiCell(0,5,utf8_decode(strtoupper("Ticket Nro: 1")),0,'C',false);
    //$pdf->SetFont('Arial','',9);

    //$pdf->Ln(1);
    //$pdf->Cell(0,5,utf8_decode("-------------------------------------------------------------------"),0,0,'C');
    $pdf->Ln(3);

    # Tabla de productos #
    $pdf->Cell(5,5,utf8_decode("#"),0,0,'L');
    $pdf->Cell(10,5,utf8_decode("PRODUCTO"),0,0,'L');
    $pdf->Cell(75,5,utf8_decode("TOTAL"),0,0,'R');

    $pdf->Ln(3);
    $pdf->Cell(75,5,utf8_decode("----------------------------------------------------------------------------"),0,0,'C');
    $pdf->Ln(3);

    /*----------  Detalles de la tabla  ----------*/
	$pdf->SetFont('Helvetica','',8);
	$pdf->SetTextColor(0,0,0);
    $pdf->Cell(2,5,utf8_decode("1"),0,0,'C');
    $pdf->Cell(69,5,utf8_decode(substr($prod1, 0, 40)),0,0,'L');//40 son los caracteres maximos por linea
	$pdf->SetFont('Helvetica','',9);
	$pdf->SetTextColor(0,0,0);
    $pdf->Cell(19,5,utf8_decode("$19.772"),0,0,'R');
    $pdf->Ln(4);
	
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	$pdf->SetFont('Helvetica','',8);
	$pdf->SetTextColor(0,0,0);
    $pdf->Cell(2,5,utf8_decode("1"),0,0,'C');
    $pdf->Cell(69,5,utf8_decode("PRODUCTO DE PRUEBA NUMERO 2"),0,0,'L');
	$pdf->SetFont('Helvetica','',9);
	$pdf->SetTextColor(0,0,0);
    $pdf->Cell(19,5,utf8_decode("$2.106"),0,0,'R');
    $pdf->Ln(4);
	
	$pdf->SetFont('Helvetica','',8);
	$pdf->SetTextColor(0,0,0);
    $pdf->Cell(2,5,utf8_decode("1"),0,0,'C');
    $pdf->Cell(69,5,utf8_decode("PRODUCTO DE PRUEBA NUMERO 3"),0,0,'L');
	$pdf->SetFont('Helvetica','',9);
	$pdf->SetTextColor(0,0,0);
    $pdf->Cell(19,5,utf8_decode("$19.772"),0,0,'R');
    $pdf->Ln(4);
	
	$pdf->SetFont('Helvetica','',8);
	$pdf->SetTextColor(0,0,0);
    $pdf->Cell(2,5,utf8_decode("1"),0,0,'C');
    $pdf->Cell(69,5,utf8_decode("PRODUCTO DE PRUEBA NUMERO 4"),0,0,'L');
	$pdf->SetFont('Helvetica','',9);
	$pdf->SetTextColor(0,0,0);
    $pdf->Cell(19,5,utf8_decode("$850"),0,0,'R');
    $pdf->Ln(4);
	
	$pdf->SetFont('Helvetica','',8);
	$pdf->SetTextColor(0,0,0);
    $pdf->Cell(2,5,utf8_decode("1"),0,0,'C');
    $pdf->Cell(69,5,utf8_decode("PRODUCTO DE PRUEBA NUMERO 5"),0,0,'L');
	$pdf->SetFont('Helvetica','',9);
	$pdf->SetTextColor(0,0,0);
    $pdf->Cell(19,5,utf8_decode("$850"),0,0,'R');
    $pdf->Ln(4);
	
	$pdf->SetFont('Helvetica','',8);
	$pdf->SetTextColor(0,0,0);
    $pdf->Cell(2,5,utf8_decode("1"),0,0,'C');
    $pdf->Cell(69,5,utf8_decode("PRODUCTO DE PRUEBA NUMERO 6"),0,0,'L');
	$pdf->SetFont('Helvetica','',9);
	$pdf->SetTextColor(0,0,0);
    $pdf->Cell(69,5,utf8_decode("$3.062"),0,0,'R');
    $pdf->Ln(4);
	
	$pdf->SetFont('Helvetica','',8);
	$pdf->SetTextColor(0,0,0);
    $pdf->Cell(2,5,utf8_decode("1"),0,0,'C');
    $pdf->Cell(69,5,utf8_decode("PRODUCTO DE PRUEBA NUMERO 7"),0,0,'L');
	$pdf->SetFont('Helvetica','',9);
	$pdf->SetTextColor(0,0,0);
    $pdf->Cell(19,5,utf8_decode("$10.117"),0,0,'R');
    $pdf->Ln(4);
   
    /*----------  Fin Detalles de la tabla  ----------*/

	
    $pdf->Cell(74,5,utf8_decode("-------------------------------------------------------------------------------------------------------"),0,0,'L');
    

    $pdf->Ln(5);
	$pdf->SetFont('Helvetica','B',10);
	$pdf->SetTextColor(0,0,0);
    $pdf->Cell(34,5,utf8_decode(""),0,0,'C');
    $pdf->Cell(37,5,utf8_decode("SUB TOTAL"),0,0,'R');
    $pdf->Cell(19,5,utf8_decode("$38.620"),0,0,'R');
	
	$pdf->Ln(4);
    $pdf->Cell(34,5,utf8_decode(""),0,0,'C');
    $pdf->Cell(37,5,utf8_decode("IVA 19%"),0,0,'R');
    $pdf->Cell(19,5,utf8_decode("$9.060"),0,0,'R');
	
	$pdf->Ln(4);
    $pdf->Cell(34,5,utf8_decode(""),0,0,'C');
    $pdf->Cell(37,5,utf8_decode("TOTAL"),0,0,'R');
    $pdf->Cell(19,5,utf8_decode("$47.680"),0,0,'R');
	

    //$pdf->Ln(5);
    //$pdf->Cell(18,5,utf8_decode(""),0,0,'C');
    //$pdf->Cell(22,5,utf8_decode("USTED AHORRA"),0,0,'C');
    //$pdf->Cell(32,5,utf8_decode("$0.00 USD"),0,0,'C');

    $pdf->Ln(10);
	$pdf->SetFont('Helvetica','',8);
	$pdf->SetTextColor(0,0,0);
    $pdf->MultiCell(0,5,utf8_decode("** COMPROBANTE DE VENTA NO VALIDO COMO BOLETA FISCAL **"),0,'L',false);
	$pdf->MultiCell(0,5,utf8_decode("** CAMBIOS O DEVOLUCIONES, ESTE COMPROBANTE DEBE SER PRESENTADO JUNTO CON EL PRODUCTO EN LAS MISMAS CONDICIONES EN QUE FUE ENTREGADO **"),0,'L',false);

	$pdf->Ln(8);
    $pdf->SetFont('Helvetica','B',9);
    $pdf->Cell(0,7,utf8_decode("GRACIAS POR SU COMPRA"),'',0,'C');

    //$pdf->Ln(9);
    //$pdf->Ln(45);

    # Codigo de barras #
    //$pdf->Code128(5,$pdf->GetY(),"COD000001V0001",70,20);
    //$pdf->SetXY(0,$pdf->GetY()+21);
    //$pdf->SetFont('Arial','',14);
    //$pdf->MultiCell(0,5,utf8_decode("COD000001V0001"),0,'C',false);
    
    # Nombre del archivo PDF #
    $pdf->Output("I","Ticket_Nro_1.pdf",true);