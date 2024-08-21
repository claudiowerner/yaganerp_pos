 <?php
	date_default_timezone_set('America/Santiago');
 
    require_once '../../../../conexion.php';
    
    $id_cl = $_POST["id_cl"];
    $dir_archivo = $_POST["dir_archivo"];
    $fecha_carga = $_POST["fecha_carga"];

    $sql =
    "SELECT count(id)+1 AS id FROM comprobantes WHERE id_cl = $id_cl";
    
    $res = $conexion->query($sql);
    $row = $res->fetch_assoc();
    $id = $row["id"];

    $sql = 
    "INSERT INTO comprobantes VALUES
    (null, '$id_cl','Comprobante $id', '$dir_archivo', '$fecha_carga')";
    $res = $conexion->query($sql);

    $json = array();
    

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

    echo json_encode($json);


 
 ?>