<?php

include("config.php");

$conexion->set_charset("utf8");

$ids = $_POST['numero'];
//$folio = $_POST['fol'];

function normaliza ($cadena){
    $originales = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿŔŕ';
    $modificadas= 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidNoooooouuuyybyRr';
    $cadena = utf8_decode($cadena);
    $cadena = strtr($cadena, utf8_decode($originales), $modificadas);

    return utf8_encode($cadena);
}

require _DIR_ . '\autoload.php';

use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
//use Mike42\Escpos\PrintConnectors\NetworkPrintConnector;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

$logo = EscposImage::load("bt.jpg", false);

mysql_connect($server, $db_user, $db_pass) or die (mysql_error());
$result = mysql_db_query($database,"SELECT

  tr.nombre AS trabajador,
  tr.rut,
  smm.region,
  smm.cod_barras,
  ct.nombre AS centro,
  smm.obs AS obs,
  cl.nombre AS cliente

  FROM sol_materiales_manual smm

  INNER JOIN trabajadores tr ON tr.id = smm.id_tr
  INNER JOIN centros ct ON ct.id = smm.centro
  INNER JOIN clientes cl ON cl.id = ct.cliente

  WHERE smm.id_cl = 1 AND smm.id = '$ids'") or die (mysql_error());

 if (mysql_num_rows($result)>0){
  while ($row = mysql_fetch_array($result)){
     $operador = utf8_encode(strtoupper($row['trabajador']));
     $region = utf8_encode(strtoupper($row['region']).' REGION');
     $centro = utf8_encode(strtoupper($row['centro']));
	 $cliente = utf8_encode(strtoupper($row['cliente']));


	 $cod_barras = $row['cod_barras'];

	 $ci = $row['rut'];
     $dig = substr($ci,strlen($ci)-1,1);
     $dig = strtoupper($dig);
     $rut = number_format(substr($ci,0,strlen($ci)-1),0,".",".")."-".$dig;
	 $obs = $row['obs'];
	 $items3[] = new item3(normaliza(strtoupper($obs)));

   }
 }

 mysql_connect($server, $db_user, $db_pass) or die (mysql_error());
 $result = mysql_db_query($database,"SELECT id_mat, id_rep, id, correccion_mat, correccion_rep FROM det_smm WHERE id_smm = '$ids'") or die (mysql_error());
  if (mysql_num_rows($result)>0){
   while ($row = mysql_fetch_array($result)){
     $id_mat = $row['id_mat'];
     $id_rep = $row['id_rep'];
     $mat = $row['correccion_mat'];
     $rep = $row['correccion_rep'];
    }
  }

 $array_idmat = explode("-", $id_mat);
 $array_idrep = explode("-", $id_rep);
 $array_mat = explode("-", $mat);
 $array_rep = explode("-", $rep);

 $newArray_id_mat = array();
	foreach ($array_idmat as $k=>$v){
		if ($array_mat[$k]>0){
			$newArray_id_mat[$v] = $array_mat[$k];
		}
	}

	foreach ($newArray_id_mat as $k => $v){
		//echo $k.": ".$v."<br />";
		$sql = "SELECT nombre FROM materiales_liris WHERE id = '$k' ";
		$resultado = $conexion->query($sql);;
		if ($resultado->num_rows > 0){
		while ($qry = $resultado->fetch_array()) {
      $nombre_mat = $qry["nombre"];
      $cantidad_m = $v;
			//echo "MATERIAL: ".$nombre_mat." - CANTIDAD: ".$v; echo "<br>";
      $items[] = new item($cantidad_m." X ".normaliza(strtoupper($nombre_mat)));

			}
		}
	}

  $newArray_id_rep = array();
 	foreach ($array_idrep as $k=>$v){
 		if ($array_rep[$k]>0){
 			$newArray_id_rep[$v] = $array_rep[$k];
 		}
 	}

 	foreach ($newArray_id_rep as $k => $v){
 		//echo $k.": ".$v."<br />";
 		$sql = "SELECT nombre FROM repuestos_liris WHERE id = '$k' ";
 		$resultado = $conexion->query($sql);;
 		if ($resultado->num_rows > 0){
			while ($qry = $resultado->fetch_array()) {
				$nombre_rep = $qry["nombre"];
				$cantidad_r = $v;
				//echo "MATERIAL: ".$nombre_mat." - CANTIDAD: ".$v; echo "<br>";
				$items1[] = new item($cantidad_r." X ".normaliza(strtoupper($nombre_rep)));

 			}
 		}
 	}


	/* --------------- */

// $date = date('l jS \of F Y h:i:s A');
$date = date('d-m-Y H:i:s');

// Enter the share name for your USB printer here
$connector = new WindowsPrintConnector("smb://127.0.0.1/XP-80");
//$connector = new NetworkPrintConnector('192.168.1.25');
$printer = new Printer($connector);

$printer -> selectPrintMode(Printer::MODE_DOUBLE_WIDTH);

$printer -> setJustification(Printer::JUSTIFY_CENTER);
$printer -> bitImage($logo);

$printer -> feed();
$printer -> setJustification(Printer::JUSTIFY_CENTER);
$printer -> selectPrintMode(Printer::MODE_DOUBLE_WIDTH);
$printer -> setTextSize(1, 1);
$printer -> text("SOLICITUD DE MATERIALES Y REPUESTOS N: ".$ids."\n");
$printer -> feed();
$printer -> setFont(Printer::FONT_B);
$printer -> setTextSize(1, 1);
$printer -> text("DESTINO: ".$region." - ".$cliente." - ".$centro."\n");
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

$printer -> text("--------------- MATERIALES ------------------\n");
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
$printer -> text($tax);

$printer -> selectPrintMode(Printer::MODE_DOUBLE_WIDTH);
$printer -> text($total);
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
foreach ($items3 as $item3) {
  $printer -> text($item3);
}

$printer -> feed(2);
/* FIN OBSERVACIONES */

$printer -> feed(2);
$printer -> setJustification(Printer::JUSTIFY_CENTER);

$printer -> feed(1);
$printer -> text("-------------------------------------------\n");
$printer -> text("FIRMA SOLICITANTE\n");
$printer -> text(strtoupper($operador)."\n");
$printer -> text("RUT: ".$rut."\n");

$printer -> feed(2);

$printer->setJustification();
// Reset
/* Barcodes - see barcode.php for more detail */
$printer -> setBarcodeHeight(80);
$printer -> setJustification(Printer::JUSTIFY_CENTER);
$printer -> setBarcodeTextPosition(Printer::BARCODE_TEXT_BELOW);
$printer -> barcode($cod_barras);
$printer -> feed(2);

/* Cut the receipt and open the cash drawer */
$printer -> cut();

$printer -> selectPrintMode(Printer::MODE_DOUBLE_WIDTH);

$printer -> setJustification(Printer::JUSTIFY_CENTER);
$printer -> bitImage($logo);

$printer -> feed();
$printer -> setJustification(Printer::JUSTIFY_CENTER);
$printer -> selectPrintMode(Printer::MODE_DOUBLE_WIDTH);
$printer -> setTextSize(1, 1);
$printer -> text("COMPROBANTE SALIDA BODEGA N: ".$ids."\n");
$printer -> feed();
$printer -> setFont(Printer::FONT_B);
$printer -> setTextSize(1, 1);
$printer -> text("DESTINO: ".$region." - ".$cliente." - ".$centro."\n");
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

$printer -> text("--------------- MATERIALES ------------------\n");
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
$printer -> text($tax);
$printer -> selectPrintMode(Printer::MODE_DOUBLE_WIDTH);
$printer -> text($total);
$printer -> selectPrintMode();

/* OBSERVACIONES */
$printer -> feed();
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
$printer -> feed(2);
$printer -> setJustification(Printer::JUSTIFY_CENTER);

$printer -> feed(1);
$printer -> text("-------------------------------------------\n");
$printer -> text("COMPROBANTE SOLICITANTE.\n");
$printer -> text(strtoupper($operador)."\n");
$printer -> text("RUT: ".$rut."\n");
$printer -> feed(2);

$printer->setJustification();
// Reset
/* Barcodes - see barcode.php for more detail */
$printer -> setBarcodeHeight(80);
$printer -> setJustification(Printer::JUSTIFY_CENTER);
$printer -> setBarcodeTextPosition(Printer::BARCODE_TEXT_BELOW);
$printer -> barcode($cod_barras);
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

class item3
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
        $rightCols = 20;
        $leftCols = 20;

        $left = str_pad($this -> name, $leftCols) ;
        $right = str_pad($this -> price, $rightCols, ' ', STR_PAD_LEFT);
        return "$left$right\n";}
}


?>
