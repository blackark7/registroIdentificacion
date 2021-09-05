<section class="material-half-bg">
    <div class="cover"></div>
</section>
<section class="login-content">
    <div class="logo">
        <div style="font-size: 20px" class="mensaje"></div><!-- Datos ajax Final -->

    </div>

    <div class="login-box">

        <form class="login-form" id="guardarDatos" method="POST">
            <h4 class="login-head" onclick="modPersonal()"><b>VALIDAR INGRESO</b></h4>
            <div class="form-group">
                <label class="control-label">CEDULA</label>
                <input class="form-control" type="number" name="cedula" id="cedula" placeholder="Ingrese su n° de cedula" autofocus required autocomplete="off">
            </div>

            <div class="form-group">
                <div class="utility">
                    <div class="animated-checkbox">
                        <label>

                        </label>
                    </div>
                    <p class="semibold-text mb-2"><a href="#" data-toggle="flip"><b>Admin</b></a></p>
                </div>
            </div>
            <div class="form-group btn-container">
                <button id="btnguardar" class="btn btn-primary btn-block btn-success"><i class="fa fa-sign-in fa-lg fa-fw"></i>CONFIRMAR</button>
            </div>
            
        </form>
        <form class="forget-form" method="post">
            <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>INICIAR SESIÓN </h3>
            <div class="form-group">
                <label class="control-label">USUARIO</label>
                <input class="form-control" type="text" name="ingUsuario" autofocus required autocomplete="off">
            </div>
            <div class="form-group">
                <label class="control-label">PASSWORD</label>
                <input class="form-control" type="password" name="ingPassword" required>
            </div>
            <div class="form-group">
                <div class="utility">
                    <div class="animated-checkbox">
                        <label>

                        </label>
                    </div>
                    <p class="semibold-text mb-2" style="margin-left: -70px"><a href="#" data-toggle="flip"><b>Asistencia</b></a></p>

                </div>

            </div>
            <div class="form-group btn-container">
                <button class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>ENTRAR</button>
            </div>

        </form>
    </div>


    <?php
    $login = new ControladorUsuarios();

    $login->ctrIngresoUsuario();
    ?>
    <?php
    include_once 'footer.php';
    ?>
</section>

<script type="text/javascript">
    // Login Page Flipbox control
    $('.login-content [data-toggle="flip"]').click(function () {
        $('.login-box').toggleClass('flipped');
        return false;
    });
</script>

