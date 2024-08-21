 <?php
	date_default_timezone_set('America/Santiago');
 
    require_once '../../../../conexion.php';
    
    $json = array();

    if(isset($_POST["id_cl"])||isset($_POST["dir_archivo"]))
    {
        $id_cl = $_POST["id_cl"];
        $dir_archivo = $_POST["dir_archivo"];
        //definicion de fecha
        $f = getdate();
        $año = $f["year"];
        $mes = $f["mon"];
        $dia  = $f["mday"];
        $fecha_carga = "$año-$mes-$dia";

        $sql =
        "SELECT count(id)+1 AS id FROM comprobantes WHERE id_cl = $id_cl";
        
        $res = $conexion->query($sql);
        $row = $res->fetch_assoc();
        $id = $row["id"];

        $sql = 
        "INSERT INTO comprobantes VALUES
        (null, '$id_cl','Comprobante $id', '$dir_archivo', '$fecha_carga')";
        $res = $conexion->query($sql);

        

        if($res)
        {
            $json = array(
                "registro_archivo" => true,
                "titulo" => "Excelente",
                "mensaje" => "Archivo comprobante registrado correctamente",
                "icono" => "success",
            );
        }
        else
        {
            $json = array(
                "registro_archivo" => false,
                "titulo" => "Error",
                "mensaje" => "Error al registrar archivo: ".$conexion->error,
                "icono" => "error"
            );
        }
    }
    else
    {
        $json = array(
            "registro_archivo" => false,
            "titulo" => "Error",
            "mensaje" => "No se detectó un archivo válido ó no se enviaron todos los datos necesarios para registrar en la base de datos.",
            "icono" => "error"
        );
    }

    
    echo json_encode($json);


 
 ?>