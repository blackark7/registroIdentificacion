  <div class="content-wrapper">

    <section class="content-header">

      <h1>

       Ver Asistencia

      </h1>

      <ol class="breadcrumb">

        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

        <li class="active">Ver Asistencia</li>

      </ol>

    </section>

    <section class="content">

      <div class="box">

        <div class="box-header with-border" style="text-align: center; font-size: 18px;">

          <ol class="breadcrumb">

            <li><a href="#"><i class="fa  fa-calendar"></i> <span data-widget="collapse" style="color: #F00; font-weight: bold">BUSCAR ASISTENCIA POR DEPARTAMENTO</span></a></li>

          </ol>

          <div class="box-tools pull-right">

            <button type="button" class="btn btn-box-tool" data-widget="collapse">Ocultar</button>

          </div>

        </div>

       <form method="post" action="extensiones/tcpdf/pdf/asistencia-diaria.php" target="blank">

        <div class="box-body">

          <div class="row">

            <div class="col-md-3">

              <div class="form-group">

                <label>Fecha</label>

                <input type="date" name="fecha" id="fecha" class="form-control" required>

              </div>

            </div>
              
              <div class="col-md-3">

              <div class="form-group">

                <label>Fecha</label>

                <input type="date" name="fecha" id="fecha" class="form-control" required>

              </div>

            </div>
              

            <div class="col-md-6">

              <div class="form-group">

                <label>Departamento</label>

                <select class="form-control" id="departamento" name="departamento" required>

                  <option value="">Selecionar departamento</option>

                  <?php

$item  = null;
$valor = null;

$departamentos = ControladorDepartamentos::ctrMostrarDepartamentos($item, $valor);

foreach ($departamentos as $key => $value) {

    echo '<option value="' . $value["id"] . '">' . $value["departamento"] . '</option>';
}

?>

                </select>

              </div>

            </div>

          </div>


          <!-- row Boton-->
          <div class="row justify-content-center">
            <div class="col-md-4">

            </div>
            <!-- /.col -->

             <div class="col-md-4">


              <button type="submit" class="btn btn-primary btn-block">
            <i class="fa fa-search"></i> Buscar
          </button>

            </div>
            <!-- /.col -->
          </div>
          <!-- /.row boton -->
        </div>
        <!-- /.box-body -->

        </form>
      </div>
      <!-- /.box -->

      <!-- FIN DATOS DEL ESTUDIANTE -->
    </section>
    <!-- /.content -->
  </div>
