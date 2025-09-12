<?php

    //Obtener variables de entorno
    require "env_var/env_db.php";
    $host = getenv("DB_HOST");
    $user = getenv("DB_USER");
    $pass = getenv("DB_PASS");
    $db = getenv("DB_NAME");

    $mysqli = new mysqli($host, $user, $pass, $db);

    if ($mysqli->connect_errno):

    	echo "ERROR AL CONECTAR BD ".$mysqli->connect_error;

    endif;



    $conexion = new mysqli($host, $user, $pass, $db) or die("error" . mysqli_errno($connect));



?>

