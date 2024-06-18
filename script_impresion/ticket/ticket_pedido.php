<?php

include("clases/item.php");
include("clases/item3.php");
require("function_normaliza.php");
require("header.php");

include("conexion.php");

$conexion->set_charset("utf8");

$id_pedido = $_POST['id_pedido'];

require "autoload.php";

use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
//use Mike42\Escpos\PrintConnectors\NetworkPrintConnector;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

//$logo = EscposImage::load("bt.jpg", false);


//seleccionar datos de proveedor

$proveedor = "";

$sql = 
"SELECT pr.nombre_proveedor 
FROM proveedores pr
JOIN pedidos ped
ON pr.id = ped.id_proveedor
WHERE ped.id = $id_pedido";
$result = mysqli_query($conexion,$sql) or die (mysqli_error());

while($row = $result->fetch_array())
{
  $proveedor = $row["nombre_proveedor"];
}


$arrayId = Array();
$arrayNomProd = Array();
$arrayCantidad = Array();
$arrayValorItem = Array();
$arrayValor = Array();
$total = 0;

$cont = 0;

$sql = 
"SELECT id 
FROM pedidos_detalle 
WHERE id_pedido = '$id_pedido'";
$res = $conexion->query($sql);;
while($row=$res->fetch_array())
{
  $arrayId[] = $row["id"];
}
$cont = count($arrayId);

for($i=0;$i<$cont;$i++)
{
  $sql =
  "SELECT producto 
  FROM pedidos_detalle 
  WHERE id = ".$arrayId[$i];
  $res = $conexion->query($sql);;

  while($row=$res->fetch_array())
  {
    $arrayNomProd[] = $row["producto"];
  }
}


for($i=0;$i<$cont;$i++)
{
  $sql =
  "SELECT cantidad 
  FROM pedidos_detalle 
  WHERE id = ".$arrayId[$i];
  $res = $conexion->query($sql);;

  while($row=$res->fetch_array())
  {
    $arrayCantidad[] = $row["cantidad"];
  }
}

for($i=0;$i<$cont;$i++)
{
  $sql =
  "SELECT valor
  FROM pedidos_detalle 
  WHERE id = ".$arrayId[$i];
  $res = $conexion->query($sql);;

  while($row=$res->fetch_array())
  {
    $arrayValor[] = $row["valor"];
    $arrayValorItem[] = $row["valor"]*$arrayCantidad[$i];
    $total = $total+ ($row["valor"]*$arrayCantidad[$i]); 
  }
}

//recorrer array valor para rellenar el array items
$items = Array();
for($i=0;$i<$cont;$i++)
{
  $items[] = new item3(($i+1).") ".normaliza(substr(strtoupper($arrayNomProd[$i]),0,8))." X ".$arrayCantidad[$i], "$".$arrayValorItem[$i]." ($".$arrayValor[$i].")");
}

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

$printer -> feed();
$printer -> text("-------------------\n");
$printer -> text("PEDIDO NRO: ".$id_pedido."\n");
$printer -> text("PROVEEDOR: ".$proveedor."\n");
$printer -> text("-------------------\n");
$printer -> feed();
$printer -> setFont(Printer::FONT_B);
$printer -> setTextSize(1, 1);
$printer -> feed();
$printer -> selectPrintMode();
//Items
$printer -> setJustification(Printer::JUSTIFY_LEFT);
$printer -> setEmphasis(true);

$printer -> text("---------------- DETALLE -------------------\n");

for($i=0;$i<$cont;$i++)
{
  $printer->text($items[$i]);
}



$printer -> feed();
$printer -> setEmphasis(true);
//subtotal

$subtotal = round($total*0.81);
$iva = round($total*0.19);


$printer -> text(new item3("Subtotal: ","$".$subtotal));
$printer -> text(new item3("I.V.A.: ","$".$iva));
$printer -> setEmphasis(false);
$printer -> feed();
//Tax and total
//$printer -> text($tax);

$printer -> selectPrintMode(Printer::MODE_DOUBLE_WIDTH);
$printer -> text(new item3("TOTAL: ","$".$total));
$printer -> selectPrintMode();
// Footer 

//OBSERVACIONES
$printer -> feed();
$printer -> selectPrintMode(Printer::JUSTIFY_LEFT);
$printer -> text("OBSERVACIONES:\n");

$printer -> setJustification(Printer::JUSTIFY_LEFT);
$printer -> setEmphasis(true);
$printer -> text(new item3(''));
$printer -> setEmphasis(false);


$printer -> feed(2);
//FIN OBSERVACIONES 

$printer -> feed(2);
$printer -> setJustification(Printer::JUSTIFY_CENTER);

$printer -> feed(2);

$printer->setJustification();
// Reset
//Barcodes - see barcode.php for more detail 

// Cut the receipt and open the cash drawer 
$printer -> cut();
$printer -> pulse();
$printer -> close();
//A wrapper to do organise item names & prices into columns */

echo "El ticket/boleta se imprimió correctamente";


?>
