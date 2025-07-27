<?php



    $mysqli = new mysqli('localhost','root','','VendeloPOS');

    if ($mysqli->connect_errno):

    	echo "ERROR AL CONECTAR BD ".$mysqli->connect_error;

    endif;



    $conexion = new mysqli('localhost','root','','VendeloPOS') or die("error" . mysqli_errno($connect));



?>

