<?php
    if (!file_exists('../../../../files'))
    {
        mkdir('../../../../files', 0777);
    }

    
	$hoy = getdate();
	$fecha = $hoy['year']."-".$hoy['mon']."-".$hoy['mday'];
    
    move_uploaded_file($_FILES['file']['tmp_name'], '../../../../files/' . $_FILES['file']['name']);


    echo '../../../../files/' . $_FILES['file']['name'];
    die();

?>