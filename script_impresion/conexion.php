<?php



    $mysqli = new mysqli('localhost','root','','yaganerp_webservices');

    if ($mysqli->connect_errno):

    	echo "ERROR AL CONECTAR BD ".$mysqli->connect_error;

    endif;



    $conexion = new mysqli('localhost','root','','yaganerp_webservices') or die("error" . mysqli_errno($connect));



?>

