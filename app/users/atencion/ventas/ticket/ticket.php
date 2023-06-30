<?php


session_start();
$id_us = $_SESSION['user']['id'];
$nombre = $_SESSION['user']["nombre"];
$id_cl = $_SESSION['user']["id_cl"];
include("../../../../conexion.php");


$conexion->set_charset("utf8");

$idVenta = $_POST['idVenta'];
$folio = $_POST['folio'];
$nCaja = $_POST['nCaja'];
//$folio = $_POST['fol'];

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
AND v.estado = 'C'
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
    $valor_total = $valor_total + $row['valor'];
  }
}
	/* --------------- */

// $date = date('l jS \of F Y h:i:s A');
$date = $_POST["fecha"];

// Enter the share name for your USB printer here
$connector = new WindowsPrintConnector("smb://127.0.0.1/XP-80CII");
//$connector = new NetworkPrintConnector('192.168.1.25');
$printer = new Printer($connector);

$printer -> selectPrintMode(Printer::MODE_DOUBLE_WIDTH);

$printer -> setJustification(Printer::JUSTIFY_CENTER);
//$printer -> bitImage($logo);

$printer -> feed();
$printer -> setJustification(Printer::JUSTIFY_CENTER);
$printer -> selectPrintMode(Printer::MODE_DOUBLE_WIDTH);
$printer -> setTextSize(1, 1);
$printer -> text($nom_fantasia."\n");
$printer -> text($razon_social."\n");
$printer -> text($direccion."\n");
$printer -> text($correo."\n");
$printer -> text($telefono."\n");
$printer -> text("--------------------------------------------\n");
$printer -> text("Venta NRO: ".$idVenta."\n");
$printer -> text("--------------------------------------------\n");
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
  $printer -> text(substr($productos[$i]["nombre_prod"],0,20). "  ".$productos[$i]["cantidad"]."  $".$productos[$i]["valor"]."\n");
}

//calculo subtotal
$subtotal = $valor_total*0.81;
$iva = $valor_total*0.19;
$printer -> feed();
$printer -> setEmphasis(true);

$printer -> setJustification(Printer::JUSTIFY_RIGHT);
$printer -> setEmphasis(true);

$printer -> text("Subtotal: $".$subtotal."\n");
$printer -> text("IVA: $".$iva."\n");
$printer -> setEmphasis(false);
$printer -> feed();
/* Tax and total */
//$printer -> text($tax);

$printer -> selectPrintMode(Printer::MODE_DOUBLE_WIDTH);
$printer -> text($valor_total);
$printer -> selectPrintMode();
/* Footer */

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

