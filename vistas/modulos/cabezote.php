 <header class="main-header">
    <!-- Logo -->
    <a href="personal" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A.</b>S</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Registro Identificación</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">

          <?php

if ($_SESSION["foto"] != "") {

    echo '<img src="' . $_SESSION["foto"] . '" class="user-image">';

} else {

    echo '<img src="vistas/img/usuarios/default/anonymous.png" class="user-image">';

}

?>

            <span class="hidden-xs"><?php echo $_SESSION["nombre"]; ?></span>

          </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">

          <?php

if ($_SESSION["foto"] != "") {

    echo '<img src="' . $_SESSION["foto"] . '" class="img-circle" alt="User Image">';

} else {

    echo '<img src="vistas/img/usuarios/default/anonymous.png" class="img-circle" alt="User Image">';

}

?>

                <p>
                  <?php echo $_SESSION["nombre"]; ?>
                </p>
              </li>
             </li>

              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a href="salir" class="btn btn-default btn-flat">Cerrar Sesión</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>