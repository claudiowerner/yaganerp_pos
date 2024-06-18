<?php

    session_start();
    $id_us = $_SESSION['user']['id'];
    $nombre = $_SESSION['user']["nombre"];
    $id_cl = $_SESSION['user']["id_cl"];
    
	# Incluyendo librerias necesarias #
    require "../../../../vendor/fpdf/code128.php";
    require_once '../../../../conexion.php';
    include("clases/item.php");
    include("clases/item3.php");
    include("clases/function_normaliza.php");
	
    
    $ids = $_GET['id_venta'];

    $descto = 0;
    $valDescto = 0;
    $subtotal = 0;
    $iva = 0;
    $total = 0;
    $valorVenta = 0;//total sin iva

    # descargar datos de la venta
    $sql = 
    "SELECT DATE_FORMAT(fecha, '%d-%m-%Y %H:%i:%s') AS fecha,
    descto, valor
    FROM ventas WHERE id_venta = $ids AND id_cl = $id_cl AND estado!='N'";

    $res = $conexion->query($sql);;
    $cont = 0;
    while($row = $res->fetch_assoc())
    {
        $fecha = $row["fecha"];
        $descto = $row["descto"];
        $valorVenta = $valorVenta + $row["valor"];
        $cont++;
    }
    
    $valDescto = ($descto/100)*$valorVenta;
    $valDescto = round($valDescto);
    $iva = $valorVenta*0.19;
    $iva = round($iva);
    $subtotal = $valorVenta-$iva;
    
    $total = $subtotal + $iva - $valDescto;
    

    $sql = "SELECT v.id_cl, v.id, p.id_prod, v.cantidad AS cantidad, SUM(v.valor) AS valor
    FROM ventas v
    JOIN productos p 
    ON p.id_prod = v.producto 
    WHERE v.id_venta = $ids
    AND v.id_cl = '$id_cl'
    AND v.estado = 'C'
    GROUP BY p.id_prod 
    ORDER BY v.id ASC";
    $result = $conexion->query($sql); or die (mysqli_error());

    //declaracion de arrays
    $id = array();
    $id_prod = array();
    $cantidad = array();
    $valor = array();

    $id_cl = "";
    if ($result->num_rows>0){
        while ($row = $result->fetch_array()){
            $id[] = $row['id'];
            $id_prod[] = $row['id_prod'];
            $cantidad[] = $row['cantidad'];
            $valor[] = $row['valor'];
            $id_cl = $row["id_cl"];
        }
    }
    //descarga de datos de supermercado (nombre de fantasía, etc)
    $sql = 
    "SELECT c.rut, c.nom_fantasia, c.razon_social, 
    c.direccion, c.correo, c.telefono, 
    g.nombre AS nombre_giro, 
    u.nombre AS nombre_usuario 
    FROM cliente c
    JOIN giros g 
    ON g.id = c.giro
    JOIN usuarios u 
    ON u.id_cl = c.id
    WHERE c.id = $id_cl
    AND c.estado='S'
    GROUP BY c.id";
    $resDatos = $conexion->query($sql);;

    //recorrer array valor para rellenar el array items3
    for($i=0;$i<count($id);$i++)
    {
        $items3[] = new item3(normaliza(strtoupper($valor[$i])));
    }


    for($i=0;$i<count($id);$i++)
    {
        $sql = 
        "SELECT * FROM productos 
        WHERE id_prod = '".$id_prod[$i]."' ";
                
        $resultado = $conexion->query($sql);;
            if ($resultado->num_rows > 0)
            {
                while ($qry = $resultado->fetch_array()) 
                {
                $nombre_prod = $qry["nombre_prod"];
                //echo "Producto: ".$nombre_prod." - CANTIDAD: ".$cantidad[$i]; echo "<br>";
                $items[] = new item3(normaliza(strtoupper($nombre_prod))." X ".$cantidad[$i]);
            }
        }
    }


    $pdf = new PDF_Code128('P','mm',array(90,208));
    $pdf->SetMargins(0,0,0,0);
    $pdf->AddPage();
    $pdf->SetTitle("Ticket venta $ids");
    
    $pdf->SetFont('Helvetica','B',8);
    $pdf->SetTextColor(0,0,0);
    
    while($row = $resDatos->fetch_array())
    {
        # Encabezado y datos de la empresa #
        $pdf->SetFont('Helvetica','B',8);
        $pdf->SetTextColor(0,0,0);

        $pdf->MultiCell(0,5,utf8_decode(strtoupper($row["nom_fantasia"])),0,'L',false);
        $pdf->SetFont('Arial','',8);
        $pdf->MultiCell(0,5,utf8_decode("RUT: ".$row["rut"]),0,'L',false);
        $pdf->MultiCell(0,5,utf8_decode(strtoupper($row["razon_social"])),0,'L',false);
        $pdf->MultiCell(0,5,utf8_decode(strtoupper("GIRO: ".$row["nombre_giro"])),0,'L',false);
        $pdf->MultiCell(0,5,utf8_decode(strtoupper("Dirección: ".$row["direccion"])),0,'L',false);
        $pdf->MultiCell(0,5,utf8_decode("CORREO: ".$row["correo"]),0,'L',false);
        $pdf->MultiCell(0,5,utf8_decode(strtoupper("Teléfono: ".$row["telefono"])),0,'L',false);

        
        $pdf->MultiCell(0,5,utf8_decode("COMPROBANTE DE VENTA N° $ids"),0,'L',false);
        $pdf->MultiCell(0,5,utf8_decode("ATENDIDO POR: ".$row["nombre_usuario"]),0,'L',false); //tambien puede ir el nombre de usuario de la caja asignada
        
    }

    $pdf->Ln(1);
    $pdf->Cell(0,5,utf8_decode("------------------------------------------------------"),0,0,'C');
    $pdf->Ln(5);

    $pdf->MultiCell(0,5,utf8_decode("FECHA: $fecha "),0,'L',false);
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
	for($i=0; $i<count($id);$i++)
    {
        $pdf->SetFont('Helvetica','',8);
        $pdf->SetTextColor(0,0,0);
        $pdf->Cell(2,5,utf8_decode($cantidad[$i]),0,0,'C');
        $pdf->Cell(69,5,utf8_decode(substr($items[$i], 0, 40)),0,0,'L');//40 son los caracteres maximos por linea
        $pdf->SetFont('Helvetica','',9);
        $pdf->SetTextColor(0,0,0);
        $pdf->Cell(19,5,utf8_decode("$".$valor[$i]),0,0,'R');
        $pdf->Ln(4);
	
    }
	
    /*----------  Fin Detalles de la tabla  ----------*/

	
    $pdf->Cell(74,5,utf8_decode("-------------------------------------------------------------------------------------------------------"),0,0,'L');
    

    $pdf->Ln(5);
	$pdf->SetFont('Helvetica','B',10);
	$pdf->SetTextColor(0,0,0);
    $pdf->Cell(34,5,utf8_decode(""),0,0,'C');
    $pdf->Cell(37,5,utf8_decode("SUB TOTAL"),0,0,'R');
    $pdf->Cell(19,5,utf8_decode("$$subtotal"),0,0,'R');
	
	$pdf->Ln(4);
    $pdf->Cell(34,5,utf8_decode(""),0,0,'C');
    $pdf->Cell(37,5,utf8_decode("IVA 19%"),0,0,'R');
    $pdf->Cell(19,5,utf8_decode("$$iva"),0,0,'R');
	
	$pdf->Ln(4);
    $pdf->Cell(34,5,utf8_decode(""),0,0,'C');
    $pdf->Cell(37,5,utf8_decode("DESCTO ($descto%)"),0,0,'R');
    $pdf->Cell(19,5,utf8_decode($valDescto),0,0,'R');
	
	$pdf->Ln(4);
    $pdf->Cell(34,5,utf8_decode(""),0,0,'C');
    $pdf->Cell(37,5,utf8_decode("TOTAL"),0,0,'R');
    $pdf->Cell(19,5,utf8_decode("$$total"),0,0,'R');
	

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
    $pdf->Output("I","ticket_venta_$ids f_$fecha.pdf",true);