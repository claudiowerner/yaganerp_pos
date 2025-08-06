<!DOCTYPE html>

<html lang="en">



<head>
    <meta charset="utf-8">
    <!--   <meta content="IE=edge" http-equiv="X-UA-Compatible"> -->
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="" name="description">
    <meta content="" name="author">
    <link href="ico/favicon.ico" rel="shortcut icon">

    <!-- Bootstrap core CSS -->
    <link rel='stylesheet' href='../../css/bootstrap.css'>
    <!-- Bootstrap theme -->
    <!--  <link rel='stylesheet' href='css/bootstrap-theme.min.css'> -->

    <!-- Custom styles for this template -->
    <link rel='stylesheet' href='css/spinner.css'>
    <link rel='stylesheet' href='../../css/dripicon.css'>
    <link rel='stylesheet' href='../../css/typicons.css' />
    <link rel='stylesheet' href='../../css/responsive.css'>
    <link rel='stylesheet' href='../../js/tip/tooltipster.css'>
    <link rel='stylesheet' type='text/css' href='../../js/vegas/jquery.vegas.css' />
    <link rel='stylesheet' type='text/css' href='../../js/number-progress-bar/number-pb.css'>
    
    <!-- pace loader -->
    <script src='../../js/pace/pace.js'></script>
    <link href='../../js/pace/themes/orange/pace-theme-flash.css' rel='stylesheet' />

    <title>.:VendeloPOS:.</title>
</head>



<body>
    <!--Acá (#id_solicitud) se almacena el ID de solicitud de cambio de contraseña-->
    <span id="id_solicitud"></span>

    <section class="ftco-section ">
		<div class="container" style="">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5 col-lg-12">
					<h2 class="heading-section"><strong>Renueva tu contraseña&nbsp;</strong> </h2>
					<h3 class="heading-section"><strong>Sistema de ventas online&nbsp;</strong> </h3>
				</div>
			</div>
            <div id="cuerpo1">
                <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-5" class="responsive">
                        <img src="../../img/shopping.jpg" width="701" srcset="">
                    </div>
                    <div class="col-md-5 col-lg-5 col-lg-offset-2">
                        <div class="login-wrap p-4 p-md-5">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <span class="fa fa-user-o"></span>
                            </div>
                            <form id="Frm" action="">
                                <div class="form-group">
                                    <strong>Paso 1: </strong>Indique su nombre de usuario
                                    <input name="t_user" id="t_user" onblur="verificar_usuario()" required placeholder="Usuario" type="text" class="form-control" autofocus autocomplete="off" pattern="[A-Za-z0-9]{1,15}">
                                    <div id="buscandoUsuario" style="display: none">
                                        Buscando...
                                    </div>
                                    <div id="alert_usuario">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <strong>Paso 2:</strong>Indique su nueva contraseña
                                    <input name="t_pass" id="t_pass" onkeypress="" required placeholder="Contraseña" type="password" class="form-control" disabled>
                                
                                    Repita su contraseña
                                    <input name="t_pass2" id="t_pass2" onkeyup="comparar_contraseñas()" required placeholder="Contraseña" type="password" class="form-control" disabled>
                                </div>
                                <div id="contrasena">
                                    
                                </div>
                                <button class="btn btn-primary btn-block botonlg">Iniciar sesión&nbsp;</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div id="cuerpo2" style="display: none;">
                <div id="mensaje" class="breadcrumb" style="text-align: center">
                    
                </div>
                <div id="correcto" class="alert alert-success" style = "display: none">
                    <strong>Solicitud aprobada</strong>
                    <br>
                    Ahora, serás redirigido en breve a la página de login.
                    <button id="btnLogin" class="btn btn-success">Ir al Log In</button>
                </div>
                <div id="error" class="alert alert-danger" style="display: none; align-text: center">
                    <strong>Error!</strong>
                    <br>
                    Ocurrió un error al cambiar la clave. Intenta nuevamente.
                </div>
                <div id="declinado" class="alert alert-danger" style="display: none">
                    <strong>Declinado</strong>
                    <br>
                    El administrador VendeloPOS declinó tu solicitud de cambio de contraseña
                </div>
            </div>
        </div>
	</section>
	<footer>
        <!--Agregar algo en el footer-->
    </footer>

    <!-- 

    ================================================== -->

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    
    <script src="../../js/toastr/toastr.min.js"></script>

    <!--Seguridad-->
    <script src="js/seguridad/autorizacion/autorizacion.js"></script>

    <script src="js/leer/verificar_usuario.js"></script>
    <script src="js/leer/comparar_contraseñas.js"></script>
    
    <!--Crear contraseña-->
    <script src="js/crear_contraseña/buscar_datos_usuario.js"></script>
    <script src="js/crear_contraseña/checkear_password.js"></script>
    <script src="js/crear_contraseña/crear_contraseña.js"></script>
    <script src="js/crear_contraseña/cambiar_contraseña.js"></script>

    <!--Sweet Alert-->
    <script src="../../js/sweetalert.min.js"></script>
    <script src="../../js/mensajes-swal.js"></script>

    <script type='text/javascript' src='../../js/bootstrap.js'></script>


    <!--Spinner-->
    <script src="js/spinner/spinner.js"></script>







</body>



</html>










                                    