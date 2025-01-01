<?php

class Item3
{
    private $name;
    private $price;
    private $dollarSign;
    public function __construct($name = '', $price = '', $dollarSign = true)
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