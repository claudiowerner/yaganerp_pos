<?php



    $mysqli = new mysqli('vendelopos.cl','cve111045','wrANSFzrxaEEmFtrhGIR','cve111045_webpos');

    if ($mysqli->connect_errno):

    	echo "ERROR AL CONECTAR BD ".$mysqli->connect_error;

    endif;



    $conexion = new mysqli('vendelopos.cl','cve111045','wrANSFzrxaEEmFtrhGIR','cve111045_webpos') or die("error" . mysqli_errno($connect));



?>

