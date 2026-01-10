<?php

    session_start();
    $nombre = $_SESSION["user"]["nombre"]



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
    <span id="ct" style="display: none"><?php echo $_GET["ct"]?></span>
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
                        require "../aviso_pago/dom/alert/alert.php";
                    ?>
                    <div class="col-lg-12">
                        <div id="pantallaPrincipal" class="plan">
                            <div class="col-md-12">
                                <div class="card card-warning" id="${task.id}">
                                    <div class="card-header" align="left">
                                        <?php
                                            require "modal/editar.php";
                                            require "modal/registro.php";
                                            require "modal/datos_temporada.php";
                                        ?>
                                        <h1>Temporadas</h1>
                                        <button type="button" class="btn btn-success" id="btnAgregarTemporada">Agregar temporada</button>
                                        <property name="characterEncoding" value="UTF-8">

                                            <table id="temporadas" class="table table-bordered table-hover dt-resposive display nowrap">
                                                <thead>
                                                    <tr>
                                                    <th>#</th>
                                                    <th>Temporada</th>
                                                    <th>Fecha inicio</th>
                                                    <th>Fecha cierre</th>
                                                    <th>Creada por</th>
                                                    <th>Acciones</th>
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
    <?php require "../cdn_css/cdn/cdn_item.php";?></body>
    <script type="text/javascript" src="../../../datatables/datatables.js"></script>
    <script src="../../../js/numberFormat.js"></script>
    <script src="script_js/crear/abrir_modal_registro.js"></script>
    <script src="script_js/crear/crear_temporada.js"></script>
    <script src="script_js/editar/abrir_modal_editar.js"></script>
    <script src="script_js/editar/editar_temporada.js"></script>
    <script src="script_js/editar/cerrar_temporada.js"></script>
    <script src="script_js/leer/leer_datos_temporada.js"></script>
    <script src="script_js/leer/leer_temporadas.js"></script>
    <script src="script_js/eliminar/eliminar_temporada.js"></script>
    <script src="script_js/main/main.js"></script>

</html>
