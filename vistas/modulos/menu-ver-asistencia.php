<aside class="main-sidebar">

	 <section class="sidebar">

	 	<!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo $_SESSION["foto"]; ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION["nombre"]; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

		<ul class="sidebar-menu">
		 <li class="header">MENÚ DE NAVEGACION</li>

		<?php

if ($_SESSION["perfil"] == "Administrador") {

    echo ' <li class="active">

				<a href="usuarios">

					<i class="fa fa-user"></i>
					<span>Usuarios</span>

				</a>

			</li>';

}

if ($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Especial") {

    echo '<li>

				<a href="personal">

					<i class="fa fa-users"></i>
					<span>Personal</span>

				</a>

			</li>

			<li class="treeview">

				<a href="#">

					<i class="fa fa-list-ul"></i>

					<span>Información laboral</span>

					<span class="pull-right-container">

						<i class="fa fa-angle-left pull-right"></i>

					</span>

				</a>

				<ul class="treeview-menu">

					<li>

						<a href="cargos">

							<i class="fa fa-circle-o"></i>
							<span>Cargos</span>

						</a>

					</li>

					<li>

						<a href="departamentos">

							<i class="fa fa-circle-o"></i>
							<span>Departamentos</span>

						</a>
				</ul>

				    </li>

					</li>';

}

if ($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Especial") {

    echo '<li class="treeview">

				<a href="#">

					<i class="fa fa-file-pdf-o"></i>

					<span>Reportes</span>

					<span class="pull-right-container">

						<i class="fa fa-angle-left pull-right"></i>

					</span>

				</a>

				<ul class="treeview-menu">

					<li>

						<a href="asistencia-diaria">

							<i class="fa fa-circle-o"></i>
							<span>Asistencia Diaria</span>

						</a>

					</li>

					<li>

						<a href="asistencia-quincenal">

							<i class="fa fa-circle-o"></i>
							<span>Asistencia Quincenal</span>

						</a>

					</li>';

    if ($_SESSION["perfil"] == "Administrador") {

        echo '<li id="asistencia-mensual">

						<a href="asistencia-mensual">

							<i class="fa fa-circle-o"></i>
							<span>Asistencia Mensual</span>

						</a>

					</li>';

    }

    echo '</ul>

			</li>';

}

?>

		</ul>

	 </section>

</aside>