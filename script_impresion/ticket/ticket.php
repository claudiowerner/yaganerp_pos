<?php

include("clases/item.php");
include("clases/item3.php");
require("function_normaliza.php");
require("header.php");

include("conexion.php");

$conexion->set_charset("utf8");

$ids = $_POST['idVenta'];

require "autoload.php";

use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
//use Mike42\Escpos\PrintConnectors\NetworkPrintConnector;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

//$logo = EscposImage::load("bt.jpg", false);

$sql = "SELECT v.id, p.id_prod, v.cantidad, v.valor
FROM ventas v
JOIN productos p ON p.id_prod = v.producto 
AND v.id_venta = $ids
AND v.estado = 'C'
ORDER BY v.id ASC";
$result = mysqli_query($conexion,$sql) or die (mysql_error());

//declaración de variables de calculo de precios
$subtotal = 0;
$iva = 0;
$total = 0;

//declaracion de arrays
$id = array();
$id_prod = array();
$cantidad = array();
$valor = array();
if ($result->num_rows>0){
  while ($row = $result->fetch_array()){
    $id[] = $row['id'];
    $id_prod[] = $row['id_prod'];
    $cantidad[] = $row['cantidad'];
    $valor[] = $row['valor'];
    $total = $row["valor"] + $total;
  }
}

//recorrer array valor para rellenar el array items3
for($i=0;$i<count($id);$i++)
{
  
  $items3[] = new item3(normaliza(strtoupper($valor[$i])));
}


//mysql_connect($server, $db_user, $db_pass) or die (mysql_error());



/*$result = mysql_db_query($database,"SELECT id_mat, id_rep, id, correccion_mat, correccion_rep FROM det_smm WHERE id_smm = '$ids'") or die (mysql_error());
  if (mysql_num_rows($result)>0)
  {
    while ($row = mysql_fetch_array($result))
    {
      $id_mat = $row['id_mat'];
      $id_rep = $row['id_rep'];
      $mat = $row['correccion_mat'];
      $rep = $row['correccion_rep'];
    }
  }
*/

/*$array_id = implode("-", $id);
$array_id_venta = implode("-", $id_venta);
$array_id_prod = implode("-", $id_prod);
$array_cantidad = implode("-", $cantidad);
$array_valor = implode("-", $valor);*/



/*$newArray_id = array();
for($k=0; $k<count($id);$k++)
{
  if ($id_prod[$k]>0){
    $newArray_id[$k] = $id[$k];
  }
}



$newArray_id_prod = array();
for($k=0; $k<count($id);$k++)
{
  if ($id_prod[$k]>0){
    $newArray_id_prod[$k] = $id_prod[$k];
  }
}


$newArray_cantidad = array();
for($k=0; $k<count($id);$k++)
{
  if ($id_prod[$k]>0){
    $newArray_cantidad[$k] = $cantidad[$k];
  }
}

$newArray_valor = array();
for($k=0; $k<count($id);$k++)
{
  if ($id_prod[$k]>0){
    $newArray_valor[$k] = $valor[$k];
  }
}
*/


for($i=0;$i<count($id);$i++){
  $consulta = 
  "SELECT * FROM productos 
  WHERE id_prod = '".$id_prod[$i]."' ";
		
  $resultado = $conexion->query($consulta);
	if ($resultado->num_rows > 0)
  {
    while ($qry = $resultado->fetch_array()) 
    {
      $nombre_prod = $qry["nombre_prod"];
      //echo "Producto: ".$nombre_prod." - CANTIDAD: ".$cantidad[$i]; echo "<br>";
      $items[] = new item3(normaliza(strtoupper($nombre_prod))." X ".$cantidad[$i], $valor[$i]);
		}
	}
}
/*$precios[] = array();
for($i=0;$i<count($id);$i++)
{
	$precios[] = $valor[$i];
}*/


	/* --------------- */

// $date = date('l jS \of F Y h:i:s A');
$date = date('d-m-Y H:i:s');

// Enter the share name for your USB printer here
$connector = new WindowsPrintConnector("smb://192.168.1.20/XP-80CII");
//$connector = new NetworkPrintConnector('192.168.1.25');
$printer = new Printer($connector);

$printer -> selectPrintMode(Printer::MODE_DOUBLE_WIDTH);

$printer -> setJustification(Printer::JUSTIFY_CENTER);
//$printer -> bitImage($logo);

$printer -> feed();
$printer -> setJustification(Printer::JUSTIFY_CENTER);
$printer -> selectPrintMode(Printer::MODE_DOUBLE_WIDTH);
$printer -> setTextSize(1, 1);
$printer -> text("VENTA NRO: ".$ids."\n");
$printer -> feed();
$printer -> setFont(Printer::FONT_B);
$printer -> setTextSize(1, 1);
//$printer -> text("DESTINO: ".$region." - ".$cliente." - ".$centro."\n");
$printer -> feed();
$printer -> selectPrintMode();

/* Title of receipt */
$printer -> setEmphasis(true);
$printer -> text("$date\n");
$printer -> setEmphasis(false);
$printer -> feed();
/* Items */
$printer -> setJustification(Printer::JUSTIFY_LEFT);
$printer -> setEmphasis(true);

$printer -> text("--------------- PRODUCTOS ------------------\n");

foreach ($items as $item1) {
  $printer -> text($item1);
}

$printer -> feed();
/*$printer -> text("--------------- REPUESTOS -------------------\n");
foreach ($items1 as $item1) {
    $printer -> text($item1);
}*/


