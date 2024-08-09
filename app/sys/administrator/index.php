<?php
  session_start();

  /*if(isset($_SESSION['user']))
  {
    $tipo = $_SESSION['user']['tipo_usuario'];
    if($tipo == 3)
    {
      header('Location: ../');
    }
  }
  else
  {
    header('Location: ../');
  }


  $id_us = $_SESSION['user']['id'];
  $nombre = $_SESSION['user']["nombre"];
  
  */

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

    <title>.:WebPOS Administrador:.</title>

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
                        <div class="plan">
                            <div class="col-md-12">
                                <div class="card card-warning" id="${task.id}">
                                    <div class="card-header">
                                        <?php
                                            //cliente
                                            require "modals/cliente/cliente/registro.php";
                                            require "modals/cliente/cliente/editar.php";
                                            require "modals/cliente/cliente/info_clientes.php";

                                            //pagos
                                            require "modals/cliente/pago/comprobantes_pago.php";
                                            require "modals/cliente/pago/comprobante_seleccionado.php";
                                            require "modals/cliente/pago/cargar_nuevo_comprobante.php";

                                            //plan
                                            require "modals/plan/registrar_plan.php";
                                            require "modals/plan/editar_plan.php";

                                            //correo
                                            require "modals/correo/modalCorreo.php";
                                            
                                            echo modalRegistroCliente();
                                            echo modalEditarCliente();
                                            echo modalRegistrarPlan();
                                            echo modalEditarPlan();
                                            echo modalComprobantesPago();
                                            echo modalInfoClientes();
                                            echo modalComprobanteSeleccionado();
                                            echo modalCargarNuevoComprobante();
                                            echo modalEnviarCorreo();
                                        ?>
                                        <ul class="nav nav-tabs">
                                            <li class="nav-item">
                                                <a class="nav-link active" href="#clientes" data-toggle="tab">Clientes</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#plan_cliente" data-toggle="tab">Planes</a>
                                            </li>
                                        </ul>

                                        <div class="tab-content">
                                            <div id="clientes" class="tab-pane fade">
                                                <h1>Clientes</h1>
                                                <button type="button" id="btnAgregarCliente" class="btn btn-success">Agregar cliente</button>
                                                <property name="characterEncoding" value="UTF-8">

                                                    <table id="producto" width="100%" class="table table-bordered table-hover dt-resposive display nowrap">
                                                        <thead>
                                                            <tr>
                                                                <th>Nombre</th>
                                                                <th>Rut</th>
                                                                <th>Estado</th>
                                                                <th>Fecha registro</th>
                                                                <th>Paga desde</th>
                                                                <th>Paga hasta</th>
                                                                <th>Estado pago</th>
                                                                <th>Acción</th>
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                </property>
                                            </div>
                                            <div id="plan_cliente" class="tab-pane fade">
                                            <h1>Planes</h1>
                                                <button type="button" class="btn btn-success" id="btnAgregarPlan">Agregar plan</button>
                                                <property name="characterEncoding" value="UTF-8">

                                                    <table id="planes" width="100%" class="table table-bordered table-hover dt-resposive display nowrap">
                                                        <thead>
                                                            <tr>
                                                                <th>Id</th>
                                                                <th>Nombre</th>
                                                                <th>Estado</th>
                                                                <th>Usuarios</th>
                                                                <th>Cajas</th>
                                                                <th>Valor</th>
                                                                <th>Editar</th>
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                </property>
                                            </div>
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
        <!-- ./wrap-sidebar-content -->

        <!-- / END OF CONTENT -->

    </div>
    <!-- Container -->

    <!-- 
    ================================================== -->
    <!-- Main jQuery Plugins -->
    <?php require "cdn_css/cdn/cdn_index.php";?></body>
    <script type="text/javascript" src="../datatables/datatables.js"></script>
    <script src = "js/planes/cargar_select_planes.js"></script>
    <script src = "js/planes/planes.js"></script>
    
    
    <script src = "../js/numberFormat.js"></script>
    <script src = "js/pestañas.js"></script>
    <!--Clientes-->
    <script src = "js/cliente/cliente/crear_cliente/crear_cliente.js"></script>
    <script src = "js/cliente/cliente/crear_cliente/validar_rut.js"></script>
    <script src = "js/cliente/cliente/editar_clientes/editar_cliente.js"></script>
    <script src = "js/cliente/cliente/read_clientes/mostrar_info_cliente.js"></script>
    <script src = "js/cliente/cliente/read_clientes/read_clientes.js"></script>
    <script src = "js/cliente/comprobante/pagos_cliente.js"></script>
    <script src = "js/cliente/comprobante/cargar_archivos_comprobantes.js"></script>
    <script src = "js/cliente/comprobante/cargar_comprobante_seleccionado.js"></script>
    <script src = "js/cliente/comprobante/cambiar_comprobante.js"></script>
    <script src = "js/cliente/comprobante/cargar_archivos.js"></script>
    <script src = "js/cliente/comprobante/cargar_archivos_nuevo_comprobante.js"></script>
    <script src = "js/cliente/comprobante/cargar_nuevo_comprobante.js"></script>

    <!--Plazo de pago-->
    <script src = "js/cliente/plazo_pago/cargar_plazo_pago.js"></script>
    
    <!--Resumen de pago-->
    <script src = "js/cliente/resumen_pago/resumen_pago.js"></script>

    <!--Correo-->
    <script src = "js/cliente/cliente/correo/correo_registro.js"></script>

    <!--Pago-->
    <script src = "js/cliente/pago/cargarTipoPago.js"></script>

    <script src = "js/crearEnviarUsuario.js"></script>
    <script src = "../js/validarRut.js"></script>
    <script src = "js/cargarGiros.js"></script>
    

</html>
