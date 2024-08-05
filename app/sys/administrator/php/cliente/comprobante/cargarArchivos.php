<?php
    /* ----------------------------------------- CARGA DE ARCHIVO --------------------------------------- */
    if (!file_exists('../../../../../files/comprobantes/'))
    {
        mkdir('../../../../../files/comprobantes/', 0777);
    }

    
	$hoy = getdate();
	$fecha = $hoy['mday']."-".$hoy['mon']."-".$hoy['year'];
    $hora = $hoy['hours']."-".  $hoy['minutes']."-".$hoy['seconds'];
    
     
    //obtención de formato de archivo subido
    $nombre = $_FILES['file']['name'];
    $explode = explode(".",$nombre);

    $index = count($explode)-1;
    $extension = $explode[$index];

    //definición de nuevo nombre de archivo
    $nombre_nuevo = "Compr_$fecha-$hora.$extension";
    
    $carga = move_uploaded_file($_FILES['file']['tmp_name'], '../../../../../files/comprobantes/' . $nombre_nuevo);
   
    
    $dir = '../../files/comprobantes/' . $nombre_nuevo;
    
    
    $json = array(
        "carga" => $carga,
        "url" => $dir
    );

    echo json_encode($json);
    die();

?>