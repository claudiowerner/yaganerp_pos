<?php

    session_start();
    include("header.php");
    include("mostrar_errores.php");

    include("conexion.php");

    $conexion->set_charset("utf8");

    $idCierre = $_POST['idCierre'];
    $nomCaja = $_POST['nomCaja'];
    $id_cl = $_POST["id_cl"];


    require 'autoload.php';
    require 'function_normaliza.php';

    use Mike42\Escpos\Printer;
    use Mike42\Escpos\EscposImage;
    //use Mike42\Escpos\PrintConnectors\NetworkPrintConnector;
    use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;


    //-----------------------------------consulta BD por la fecha de inicio y fin del turno-----------------------------
    $consulta = 
    "SELECT desde, hasta
    FROM cierre_caja
    WHERE id_cl = $id_cl
    AND id = $idCierre";

    $res = $conexion->query($consulta);
    $fecha_desde = "";
    $fecha_hasta = "";
    while($row = $res->fetch_array())
    {
        $fecha_desde = $row['desde'];
        $fecha_hasta = $row['hasta'];
    }
    //----------------------------------------consulta BD agrupada por número de cajas-----------------------------
    $consulta = 
    "SELECT id FROM CAJAS 
    WHERE id_cl = $id_cl
    AND estado != 'N'";

    $res = $conexion->query($consulta);

    $array_id_caja = array();

    if($res->num_rows!=0)
    {
        while($row = $res->fetch_array())
        {
            $array_id_caja[] = $row['id'];
        }
    }
    
    $array_resumen_caja = array();
    for($i=0;$i<count($array_id_caja);$i++)
    {
        $consulta = 
        "SELECT ca.nom_caja, SUM(v.valor) AS valor_total
        FROM cierre_caja cc
        JOIN correlativo corr
        ON cc.id = corr.id_cierre
        JOIN cajas ca 
        ON ca.id = corr.caja
        JOIN ventas v
        ON v.id_venta = corr.correlativo
        JOIN metodo_pago mp 
        ON mp.id = v.forma_pago
        WHERE cc.id = ".$array_id_caja[$i]."
        GROUP BY ca.id ";

        $res = $conexion->query($consulta);

        while($row = $res->fetch_array())
        {
            $array_resumen_caja[] = $row["nom_caja"].": $".$row["valor_total"];
        }

    }


    //----------------------------------------consulta BD agrupada por tipo de pago-----------------------------


    $consulta2 = 
    "SELECT id FROM metodo_pago";
    $res = $conexion->query($consulta2);

    $array_id_metodo_pago = array();
    $array_metodo_pago = array();
    $array_monto_pago = array();

    
    if($res->num_rows!=0)
    {
        while($row = $res->fetch_array())
        {
            $array_id_metodo_pago[] = $row["id"];
        }
    }

    foreach($array_id_metodo_pago as $id_mp)
    {
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
        WHERE mp.id = $id_mp
        AND corr.estado = 'C'";
        $res2 = $conexion->query($consulta2);

        if($res2->num_rows!=0)
        {
            while($row = $res2->fetch_array())
            {
                $array_metodo_pago[] = $row["nombre_metodo_pago"].": $".$row["valor_total"];
            }
        }
    }

    $total_caja = 0;
    foreach($array_id_metodo_pago as $id_mp)
    {
        $consulta2 = 
        "SELECT SUM(v.valor) AS valor_total
        FROM cierre_caja cc
        JOIN correlativo corr
        ON cc.id = corr.id_cierre
        JOIN cajas ca 
        ON ca.id = corr.caja
        JOIN ventas v
        ON v.id_venta = corr.correlativo
        JOIN metodo_pago mp 
        ON mp.id = v.forma_pago
        WHERE mp.id = $id_mp
        AND corr.estado = 'C'";
        $res2 = $conexion->query($consulta2);

        if($res2->num_rows!=0)
        {
            while($row = $res2->fetch_array())
            {
                $total_caja = $total_caja + $row["valor_total"];
            }
        }
    }

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
$printer -> text("Desde $fecha_desde\n");
$printer -> text("Hasta $fecha_hasta\n");
$printer -> text("--------------------------------------------\n");
$printer -> feed();
$printer -> setTextSize(1, 1);


//impresion de detalle del turno
for($i=0;$i<count($array_resumen_caja);$i++)
{
    $printer -> text($array_resumen_caja[$i]."\n");
}
$printer -> text("------------------------\n");
$printer -> text("Valor total: $$total_caja\n");
$printer -> text("------------------------\n");

for($i=0;$i<count($array_metodo_pago);$i++)
{
    $printer -> text($array_metodo_pago[$i]."\n");
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

