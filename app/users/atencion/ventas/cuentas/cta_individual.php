<?php

require("../../../../vendor/fpdf/fpdf.php");
    
    require_once '../../../../conexion.php';


    //usuario

    session_start();
    $id_us = $_SESSION['user']['id'];
    $nombre = $_SESSION['user']["nombre"];
    $id_cl = $_SESSION['user']["id_cl"];
    

    $forma_pago = $_GET["forma"];
    $fecha_pago = $_GET["fecha"]." ".$_GET["hora"];
    $neto = $_GET["neto"];
    $propina = $_GET["propina"];
    $folio = $_GET["folio"];
    $id_caja =  $_GET["idCaja"];
    $nMesa = $_GET["nMesa"];
    
    $id_venta = explode(",", $_GET["idVenta"]);

    $consulta = "SELECT nom_fantasia, razon_social, direccion, correo, telefono FROM cliente WHERE id = $id_cl ";
    $resultado = $conexion->query($consulta);
    if ($resultado->num_rows > 0){

      $nom_fantasia = "";
      $razon_social = "";
      $direccion = "";
      $correo = "";
      $telefono = "";

      while ($row = $resultado->fetch_array()) 
      {
        $nom_fantasia = $row['nom_fantasia'];
        $razon_social = $row['razon_social'];
        $direccion = $row['direccion'];
        $correo = $row['correo'];
        $telefono = $row['telefono'];
      };
    }

    //Creación de PDF
    $pdf = new FPDF('p', 'mm', array(80,150));
    $pdf->AddPage();
    $pdf->SetTitle("Cuenta individual mesa ".$nMesa);
    $pdf->SetFont('courier','B',16);
    $pdf->Cell(60,10,utf8_decode($nom_fantasia),0,1,"C");
    $pdf->SetFont('courier','',7);
    $pdf->Cell(60,4,utf8_decode($razon_social),0,1,"C");
    $pdf->Cell(60,4,utf8_decode($direccion),0,1,"C");
    $pdf->Cell(60,4,utf8_decode($correo),0,1,"C");
    $pdf->Cell(60,4,utf8_decode($telefono),0,1,"C");
    $pdf->Cell(40,4,utf8_decode(''),0,11,"L");
    $pdf->Cell(40,4,utf8_decode(''),0,11,"L");
    $pdf->Cell(40,4,utf8_decode(''),0,11,"L");
    $pdf->Cell(40,4,utf8_decode(''),0,11,"L");
    $pdf->Cell(40,1,utf8_decode('-----------------------------------------'),0,1,"L");
    $pdf->Cell(60,4,utf8_decode('Cuenta individual'),0,11,"C");
    $pdf->Cell(40,1,utf8_decode('-----------------------------------------'),0,1,"L");
    $pdf->SetFont('courier','B',7);
    $pdf->Cell(14,4,utf8_decode('Prod'),0,0,"L");
    $pdf->Cell(12,4,utf8_decode('Cant'),0,0,"L");
    $pdf->Cell(12,4,utf8_decode('Precio'),0,0,"L");
    $pdf->Cell(12,4,utf8_decode('Prop.'),0,0,"L");
    $pdf->Cell(12,4,utf8_decode('Subtotal'),0,1,"L");
    $pdf->SetFont('courier','',7);


    for($i = 0; $i<count($id_venta);$i++)
    {
      $id = $id_venta[$i];
      $consulta_bd = "SELECT v.id_venta, p.nombre_prod, v.cantidad, v.valor, v.propina, (v.valor+v.propina) 
      AS valor_total FROM ventas v
      JOIN productos p ON p.id_prod = v.producto 
      WHERE v.id_cl = 1 AND v.id_venta = $folio AND v.id = $id ORDER BY v.id ASC";

      $resultado = mysqli_query($conexion, $consulta_bd);
      $nVenta = "";
      while($row = $resultado->fetch_array())
      {
        $nVenta = $row["id_venta"];
        $pdf->Cell(14,4,utf8_decode(substr($row["nombre_prod"], 0, 8)),0,0,"L");
        $pdf->Cell(12,4,utf8_decode($row["cantidad"]),0,0,"C");
        $pdf->Cell(12,4,utf8_decode("$".$row["valor"]),0,0,"R");
        $pdf->Cell(12,4,utf8_decode("$".$row["propina"]),0,0,"R");
        $pdf->Cell(12,4,utf8_decode("$".$row["valor_total"]),0,1,"R");
      }
    }




    $pdf->SetFont('courier','B',7);
    $pdf->Cell(26,4,utf8_decode("Total:"),0,0,"R");
    $pdf->Cell(12,4,utf8_decode("$".$neto),0,0,"R");
    $pdf->Cell(12,4,utf8_decode("$".$propina),0,0,"R");
    $pdf->Cell(12,4,utf8_decode("$".($neto+$propina)),0,1,"R");
    $pdf->Cell(12,4,"",0,1,"R");

    $pdf->SetFont('courier','B',7);
    $pdf->Cell(26,4,utf8_decode(("Núm. de venta : ")),0,0,"R");
    $pdf->SetFont('courier','',7);
    $pdf->Cell(26,4,utf8_decode(($nVenta)),0,1,"L");
    
    $pdf->SetFont('courier','B',7);
    $pdf->Cell(26,4,utf8_decode(("Método de pago: ")),0,0,"L");
    $pdf->SetFont('courier','',7);
    if($forma_pago=="EF")
    {
      $pdf->Cell(22,4,utf8_decode(("EFECTIVO")),0,1,"L");
    }
    if($forma_pago=="TD")
    {
      $pdf->Cell(22,4,utf8_decode(("TARJ. DÉBITO")),0,1,"L");
    }
    if($forma_pago=="TC")
    {
      $pdf->Cell(22,4,utf8_decode(("TARJ. CRÉDITO")),0,1,"L");
    }
    if($forma_pago=="CV")
    {
      $pdf->Cell(22,4,utf8_decode(("CONVENIO")),0,1,"R");
    }
    $pdf->SetFont('courier','B',7);
    $pdf->Cell(26,4,utf8_decode(("Fecha de pago: ")),0,0,"R");
    $pdf->SetFont('courier','',7);
    $pdf->Cell(26,4,utf8_decode(($fecha_pago)),0,1,"L");
    
    $pdf->SetFont('courier','B',7);
    $pdf->Cell(26,4,utf8_decode(("Atendido por: ")),0,0,"R");
    $pdf->SetFont('courier','',7);
    $pdf->Cell(26,4,utf8_decode(($nombre)),0,0,"L");

    
    /*$actualiza = "UPDATE ventas vt
    JOIN correlativo co
      ON co.correlativo = vt.id_venta
    JOIN mesas ms
      ON co.mesa = ms.num_mesa
    JOIN ubicaciones ub
      ON ub.id = vt.ubicacion
    
    SET
    
    vt.estado = 'C',
    vt.forma_pago = '$forma_pago',
    vt.fecha_pago = '$fecha_pago',
    
    co.estado = 'C',
    co.valor = $neto,
    co.propina = $propina,
    co.boleta = '$folio',
    co.forma_pago = '$forma_pago',
    co.fecha_cierre = '$fecha_pago',
    co.id_cierre = '$id_caja',
    
    ms.estado_pedido = 'S',
    ms.estado_gral = 'S'

    WHERE vt.id_cl = '$id_cl' AND vt.id_venta = '$folio' AND co.correlativo = '$folio' AND ms.num_mesa = '$nMesa'";
    
    $result=mysqli_query($conexion,$actualiza);
    
    */
    $pdf->Output();
?>