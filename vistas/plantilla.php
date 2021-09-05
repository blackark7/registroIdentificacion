<?php

session_start();

?>

<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>Registro Identificación</title>

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="icon" href="vistas/img/plantilla/icon.png">

   <!--=====================================
  PLUGINS DE CSS
  ======================================-->

  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="vistas/bower_components/bootstrap/dist/css/bootstrap.min.css">

  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="vistas/bower_components/bootstrap/dist/css/login.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="vistas/bower_components/font-awesome/css/font-awesome.min.css">

  <!-- Ionicons -->
  <link rel="stylesheet" href="vistas/bower_components/Ionicons/css/ionicons.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="vistas/dist/css/AdminLTE.css">

  <!-- AdminLTE Skins -->
  <link rel="stylesheet" href="vistas/dist/css/skins/_all-skins.min.css">

  <!-- DataTables -->
  <link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/responsive.bootstrap.min.css">

  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="vistas/plugins/iCheck/all.css">

   <!-- Daterange picker -->
  <link rel="stylesheet" href="vistas/bower_components/bootstrap-daterangepicker/daterangepicker.css">

  <!-- Morris chart -->
  <link rel="stylesheet" href="vistas/bower_components/morris.js/morris.css">

  <!--=====================================
  PLUGINS DE JAVASCRIPT
  ======================================-->

  <!-- jQuery 3 -->
  <script src="vistas/bower_components/jquery/dist/jquery.min.js"></script>



  <!-- Bootstrap 3.3.7 -->
  <script src="vistas/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

  <!-- FastClick -->
  <script src="vistas/bower_components/fastclick/lib/fastclick.js"></script>

  <!-- AdminLTE App -->
  <script src="vistas/dist/js/adminlte.min.js"></script>

  <!-- DataTables -->
  <script src="vistas/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="vistas/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script src="vistas/bower_components/datatables.net-bs/js/dataTables.responsive.min.js"></script>
  <script src="vistas/bower_components/datatables.net-bs/js/responsive.bootstrap.min.js"></script>

  <!-- SweetAlert 2 -->
  <script src="vistas/plugins/sweetalert2/sweetalert2.all.js"></script>
   <!-- By default SweetAlert2 doesn't support IE. To enable IE 11 support, include Promise polyfill:-->

  <!-- iCheck 1.0.1 -->
  <script src="vistas/plugins/iCheck/icheck.min.js"></script>

  <!-- InputMask -->
  <script src="vistas/plugins/input-mask/jquery.inputmask.js"></script>
  <script src="vistas/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
  <script src="vistas/plugins/input-mask/jquery.inputmask.extensions.js"></script>

  <!-- jQuery Number -->
  <script src="vistas/plugins/jqueryNumber/jquerynumber.min.js"></script>

  <!-- daterangepicker http://www.daterangepicker.com/-->
  <script src="vistas/bower_components/moment/min/moment.min.js"></script>
  <script src="vistas/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>

  <!-- Morris.js charts http://morrisjs.github.io/morris.js/-->
  <script src="vistas/bower_components/raphael/raphael.min.js"></script>
  <script src="vistas/bower_components/morris.js/morris.min.js"></script>

  <!-- ChartJS http://www.chartjs.org/-->
  <script src="vistas/bower_components/Chart.js/Chart.js"></script>




</head>

<!--=====================================
CUERPO DOCUMENTO
======================================-->

<body class="hold-transition skin-green sidebar-mini">

  <?php

if (isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok") {

    echo '<div class="wrapper">';

    /*=============================================
    CABEZOTE
    =============================================*/

    include "modulos/cabezote.php";

    /*=============================================
    MENUUUUUUU
    =============================================*/

    if (isset($_GET["ruta"])) {

        if ($_GET["ruta"] == "usuarios") {

            include "modulos/menu-usuarios.php";

        }

        if ($_GET["ruta"] == "personal") {

            include "modulos/menu-personal.php";

        }
        
         if ($_GET["ruta"] == "marcaciones") {

            include "modulos/menu-marcaciones.php";

        }

        if ($_GET["ruta"] == "cargos") {

            include "modulos/menu-cargos.php";

        }

        if ($_GET["ruta"] == "areas") {

            include "modulos/menu-cargos.php";

        }
        if ($_GET["ruta"] == "departamentos") {

            include "modulos/menu-cargos.php";

        }

        if ($_GET["ruta"] == "asistencia-diaria") {

            include "modulos/menu-reportes.php";

        }

        if ($_GET["ruta"] == "asistencia-quincenal") {

            include "modulos/menu-reportes.php";

        }

        if ($_GET["ruta"] == "asistencia-mensual") {

            include "modulos/menu-reportes.php";

        }

        if ($_GET["ruta"] == "reportes") {

            include "modulos/menu-ventas.php";

        }
    }

    /*=============================================
    CONTENIDO
    =============================================*/

    if (isset($_GET["ruta"])) {

        if (
            $_GET["ruta"] == "usuarios" ||
            $_GET["ruta"] == "personal" ||
            $_GET["ruta"] == "marcaciones" ||    
            $_GET["ruta"] == "cargos" ||
            $_GET["ruta"] == "departamentos" ||
            $_GET["ruta"] == "areas" ||
            $_GET["ruta"] == "asistencia-diaria" ||
            $_GET["ruta"] == "asistencia-quincenal" ||
            $_GET["ruta"] == "asistencia-mensual" ||
            $_GET["ruta"] == "reportes" ||
            $_GET["ruta"] == "configuracion" ||
            $_GET["ruta"] == "salir") {

            include "modulos/" . $_GET["ruta"] . ".php";

        } else {

            include "modulos/404.php";

        }

    } else {

        include "modulos/personal.php";

    }

    /*=============================================
    FOOTER
    =============================================*/

    include "modulos/footer.php";

    echo ' <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab"> </div>
    </div>
  </aside>';

    echo '</div>';

} else {

    include "modulos/login.php";

}

?>


<script src="vistas/js/plantilla.js"></script>
<script src="vistas/js/usuarios.js"></script>
<script src="vistas/js/personal.js"></script>
<script src="vistas/js/cargos.js"></script>
<script src="vistas/js/areas.js"></script>
<script src="vistas/js/departamentos.js"></script>
<!-- Demo-->
<script src="vistas/dist/js/demo.js"></script>

 <script src="vistas/bower_components/ajax/ajax.js"></script>

</body>
</html>
