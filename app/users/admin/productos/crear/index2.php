<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../../../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="../../../../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../../../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../../../../plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../../../dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../../../../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../../../../plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../../../../plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <!--select2-->
  <link rel="stylesheet" href="../../../../css/select2.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Configuración
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav-item nav-treeview " id="configuracion">
              <li class="nav-item" id="">
                <a href="./index.html" class="nav-link">
                  Pisos
                    <ul class="nav nav-treeview" id="configuracion">
                    <li class="nav-item" id="pisos">
                      <a href="./index.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                      </a>
                    </li>
                  </ul>
                </a>
              </li>
            </ul>
            <ul class="nav-item nav-treeview" id="configuracion">
              <li class="nav-item" id="">
                <a href="./index.html" class="nav-link">
                  Ubicaciones
                    <ul class="nav nav-treeview" id="configuracion">
                    <li class="nav-item" id="ubicaciones">
                      <a href="./index.html" class="nav-link">
                      </a>
                    </li>
                  </ul>
                </a>
              </li>
            </ul>
            <ul class="nav-item nav-treeview" id="configuracion">
              <li class="nav-item" id="">
                <a href="./index.html" class="nav-link">
                  Mesas
                  <ul class="nav nav-treeview" id="configuracion">
                    <li class="nav-item" id="mesas">
                      <a href="./index.html" class="nav-link">
                      </a>
                    </li>
                  </ul>
                </a>
              </li>
            </ul>
            <ul class="nav-item nav-treeview" id="configuracion">
              <li class="nav-item" id="">
                <a href="./index.html" class="nav-link">
                  Usuario
                    <ul class="nav nav-treeview" id="ubicacionesUl">
                    <li class="nav-item" id="ubicaciones">
                      <a href="./index.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                      </a>
                    </li>
                  </ul>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">ADMINISTRADOR</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <h1>Categorías</h1>
      <table id="countries" class="table">
        <tr>
          <td><label name="nombreProd">Nombre</label></td>
          <td><input type="text" name="nomProd" id="nomProd" class="form-control"></td>
        </tr>
        <tr>
          <td><label name="estadoCat">Categoría</label></td>
          <td>
            <select id="categoria" class="form-control">
              <option>Cargando...</option>
            </select>
          </td>
        </tr>
        <tr>
          <td><label name="nombreProd">Cantidad</label></td>
          <td><input type="number" name="nomProd" id="cantidad" class="form-control"></td>
        </tr>
        <tr>
          <td><label name="valorNeto">Valor neto</label></td>
          <td><input type="number" name="valorNeto" id="valorNeto" class="form-control"></td>
        </tr>
        <tr>
          <td><label name="nombreProd">Es acompañamiento</label></td>
          <td>
            <select id="esAcom" class="form-control" required>
              <option value="NI">---SELECCIONE---</option>
              <option value="Si">Si</option>
              <option value="No">No</option>
            </select>
          </td>
        </tr>
        <tr>
          <td><label name="nombreProd">Tiene acompañamiento</label></td>
          <td>
            <select id="tieneAcom" class="form-control" required>
              <option value="NI">---SELECCIONE---</option>
              <option value="Si">Si</option>
              <option value="No">No</option>
            </select>
          </td>
        </tr>
        <tr>
          <td><label name="nombreProd">Estado</label></td>
          <td>
            <select id="estadoProd" class="form-control" required>
              <option value="NI">---SELECCIONE---</option>
              <option value="S">Activado</option>
              <option value="N">Desactivado</option>
            </select>
          </td>
        </tr>
        <tr>
          <td>
            <button class="btn btn-success" id="btnGuardarProd">Guardar</button>
          </td>
        </tr>
      </table>
    </section>
      
  </div>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../../../plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../../../../plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../../../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../../../../plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../../../../plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../../../../plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../../../../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../../../../plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../../../../plugins/moment/moment.min.js"></script>
<script src="../../../../plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../../../../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../../../../plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../../../../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../../../../dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../../../../dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../../../dist/js/demo.js"></script>

<!--llamada a ubi.js-->
<script src="../../js/ubi.js"></script>

<!--llamada a categorias-->
<script src="crear_producto.js"></script>

<!--Datatables-->
<script type="text/javascript" src="../../../../datatables/datatables.js"></script> 

<!--select2-->
<script type="text/javascript" src="../../../../js/select2.js"></script> 

</body>
</html>
