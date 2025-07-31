<!DOCTYPE html>

<html lang="en">



<head>
    <meta charset="utf-8">
    <!--   <meta content="IE=edge" http-equiv="X-UA-Compatible"> -->
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="" name="description">
    <meta content="" name="author">
    <link href="ico/favicon.ico" rel="shortcut icon">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/toastr/toastr.css">


    <title>.:VendeloPOS:.</title>
    <style type="text/css">

        .bg

        {
            background-position: center center;
            width: 100%;
        }



        .error{
            background-color: #E74F4F;
            top: 0;
            padding: 10px 0 ;
            border-radius:  0 0 5px 5px;
            color: #fff;
            width: 100%;
            text-align: center;
            display: none;
        }

    </style>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="../../css/bootstrap.css">



</head>



<body>
	<div class="error">
		<span id="error"></span>
	</div>
    <section class="ftco-section ">
		<div class="container" style="">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5 col-lg-12">
					<h2 class="heading-section"><strong>Renueva tu contraseña&nbsp;</strong> </h2>
					<h3 class="heading-section"><strong>Sistema de ventas online&nbsp;</strong> </h3>
				</div>
			</div>
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
	</section>
	<footer>
        <!--Agregar algo en el footer-->
    </footer>

    <!-- 

    ================================================== -->

    <!-- Main jQuery Plugins -->
    <script type='text/javascript' src="js/jquery.js"></script>
    <script type='text/javascript' src='js/vegas/jquery.vegas.js'></script>
    <script type='text/javascript' src='js/image-background.js'></script>
    <script type="text/javascript" src="js/jquery.tabSlideOut.v1.3.js"></script>
    
    <script type="text/javascript" src="css/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    
    <script src="../../js/bootstrap.bundle.min.js"></script>
    <script src="../../js/toastr/toastr.min.js"></script>

    <!--Debounce-->
    <script src="js/leer/verificar_usuario.js"></script>
    <script src="js/leer/comparar_contraseñas.js"></script>
    
    
    <script src="js/crear_contraseña/checkear_password.js"></script>
    <script src="js/crear_contraseña/crear_contraseña.js"></script>







</body>



</html>










                                    