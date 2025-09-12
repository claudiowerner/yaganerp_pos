<?php


    session_start();
	$id_us = $_SESSION['user']['id'];
	$nombre = $_SESSION['user']["nombre"];
	$id_cl = $_SESSION['user']["id_cl"];


	require_once '../../../../conexion.php';

    //recepción de sugerencia creada por el cliente
    $sugerencia = $_POST["sugerencia"];


?>