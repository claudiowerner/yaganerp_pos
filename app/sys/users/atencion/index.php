
<?php
  session_start();

  require_once '../../conexion.php';

  if(isset($_SESSION['user']['id']))
  {
    $id_us = $_SESSION['user']['id'];
    $nombre = $_SESSION['user']["nombre"];
    $id_cl = $_SESSION['user']["id_cl"];
    
  }
  else
  {
    header('Location: ../');
  }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <!--   <meta content="IE=edge" http-equiv="X-UA-Compatible"> -->
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="" name="description">
    <meta content="" name="author">
    <link href="ico/favicon.ico" rel="shortcut icon">

    <title>WebPOS Atención</title>

    <?php require "cdn_css/css/css_index.php";?>


</head>

<body role="document">
    
<span id="opcion" style="display:none">2</span>
    <?php 
        require "menu/sesion_index.php";
        require "modal.php";
    ?>
    <!-- Comtainer -->
    <div class="container-fluid paper-wrap bevel tlbr">

        <!-- SIDE MENU -->
        <div class="wrap-sidebar-content">
            <?php 
                require "menu/top_menu.php";
            ?>
            <!-- CONTENT -->
			<div class="wrap-fluid" id="paper-bg">
				<div class="row">
					<div class="col-lg-12">
						<div id="sistemaBloqueado" class="alert alert-danger" style="display: none">
							<span class="entypo-cancel-circled"></span>
							<strong>Aviso!</strong>&nbsp;&nbsp;El sistema se encuentra bloqueado. Para desbloquearlo, comuníquese con el administrador.
						</div>
						<div id='sistSinTurnos' class="alert alert-danger" style="display: none">
							<div class="card-header">
								<h3 align="center" class="card-title"><strong>EL SISTEMA SE BLOQUEÓ</strong></h3>
							</div>
							<div class="card-body">
								Esto se debe a que no existe ninguna apertura de caja activa, o bien, la caja correspondiente a la fecha <span id="fecha"></span>/<span id="hora"></span> no se creó correctamente.<br> Para poder continuar, <strong>solicite al administrador de sistema que cree otra apertura de caja o modifique la caja creada</strong> y así, poder operar con normalidad.
							</div>
							<!-- /.card-body -->
						</div>
						<h3 class="card-title"></h3>
						<div id="pantallaPrincipal" class="plan">
							<div class="col-md-12">
								<div class="card card-warning">
									<div class="card-header">
										<h1>Cajas</h1>
									</div>
									<div class="card-body" id=cajas>
										Cargando cajas...
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
          	</div>
        </div>
        <!-- #/paper bg -->
        </div>
    </div>
    
	
    <?php require "cdn_css/cdn/cdn_index.php";?>

    <!--llamada a Select2-->
    <script src="../../js/select2.js"></script>

    <!--llamada a restaurant.js-->
    <script src="func_js/turnos.js"></script>
    <script src="func_js/cajas.js"></script>
    <script src="func_js/abrir_caja_ventas.js"></script>

    <!--Llamada a aviso_pago-->
    <script src="aviso_pago/dom/aviso_pago.js"></script>
	


</body>

</html>
