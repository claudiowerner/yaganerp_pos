<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <!--   <meta content="IE=edge" http-equiv="X-UA-Compatible"> -->
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="" name="description">
    <meta content="" name="author">
    <link href="ico/favicon.ico" rel="shortcut icon">

    <title>YaganERP - Iniciar sesión</title>

    <style type="text/css">
        .bg
        {
            background-image: url('img/bg.jpg');
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
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/theme.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/dripicon.css">
    <link rel="stylesheet" href="css/typicons.css" />
    <link rel="stylesheet" href="css/font-awesome.css" />
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="js/tip/tooltipster.css">
    <link rel="stylesheet" type="text/css" href="js/vegas/jquery.vegas.css" />
    <link rel="stylesheet" type="text/css" href="js/number-progress-bar/number-pb.css">
    <!-- pace loader -->
    <script src="js/pace/pace.js"></script>
    <link href="js/pace/themes/orange/pace-theme-flash.css" rel="stylesheet" />

</head>

<body>

    <div id="preloader">
        <div id="status">&nbsp;</div>
    </div>
    <div class="error">
        <span>Los datos ingresados son incorrectos. Intente nuevamente.</span>
    </div>
    <div class="container-fluid ">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <!-- Comtainer -->
                <div class="paper-wrap bevel tlbr">
                    <div id="paper-top">
                        <div class="row">
                            <div class="col-lg-12 no-pad">
                                <!--     -->
                                <a class="navbar-brand logo-text" href="#">YaganERP</a>
                            </div>
                        </div>
                    </div>

                    <!-- CONTENT -->
                    <div style="min-height:400px;" class="wrap-fluid" id="paper-bg">

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="account-box">
                                    <form id="Frm" action="">
                                        <div class="form-group">
                                            <label>Nombre</label>
                                            <input name="t_user" required placeholder="Usuario" type="text" class="form-control" autofocus autocomplete="off">
                    
                                        </div>
                                        <div class="form-group">
                                            <a href="#" class="pull-right label-forgot">¿Olvidó su contraseña?</a>
                                            <label>Contraseña</label>
                                            <input name="t_pass" required placeholder="Contraseña" type="password" class="form-control">
                                        </div>
                                        <div class="checkbox pull-left">
                                            <label>
                                                <input type="checkbox">Remember me</label>
                                        </div>
                                        <button class="btn btn-primary btn-block botonlg">Ingresar al sistema</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- / FOOTER -->
                <!-- Container -->
            </div>
        </div>
    </div>
    <!-- 
    ================================================== -->
    <!-- Main jQuery Plugins -->
    <script type='text/javascript' src="js/jquery.js"></script>
    <script type='text/javascript' src='js/vegas/jquery.vegas.js'></script>
    <script type='text/javascript' src='js/image-background.js'></script>
    <script type="text/javascript" src="js/jquery.tabSlideOut.v1.3.js"></script>
    <script type="text/javascript" src="js/bg-changer.js"></script>
    
    <script type="text/javascript" src="css/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="main.js"></script>



</body>

</html>