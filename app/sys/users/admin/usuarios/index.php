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

    <title>.:WebPOS Administrador:.</title>

    <?php require "../cdn_css/css/css_item.php";?>


</head>
<body role="document">

    <?php
        require "../menu/sesion_item.php";
        require "modal.php";
    ?>
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
                    <div class="col-lg-12">
                        <div class="plan">
                            <div class="col-md-12">
                                <div class="card card-warning" id="${task.id}">
                                    <div class="card-header">
                                    <h1>Usuarios</h1>
                                    <button type="button" class="btn btn-success" id="btnAgregarUsuario" data-toggle="modal" data-target="#modalRegistro">Agregar usuario</button>
                                    
                                    <div align="right">
                                        Usuarios activos <b id="us_creados"></b><b>/</b><b id="us_permitidos"> Usuarios permitidos</b><br>
                                        <strong id="msjeUsuariosActivos" style="color: red"></strong>
                                    </div>

                                    <property name="characterEncoding" value="UTF-8">
                                        <table id="producto" class="table table-bordered table-hover dt-resposive display nowrap">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Nombre</th>
                                                    <th>User</th>
                                                    <th>Tipo usuario</th>
                                                    <th>Permisos</th>
                                                    <th>Fecha de registro</th>
                                                    <th>Acción</th>
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
        <!-- #/paper bg -->
    </div>
<!-- ./wrap-sidebar-content -->

<!-- / END OF CONTENT -->

    </div>
    <!-- Container -->

    <!-- 
    ================================================== -->
    <!-- Main jQuery Plugins -->
    <?php require "../cdn_css/cdn/cdn_item.php";?>
    <!--Datatables-->
    <script type="text/javascript" src="../../../datatables/datatables.js"></script>


    <!--llamada a categorias-->
    <script src="scripts_js/validar_usuarios_activos.js"></script>
    <script src="scripts_js/cargar_usuarios_activos.js"></script>
    <script src="scripts_js/cargar_usuarios_permitidos.js"></script>
    <script src="scripts_js/usuarios.js"></script>
    <script src="scripts_js/crear_usuario.js"></script>
    <script src="scripts_js/validar_usuario_existente.js"></script>
    <script src="scripts_js/permisos_registrar.js"></script>
    <script src="scripts_js/permisos_editar.js"></script>
    <script src="scripts_js/editar_usuario.js"></script>
    <script src="scripts_js/validar_usuarios.js"></script>
    <script src="scripts_js/eliminar_usuario.js"></script>
    <script src="scripts_js/validar_existencia_usuarios_admin.js"></script>

</body>

</html>
