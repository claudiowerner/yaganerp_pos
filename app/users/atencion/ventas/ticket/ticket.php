<?php


session_start();
$id_us = $_SESSION['user']['id'];
$nombre = $_SESSION['user']["nombre"];
$id_cl = $_SESSION['user']["id_cl"];
include("../../../../conexion.php");


$conexion->set_charset("utf8");

$ids = $_GET['numero'];
$folio = $_GET['folio'];
$nCaja = $_GET['nCaja'];
//$folio = $_GET['fol'];

function normaliza ($cadena){
    $originales = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿŔŕ';
    $modificadas= 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidNoooooouuuyybyRr';
    $cadena = utf8_decode($cadena);
    $cadena = strtr($cadena, utf8_decode($originales), $modificadas);

    return utf8_encode($cadena);
}

require '../../../../vendor/mike42/escpos-php/autoload.php';

use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
//use Mike42\Escpos\PrintConnectors\NetworkPrintConnector;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;


$nom_fantasia = "";
$razon_social = "";
$direccion = "";
$correo = "";
$telefono = "";

$consulta = "SELECT nom_fantasia, razon_social, direccion, correo, telefono FROM cliente WHERE id = $id_cl ";
$resultado = $conexion->query($consulta);
if ($resultado->num_rows > 0){


  
  while ($row = $resultado->fetch_array()) 
  {
    $nom_fantasia = $row['nom_fantasia'];
    $razon_social = $row['razon_social'];
    $direccion = $row['direccion'];
    $correo = $row['correo'];
    $telefono = $row['telefono'];
  };
}

$sql = "SELECT v.id, v.id_venta, p.nombre_prod, v.cantidad, v.valor
FROM ventas v
JOIN productos p ON p.id_prod = v.producto 
WHERE v.id_cl = $id_cl 
AND v.id_venta = $folio 
AND v.id_caja = '$nCaja' 
ORDER BY v.id ASC";

$productos = array();
$id_venta = "";
$valor_total = 0;

$result = mysqli_query($conexion,$sql) or die (mysql_error());
if ($result->num_rows>0)
{
  while ($row = mysqli_fetch_array($result)){
    $id_venta = $row['id_venta'];
    $productos[] =array(
      "id_venta" => $row['id_venta'],
      "nombre_prod" => $row['nombre_prod'],
      "cantidad" => $row['cantidad'],
      "valor" => $row['valor']
    );
    $valor_total = $row['valor'];
  }
}
	/* --------------- */

// $date = date('l jS \of F Y h:i:s A');
$date = date('d-m-Y H:i:s');

// Enter the share name for your USB printer here
$connector = new WindowsPrintConnector("smb://127.0.0.1/XP-80C");
//$connector = new NetworkPrintConnector('192.168.1.25');
$printer = new Printer($connector);

$printer -> selectPrintMode(Printer::MODE_DOUBLE_WIDTH);

$printer -> setJustification(Printer::JUSTIFY_CENTER);
//$printer -> bitImage($logo);

$printer -> feed();
$printer -> setJustification(Printer::JUSTIFY_CENTER);
$printer -> selectPrintMode(Printer::MODE_DOUBLE_WIDTH);
$printer -> setTextSize(1, 1);
$printer -> text("SOLICITUD DE MATERIALES Y REPUESTOS N: ".$ids."\n");
$printer -> feed();
$printer -> setFont(Printer::FONT_B);
$printer -> setTextSize(1, 1);
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

for($i=0;$i<count($productos);$i++)
{
  $printer -> text($productos[$i]["nombre_prod"]. " ".$productos[$i]["cantidad"]." $".$productos[$i]["valor"]."<br>");
}

//calculo subtotal
$iva = $valor_total*0.81;
$subtotal = $valor_total*0.19;
$printer -> feed();
$printer -> setEmphasis(true);
$printer -> text($subtotal);
$printer -> text("IVA: ".$iva);
$printer -> setEmphasis(false);
$printer -> feed();
/* Tax and total */
//$printer -> text($tax);

$printer -> selectPrintMode(Printer::MODE_DOUBLE_WIDTH);
$printer -> text($valor_total);
$printer -> selectPrintMode();
/* Footer */

/* OBSERVACIONES */
$printer -> feed();
$printer -> selectPrintMode(Printer::JUSTIFY_LEFT);
$printer -> text("OBSERVACIONES:\n");

$printer -> setJustification(Printer::JUSTIFY_LEFT);
$printer -> setEmphasis(true);
//$printer -> text(new item(''));
$printer -> setEmphasis(false);

$printer -> feed(2);
/* FIN OBSERVACIONES */

$printer -> feed(2);
$printer -> setJustification(Printer::JUSTIFY_CENTER);

$printer -> feed(1);
$printer -> text("-------------------------------------------\n");

$printer -> feed(2);

$printer->setJustification();
// Reset
/* Barcodes - see barcode.php for more detail */
$printer -> setBarcodeHeight(80);
$printer -> setJustification(Printer::JUSTIFY_CENTER);
$printer -> setBarcodeTextPosition(Printer::BARCODE_TEXT_BELOW);
$printer -> feed(2);

/* Cut the receipt and open the cash drawer */
$printer -> cut();

$printer -> selectPrintMode(Printer::MODE_DOUBLE_WIDTH);

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
$printer -> setEmphasis(true);
$printer -> text("$date\n");
$printer -> setEmphasis(false);
$printer -> feed();
/* Items */
$printer -> setJustification(Printer::JUSTIFY_LEFT);
$printer -> setEmphasis(true);


$printer -> feed();
$printer -> setEmphasis(true);
$printer -> text($subtotal);
$printer -> setEmphasis(false);
$printer -> feed();
/* Tax and total */
$printer -> selectPrintMode(Printer::MODE_DOUBLE_WIDTH);
//$printer -> text($total);
$printer -> selectPrintMode();

/* OBSERVACIONES */
$printer -> feed();
$printer -> selectPrintMode(Printer::JUSTIFY_LEFT);
$printer -> text("OBSERVACIONES:\n");

$printer -> setJustification(Printer::JUSTIFY_LEFT);
$printer -> setEmphasis(true);
//$printer -> text(new item(''));
$printer -> setEmphasis(false);


$printer -> feed(2);
/* FIN OBSERVACIONES */
/* Footer */
$printer -> feed(2);
$printer -> setJustification(Printer::JUSTIFY_CENTER);


$printer->setJustification();
// Reset
/* Barcodes - see barcode.php for more detail */
$printer -> setBarcodeHeight(80);
$printer -> setJustification(Printer::JUSTIFY_CENTER);
$printer -> setBarcodeTextPosition(Printer::BARCODE_TEXT_BELOW);
//$printer -> barcode($cod_barras);
$printer -> feed();
//$printer -> text("www.facebook.com/nativo.restobar.35\n");
//$printer -> text("AVDA. VICENTE PEREZ ROSALES ESQ. CANDELARIA\n");
//$printer -> text("LLANQUIHUE - X REGION DE LOS LAGOS\n");
$printer -> feed(2);

$printer -> cut();
$printer -> pulse();
$printer -> close();
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

