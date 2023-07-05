<?php

session_start();
include("header.php");

include("conexion.php");

$conexion->set_charset("utf8");

$idCierre = $_POST['idCierre'];
$nomCaja = $_POST['nomCaja'];



require 'autoload.php';
require 'function_normaliza.php';

use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
//use Mike42\Escpos\PrintConnectors\NetworkPrintConnector;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;


//consultas a la bd
$consulta = 
"SELECT cc.nombre, cc.desde, cc.hasta, ca.nom_caja, SUM(v.valor) AS valor_total
FROM cierre_caja cc
JOIN correlativo corr
ON cc.id = corr.id_cierre
JOIN cajas ca 
ON ca.id = corr.caja
JOIN ventas v
ON v.id_venta = corr.correlativo
JOIN metodo_pago mp 
ON mp.id = v.forma_pago
WHERE cc.id = $idCierre
GROUP BY ca.id ";
$resultado = $conexion->query($consulta);

$consulta2 = 
"SELECT mp.nombre_metodo_pago, SUM(v.valor) AS valor_total
FROM cierre_caja cc
JOIN correlativo corr
ON cc.id = corr.id_cierre
JOIN cajas ca 
ON ca.id = corr.caja
JOIN ventas v
ON v.id_venta = corr.correlativo
JOIN metodo_pago mp 
ON mp.id = v.forma_pago
WHERE cc.id = $idCierre
AND corr.estado = 'C'
GROUP BY mp.id
";
$resultado2 = $conexion->query($consulta2);

/* --------------- */


$array1[] = $resultado->fetch_array();
$array2[] = $resultado2->fetch_array();

echo count($array1)."\n";
echo count($array1)."\n";






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
$printer -> text("--------------------------------------------\n");
$printer -> text("Cierre de turno $nomCaja\n");
$printer -> text("Desde ".$array1[0]["desde"]."\n");
$printer -> text("Hasta ".$array1[0]["hasta"]."\n");
$printer -> text("--------------------------------------------\n");
$printer -> feed();
$printer -> setTextSize(1, 1);


//impresion de detalle del turno

$total_por_caja = 0;

while($row = $resultado->fetch_array())
{
    $printer -> text(utf8_decode($row["nom_caja"]).": ");
    $printer -> text("$".$row["valor_total"]."\n");
    $total_por_caja = $total_por_caja + $row["valor_total"];
}
$printer -> text("------------------------\n");
$printer -> text("Valor total: $$total_por_caja\n");
$printer -> text("------------------------\n");
$total_caja = 0;
while($row = $resultado2->fetch_array())
{
    $printer -> text(utf8_decode($row["nombre_metodo_pago"]).":");
    $printer -> text("$".$row["valor_total"]."\n");
    $total_caja = $total_caja + $row["valor_total"];
}
$printer -> text("------------------------\n");

$printer -> text("Valor total: $$total_caja\n");
$printer -> text("------------------------------------\n");
$printer -> feed();
$printer -> text("\n");
$printer -> selectPrintMode();
/* Items */
$printer -> setJustification(Printer::JUSTIFY_LEFT);
$printer -> setEmphasis(true);

$printer -> feed(2);

/* Cut the receipt and open the cash drawer */
$printer -> cut();
$printer -> pulse();
$printer -> close();


echo "Impresión correcta";
/* A wrapper to do organise item names & prices into columns */


class item
{
    private $name;
    private $price;
    private $dollarSign;
    public function __construct($name = '', $price = '', $dollarSign = false)
    {
        $this -> name = $name;
        $this -> price = $price;
        $this -> dollarSign = $dollarSign;
    }

    public function __toString()
    {
        $rightCols = 10;
        $leftCols = 36;
        if ($this -> dollarSign) {
            $leftCols = $leftCols / 2 - $rightCols / 2;
        }
        $left = str_pad($this -> name, $leftCols) ;

        $sign = ($this -> dollarSign ? '' : '');
        $right = str_pad($sign . $this -> price, $rightCols, ' ', STR_PAD_LEFT);
        return "$left$right\n";
    }
}
?>

