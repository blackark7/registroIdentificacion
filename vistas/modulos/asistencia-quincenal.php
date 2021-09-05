  <div class="content-wrapper">

    <section class="content-header">

      <h1>

       Administrar Asistencias

      </h1>

      <ol class="breadcrumb">

        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

        <li class="active">Asistencia diaria</li>

      </ol>

    </section>

    <section class="content">

      <div class="box">

        <div class="box-header with-border" style="text-align: center; font-size: 18px;">

          <ol class="breadcrumb">

            <li><a href="#"><i class="fa  fa-calendar"></i> <span data-widget="collapse" style="color: #F00; font-weight: bold">BUSCAR ASISTENCIA QUINCENAL</span></a></li>

          </ol>

          <div class="box-tools pull-right">

            <button type="button" class="btn btn-box-tool" data-widget="collapse">Ocultar</button>

          </div>

        </div>

       <form method="post" action="extensiones/excel/reporte-excel.php">

        <div class="box-body">

          <div class="row">

            <div class="col-md-4">

              <div class="form-group">

                <label>Mes</label>

                <select name="mes" class="form-control" required>
                  <option value="">Selecciona un mes</option>
                  <option value="01">Enero</option>
                  <option value="02">Febrero</option>
                  <option value="03">Marzo</option>
                  <option value="04">Abril</option>
                  <option value="05">Mayo</option>
                  <option value="06">Junio</option>
                  <option value="07">Julio</option>
                  <option value="08">Agosto</option>
                  <option value="09">Septiembre</option>
                  <option value="10">Octubre</option>
                  <option value="11">Noviembre</option>
                  <option value="12">Diciembre</option>
                </select>

              </div>

            </div>

            <div class="col-md-4">

              <div class="form-group">

                <label>Quincena</label>

                <select name="quincena" class="form-control" required>
                  <option value="">Selecciona una quincena</option>
                  <option value="PRIMERA">Primera</option>
                  <option value="SEGUNDA">Segunda</option>
                </select>

              </div>

            </div>

            <div class="col-md-4">

              <div class="form-group">

                <label>Año</label>

                <select name="anio" class="form-control" required>
                    <option value="<?php echo date('Y') ?>"><?php echo date('Y') ?></option>
                    <option value="2020">2020</option>
                    <option value="2019">2019</option>
                    <option value="2018">2018</option>
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