$printer -> feed();
$printer -> setEmphasis(true);
//subtotal

$subtotal = $total*0.81;
$iva = $total*0.19;


$printer -> text(new item3("Subtotal: ",$subtotal));
$printer -> text(new item3("I.V.A.: ",$iva));
$printer -> setEmphasis(false);
$printer -> feed();
/* Tax and total */
//$printer -> text($tax);

$printer -> selectPrintMode(Printer::MODE_DOUBLE_WIDTH);
$printer -> text(new item3("TOTAL: ",$total));
$printer -> selectPrintMode();
/* Footer */

/* OBSERVACIONES */
$printer -> feed();
$printer -> selectPrintMode(Printer::JUSTIFY_LEFT);
$printer -> text("OBSERVACIONES:\n");

$printer -> setJustification(Printer::JUSTIFY_LEFT);
$printer -> setEmphasis(true);
$printer -> text(new item3(''));
$printer -> setEmphasis(false);


$printer -> feed(2);
/* FIN OBSERVACIONES */

$printer -> feed(2);
$printer -> setJustification(Printer::JUSTIFY_CENTER);
/*
$printer -> feed(1);
$printer -> text("-------------------------------------------\n");
$printer -> text("FIRMA SOLICITANTE\n");
$printer -> text(strtoupper($operador)."\n");
$printer -> text("RUT: ".$rut."\n");*/

$printer -> feed(2);

$printer->setJustification();
// Reset
/* Barcodes - see barcode.php for more detail */
$printer -> setBarcodeHeight(80);
$printer -> setJustification(Printer::JUSTIFY_CENTER);
$printer -> setBarcodeTextPosition(Printer::BARCODE_TEXT_BELOW);
//$printer -> barcode($cod_barras);
$printer -> feed(2);

/* Cut the receipt and open the cash drawer */
$printer -> cut();

/*$printer -> selectPrintMode(Printer::MODE_DOUBLE_WIDTH);

$printer -> setJustification(Printer::JUSTIFY_CENTER);
//$printer -> bitImage($logo);

$printer -> feed();
$printer -> setJustification(Printer::JUSTIFY_CENTER);
$printer -> selectPrintMode(Printer::MODE_DOUBLE_WIDTH);
$printer -> setTextSize(1, 1);
$printer -> text("COMPROBANTE SALIDA BODEGA N: ".$ids."\n");
$printer -> feed();
$printer -> setFont(Printer::FONT_B);
$printer -> setTextSize(1, 1);
//$printer -> text("DESTINO: ".$region." - ".$cliente." - ".$centro."\n");
$printer -> feed();
$printer -> selectPrintMode();
//$printer -> text("ATENDIDO POR: ".strtoupper($nombre)."\n");

//$printer -> feed();

/* Title of receipt */
/*$printer -> setEmphasis(true);
$printer -> text("$date\n");
$printer -> setEmphasis(false);
$printer -> feed();
/* Items */
/*$printer -> setJustification(Printer::JUSTIFY_LEFT);
$printer -> setEmphasis(true);

/*$printer -> text("--------------- MATERIALES ------------------\n");
foreach ($items as $item) {
    $printer -> text($item);
}

$printer -> feed();
$printer -> text("--------------- REPUESTOS -------------------\n");

foreach ($items1 as $item1) {
    $printer -> text($item1);
}

$printer -> feed();
$printer -> setEmphasis(true);
$printer -> text($subtotal);
$printer -> setEmphasis(false);
$printer -> feed();
/* Tax and total */
//$printer -> text($tax);
/*$printer -> selectPrintMode(Printer::MODE_DOUBLE_WIDTH);
//$printer -> text($total);
$printer -> selectPrintMode();

/* OBSERVACIONES */
/*$printer -> feed();
$printer -> selectPrintMode(Printer::JUSTIFY_LEFT);
$printer -> text("OBSERVACIONES:\n");

$printer -> setJustification(Printer::JUSTIFY_LEFT);
$printer -> setEmphasis(true);
$printer -> text(new item3(''));
$printer -> setEmphasis(false);
foreach ($items3 as $item3) {
  $printer -> text($item3);
}

$printer -> feed(2);
/* FIN OBSERVACIONES */
/* Footer */
/*$printer -> feed(2);
$printer -> setJustification(Printer::JUSTIFY_CENTER);

$printer -> feed(1);
$printer -> text("-------------------------------------------\n");
$printer -> text("COMPROBANTE SOLICITANTE.\n");
//$printer -> text(strtoupper($operador)."\n");
//$printer -> text("RUT: ".$rut."\n");
$printer -> feed(2);

$printer->setJustification();
// Reset
/* Barcodes - see barcode.php for more detail */
/*$printer -> setBarcodeHeight(80);
$printer -> setJustification(Printer::JUSTIFY_CENTER);
$printer -> setBarcodeTextPosition(Printer::BARCODE_TEXT_BELOW);
//$printer -> barcode($cod_barras);
$printer -> feed();
//$printer -> text("www.facebook.com/nativo.restobar.35\n");
//$printer -> text("AVDA. VICENTE PEREZ ROSALES ESQ. CANDELARIA\n");
//$printer -> text("LLANQUIHUE - X REGION DE LOS LAGOS\n");
$printer -> feed(2);

$printer -> cut();*/
$printer -> pulse();
$printer -> close();
/* A wrapper to do organise item names & prices into columns */

echo "El ticket/boleta se imprimió correctamente";


?>
