<?php
  session_start();

  if(isset($_SESSION['user']))
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

  require_once '../../../conexion.php';

  $id_us = $_SESSION['user']['id'];
  $nombre = $_SESSION['user']["nombre"];
  $id_cl = $_SESSION['user']["id_cl"];
  

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

    <title>.:VendeloPOS Administrador:.</title>

    <?php require "../cdn_css/css/css_item.php";?>


</head>

<body role="document">

    <?php require "../menu/sesion_item.php";?>
    <!-- END OF TOPNAV -->
    <!-- Comtainer -->
    <div class="container-fluid paper-wrap bevel tlbr">

        <!-- SIDE MENU -->
        <div class="wrap-sidebar-content">
            <?php 
                require "../menu/menu_item.php";
                require "../menu/top_menu_item.php";
            ?>
            <!-- CONTENT -->
            <div class="wrap-fluid" id="paper-bg">
                <div class="row">
                    <?php
                        require "../aviso_pago/dom/alert.php";
                    ?>
                    <div class="col-lg-12">
                        <div id="pantallaPrincipal" class="plan">
                            
                            <div class="col-md-12">
                                <div class="card card-warning" id="${task.id}">
                                    <div class="card-header">
                                        <?php
                                            require "modal.php";
                                            echo modalRegistro();
                                            echo modalEditar();
                                        ?>

                                        <h1>Cuentas corrientes de cliente</h1>
                                        <button type="button" class="btn btn-success" id="btnAgregarCliente">Agregar cliente</button>
                                        <property name="characterEncoding" value="UTF-8">

                                            <table id="producto" class="table table-bordered table-hover dt-resposive display nowrap">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>R.U.T.</th>
                                                        <th>Nombre</th>
                                                        <th>Apellido</th>
                                                        <th>Creado por</th>
                                                        <th>Fecha registro</th>
                                                        <th>Opciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="bodyCliente">

                                                </tbody>
                                            </table>
                                        </property>
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
    <?php require "../cdn_css/cdn/cdn_item.php";?></body>

    <!--Leer cuentas-->
    <script src="javascript/leer/ver_cuentas.js"></script>
    <script src="javascript/leer/datatable_cliente.js"></script>
    <script src="javascript/leer/contar_cuentas_pendientes_clte.js"></script>

    <script src="javascript/leer/validar_rut_en_bd.js"></script>
    
    <!--Crear cuentas-->
    <script src="javascript/crear/abrir_modal_crear_cliente.js"></script>
    <script src="javascript/crear/crear_cliente.js"></script>
    <script src="javascript/crear/crear_cliente_ajax.js"></script>

    <!--Editar cuentas-->
    <script src="javascript/editar/abrir_modal_editar.js"></script>
    <script src="javascript/editar/editar_cliente_ajax.js"></script>
    <script src="javascript/editar/editar_cliente.js"></script>

    <!--Eliminar cuentas-->
    <script src="javascript/eliminar/eliminar_cliente_ajax.js"></script>
    <script src="javascript/eliminar/eliminar_cliente.js"></script>
    <script src="../../../js/validarRut.js"></script>

</html>
