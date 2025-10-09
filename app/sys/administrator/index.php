
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <!--   <meta content="IE=edge" http-equiv="X-UA-Compatible"> -->
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="" name="description">
    <meta content="" name="author">
    <link href="ico/favicon.ico" rel="shortcut icon">

    <title>.:VendeloPOS Administrador:.</title>

    <?php require "cdn_css/css/css_index.php";?>


</head>

<body role="document">

    <!-- END OF TOPNAV -->
    <!-- Comtainer -->
    <div class="container-fluid paper-wrap bevel tlbr">

        <!-- SIDE MENU -->
        <div class="wrap-sidebar-content">
            <!-- CONTENT -->
            <div class="wrap-fluid" id="paper-bg">
                <div class="row">
                    <div class="col-lg-12">
                        <div id="pantallaPrincipal" class="plan">
                            <div class="col-md-12">
                                <div class="card card-warning" id="${task.id}">
                                    <div class="card-header">
                                        <?php
                                            //cliente
                                            require "modals/cliente/cliente/registro.php";
                                            require "modals/cliente/cliente/editar.php";
                                            require "modals/cliente/cliente/info_clientes.php";

                                            //comprobante
                                            require "modals/cliente/pago/comprobantes/comprobantes_pago.php";
                                            require "modals/cliente/pago/comprobantes/comprobante_seleccionado.php";
                                            require "modals/cliente/pago/comprobantes/cargar_nuevo_comprobante.php";
                                            require "modals/cliente/pago/comprobantes/editar_periodo_comprobante.php";

                                            //pagos
                                            require "modals/cliente/pago/pagos/modal_editar_pago.php";
                                            require "modals/cliente/pago/pagos/modal_pago.php";
                                            require "modals/cliente/pago/pagos/modal_registrar_pago.php";

                                            //plan
                                            require "modals/plan/registrar_plan.php";
                                            require "modals/plan/editar_plan.php";

                                            //correo
                                            require "modals/correo/modalCorreo.php";

                                            //sugerencias
                                            require "modals/sugerencias/modal_sugerencias.php";
                                            
                                            echo modalEditarCliente();
                                            echo modalEditarPlan();
                                            echo modalComprobantesPago();
                                            echo modalInfoClientes();
                                            echo modalComprobanteSeleccionado();
                                            echo modalCargarNuevoComprobante();
                                            echo modalEnviarCorreo();
                                            echo modalPagos();
                                            echo modalRegistroPagos();
                                            echo modalEditarPagos();
                                            echo modalEditarPeriodoComprobante();
                                        ?>
                                        <ul class="nav nav-tabs">
                                            <li class="nav-item">
                                                <a class="nav-link active" href="#clientes" data-toggle="tab">Clientes</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#plan_cliente" data-toggle="tab">Planes</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#sugerencias" data-toggle="tab">Sugerencias <span id="cantSugerencias">(0/0)</span></a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#errores" data-toggle="tab">Errores</a>
                                            </li>
                                        </ul>

                                        <div class="tab-content">
                                            <?php require "items/cliente/cliente.php";?>
                                            <?php require "items/planes/planes.php";?>
                                            <?php require "items/sugerencias/html/sugerencias.php";?>
                                            <?php require "items/errores/html/errores.php";?>
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
    <!-- Container -->

    <!-- 
    ================================================== -->
    <!-- Main jQuery Plugins -->
    <?php require "cdn_css/cdn/cdn_index.php";?></body>
    <?php require "items/scripts/scripts.php";?>
    

</html>
