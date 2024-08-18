
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
                      <h3 class="card-title"></h3>
                        <div id="pantallaPrincipal" class="plan">
                          <div class="col-md-12">
                            <div class="card card-warning"">
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
        <!-- ./wrap-sidebar-content -->

        <!-- / END OF CONTENT -->

    </div>
    <!-- Container -->

    <!-- 
    ================================================== -->
    <!-- Main jQuery Plugins -->
    <?php require "cdn_css/cdn/cdn_index.php";?>

    <!--llamada a Select2-->
    <script src="../../js/select2.js"></script>

    <!--llamada a restaurant.js-->
    <script src="func_js/cajas.js"></script>



</body>

</html>
