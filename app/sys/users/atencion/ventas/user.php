<?php

	session_start();
	date_default_timezone_set('America/Santiago');echo json_encode($_SESSION['user']['id']);

?>