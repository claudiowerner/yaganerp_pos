
<?php

require("header.php");
include("clases/item.php");
include("clases/item3.php");
require("function_normaliza.php");

include("conexion.php");

$conexion->set_charset("utf8");

$id_cl = $_POST["id_cl"];
$idCierre = $_POST['idCierre'];


require "autoload.php";

use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
//use Mike42\Escpos\PrintConnectors\NetworkPrintConnector;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

$total = 0;

//declaracion de arrays

$id_cl = $_POST["id_cl"];
$id_metodo_pago = array();
$nombre_metodo_pago = array();
$valor = array();

$contador = 0;

//CARGAR NOMBRE DE TURNO
$sql = 
"SELECT nombre, desde, hasta
FROM cierre_caja
WHERE id=$idCierre";
$res = mysqli_query($conexion,$sql);

$nomTurno = "";
$fecha_desde = "";
$fecha_hasta = "";
while($row=$res->fetch_array())
{
    $nomTurno = $row["nombre"];
    $fecha_desde = $row["desde"];
    $fecha_hasta = $row["hasta"];    
}

//select de ID de cajas
$sql = "SELECT id FROM cajas WHERE id_cl = $id_cl";
$res = mysqli_query($conexion,$sql);

$id_caja = array();
while($row=$res->fetch_array())
{
    $id_caja[] = $row["id"];
}

$contador = count($id_caja);

//select nombre de cajas
$nombre_caja = array();

for($i=0;$i<$contador;$i++)
{
    $sql = "SELECT nom_caja FROM cajas WHERE id = ".$id_caja[$i];
    $res = mysqli_query($conexion,$sql);

    while($row=$res->fetch_array())
    {
        $nombre_caja[] = $row["nom_caja"];
    }

}


$sql = "SELECT * FROM metodo_pago";
$result = mysqli_query($conexion,$sql) or die (mysql_error());
if ($result->num_rows>0)
{
    while ($row = $result->fetch_array())
    {
        $id_metodo_pago[] = $row['id'];
        $nombre_metodo_pago[] = $row['nombre_metodo_pago'];
    }
}

//consultar montos generados por cada caja
for($i=0;$i<$contador;$i++)
{
    $sql=
    "SELECT SUM(valor) AS valor
    FROM correlativo
    WHERE id_cierre = $idCierre
    AND caja = ".$id_caja[$i];
    $res = mysqli_query($conexion,$sql);

    while($row=$res->fetch_array())
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
}


//recorrer array para rellenar array Items3
for($i=0;$i<$contador;$i++)
{
    echo $resumen_caja[] = new item3(normaliza(strtoupper($nombre_caja[$i].": ")), $valor[$i]);
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
$printer -> text("CIERRE TURNO ".$nomTurno."\n");
$printer -> text("Desde: ".$fecha_desde."\n");
$printer -> text("Hasta: ".$fecha_hasta."\n");
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

foreach ($resumen_caja as $caja) {
  $printer -> text($caja);
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
