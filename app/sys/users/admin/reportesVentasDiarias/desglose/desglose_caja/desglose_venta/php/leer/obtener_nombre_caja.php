<?php


	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);

	error_reporting(E_ALL);
	session_start();

	$id_us = $_SESSION['user']['id'];
	$nombre = $_SESSION['user']["nombre"];
	$id_cl = $_SESSION['user']["id_cl"];
	


	//recepcion de ID de caja
	$id_caja = $_POST["id_caja"];

	require_once "../../../../../../../../conexion.php";
	require_once "../../../../../../../../php/mb_encoding.php";

    $arr_res = array();

    //set charset
    $conexion -> set_charset("utf8");
    //Consulta SQL
    $sql = 
    "SELECT nom_caja 
    FROM cajas 
    WHERE id_cl = $id_cl
    AND id = $id_caja";
    $res = $conexion->query($sql);

    $arr_res = $res -> fetch_assoc();
    $arr_res = array(
        "nom_caja" => mb_encoding($arr_res["nom_caja"])
    );
    echo json_encode($arr_res);

?>