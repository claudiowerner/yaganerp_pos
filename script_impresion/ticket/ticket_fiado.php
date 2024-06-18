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




$sql = "SELECT v.id_cl, v.id, p.id_prod, v.cantidad, v.valor
FROM ventas v
JOIN productos p ON p.id_prod = v.producto 
AND v.id_venta = $ids
AND v.estado!='N'
ORDER BY v.id ASC";
$result = mysqli_query($conexion,$sql) or die (mysqli_error());

//declaración de variables de calculo de precios
$subtotal = 0;
$iva = 0;
$total = 0;

//declaracion de arrays
$id = array();
$id_prod = array();
$cantidad = array();
$valor = array();
$contProd = 0;

$id_cl = "";
if ($result->num_rows>0){
  while ($row = $result->fetch_array()){
    $id[] = $row['id'];
    $id_prod[] = $row['id_prod'];
    $cantidad[] = $row['cantidad'];
    $valor[] = $row['valor'];
    $total = $row["valor"] + $total;
    $id_cl = $row["id_cl"];
    $contProd++;
  }
}
//descarga de datos de supermercado (nombre de fantasía, etc)
$sql = 
"SELECT * FROM cliente 
WHERE id = $id_cl";
$resDatos = $conexion->query($sql);;

//recorrer array valor para rellenar el array items3
for($i=0;$i<count($id);$i++)
{
  $items3[] = new item3(normaliza(strtoupper($valor[$i])));
}


for($i=0;$i<count($id);$i++){
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
      $items[] = new item3(normaliza(($i+1).") ".strtoupper($nombre_prod))." X ".$cantidad[$i], "$".$valor[$i]);
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
while($row = $resDatos->fetch_array())
{
  $printer -> text("RUT: ".$row["rut"]."\n");
  $printer -> text($row["nom_fantasia"]."\n");
  $printer -> text($row["razon_social"]."\n");
  $printer -> text($row["direccion"]."\n");
  $printer -> text($row["correo"]."\n");
  $printer -> text($row["telefono"]."\n");
}
$printer -> feed();
$printer -> text("-------------------\n");
$printer -> text("VENTA NRO: ".$ids."\n");
$printer -> text("-------------------\n");
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

$printer -> text("Nro. de items: $contProd\n");
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

$subtotal = round($total*0.81);
$iva = round($total*0.19);


$printer -> text(new item3("Subtotal: ","$".$subtotal));
$printer -> text(new item3("I.V.A.: ","$".$iva));
$printer -> setEmphasis(false);
$printer -> feed();
/* Tax and total */
//$printer -> text($tax);

$printer -> selectPrintMode(Printer::MODE_DOUBLE_WIDTH);
$printer -> text(new item3("TOTAL: ","$".$total));
$printer -> selectPrintMode();
/* Footer */

/* OBSERVACIONES */
$printer -> feed();
$printer -> selectPrintMode(Printer::JUSTIFY_LEFT);
$printer -> text("OBSERVACIONES:\n");
$printer -> text("\n");
$printer -> text("Boleta o venta sin pagar\n");

$printer -> setJustification(Printer::JUSTIFY_LEFT);
$printer -> setEmphasis(true);
$printer -> text(new item3(''));
$printer -> setEmphasis(false);


$printer -> feed(2);
/* FIN OBSERVACIONES */

$printer -> feed(2);
$printer -> setJustification(Printer::JUSTIFY_CENTER);

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
$printer -> pulse();
$printer -> close();
/* A wrapper to do organise item names & prices into columns */

echo "El ticket/boleta se imprimió correctamente";


?>
