
<?php

include("clases/item.php");
include("clases/item3.php");
require("function_normaliza.php");
require("header.php");

include("conexion.php");

$conexion->set_charset("utf8");

$nCaja = $_POST['nCaja'];
$idCierre = $_POST['idCierre'];
$fecha = $_POST['fecha'];
$nomCaja = $_POST['nomCaja'];


require "autoload.php";

use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
//use Mike42\Escpos\PrintConnectors\NetworkPrintConnector;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

//$logo = EscposImage::load("bt.jpg", false);

/*$sql = 
"SELECT mp.nombre_metodo_pago,
SUM(v.valor) AS valor_total
FROM ventas v
JOIN metodo_pago mp
ON mp.id = v.forma_pago
JOIN correlativo c 
ON c.correlativo = v.id_venta
WHERE  v.id_caja = $nCaja
GROUP BY v.forma_pago ";
$resultado = $conexion->query($sql);*/

//declaración de variables de calculo de precios
$total = 0;

//declaracion de arrays

$id_metodo_pago = array();
$nombre_metodo_pago = array();
$valor = array();


$sql = "SELECT * FROM metodo_pago";
$result = mysqli_query($conexion,$sql) or die (mysql_error());
if ($result->num_rows>0)
{
    while ($row = $result->fetch_array())
    {
        $id[] = $row['id'];
        $nombre_metodo_pago[] = $row['nombre_metodo_pago'];
    }
}



//recorrer array valor para rellenar el array items3
for($i=0;$i<count($id);$i++)
{
    $sql = 
    "SELECT SUM(v.valor) AS valor
    FROM ventas v
    JOIN correlativo corr
    ON v.id_venta = corr.correlativo
    JOIN cajas c 
    ON c.id = corr.caja
    WHERE corr.id_cierre = 3
    AND c.id = $nCaja
    AND v.forma_pago = ".$id[$i];

    $result = mysqli_query($conexion,$sql) or die (mysql_error());

    //echo $result->num_rows;
    while ($row = $result->fetch_array())
    {
        if($row["valor"]==""||$row["valor"]==null)
        {
            $valor[] = 0;
        }
        else
        {
            $valor[] = $row["valor"];
            $total = $total + $row["valor"];
        }
    }
    //
}


//recorrer array para rellenar array Items3
for($i=0;$i<count($id);$i++)
{
    $items3[] = new item3(normaliza(strtoupper($nombre_metodo_pago[$i].": ")), $valor[$i]);
}

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
$printer -> setEmphasis(true);
$printer -> text("---------------------------------\n");
$printer -> text("CIERRE CAJA ".$nomCaja."\n");
$printer -> text("Fecha: ".$fecha."\n");
$printer -> text("---------------------------------\n");
$printer -> setEmphasis(false);
$printer -> feed();
$printer -> setFont(Printer::FONT_B);
$printer -> setTextSize(1, 1);
//$printer -> text("DESTINO: ".$region." - ".$cliente." - ".$centro."\n");
$printer -> feed();
$printer -> selectPrintMode();

/* Items */
$printer -> setJustification(Printer::JUSTIFY_LEFT);
$printer -> setEmphasis(true);

$printer -> text("--------------- RESUMEN DE VENTAS ------------------\n");

foreach ($items3 as $item1) {
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


$printer -> pulse();
$printer -> close();
/* A wrapper to do organise item names & prices into columns */

echo "El resumen de caja se ha impreso correctamente"


?>
