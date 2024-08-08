<?php
    ini_set('display_errors', '1');
    $correo = $_GET["correo"];
    $nombre = $_GET["nombre"];

    $mensaje = "sas";

    echo $mail = mail($correo, 'Contacto WebPOS', $mensaje);

?>