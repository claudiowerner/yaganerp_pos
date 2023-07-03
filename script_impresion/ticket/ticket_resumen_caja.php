<?php

session_start();
include("header.php");

include("conexion.php");

$conexion->set_charset("utf8");

$nCaja = $_POST['nCaja'];
$idCierre = $_POST['idCierre'];
$fecha = $_POST['fecha'];
$nomCaja = $_POST['nomCaja'];



require 'autoload.php';
require 'function_normaliza.php';

use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
//use Mike42\Escpos\PrintConnectors\NetworkPrintConnector;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

$consulta = 
"SELECT mp.nombre_metodo_pago,
SUM(v.valor) AS valor_total
FROM ventas v
JOIN metodo_pago mp
ON mp.id = v.forma_pago
JOIN correlativo c 
ON c.correlativo = v.id_venta
WHERE  v.id_caja = $nCaja
AND c.id_cierre = $idCierre
GROUP BY v.forma_pago ";
$resultado = $conexion->query($consulta);


/* --------------- */








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
$printer -> text("Cierre de caja $nomCaja $fecha\n");
$printer -> text("--------------------------------------------\n");
$printer -> feed();
$printer -> setTextSize(1, 1);
//impresion de detalle de caja

$total_caja = 0;
while($row = $resultado->fetch_array())
{
  $printer -> text(utf8_decode($row["nombre_metodo_pago"]).":");
  $printer -> text("$".$row["valor_total"]."\n");
  $total_caja = $total_caja + $row["valor_total"];
  
}
$printer -> text("------------------------\n");
$printer -> text("Valor total: $$total_caja\n");
$printer -> text("------------------------\n");
$printer -> text("Recuerde entregar este voucher al administrador/jefe de cajas\n");
$printer -> feed();
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

