<?php

    /* Script que elimina un archivo seleccionado */

    $nombre_archivo = "".$_POST["nombre_archivo"];

    $direccion_base = realpath($_SERVER["DOCUMENT_ROOT"]);
    $url = $direccion_base."\yaganerp_pos\\app\\files\\comprobantes\\$nombre_archivo";
    echo $eliminar = unlink($url);

?>