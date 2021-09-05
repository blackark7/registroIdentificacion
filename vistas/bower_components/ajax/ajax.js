$("#btnguardar").click(function () {
    var datos = $('#guardarDatos').serialize();

    $.ajax({
        type: "POST",
        url: "modelos/registrar-asistencia.php",
        data: datos,
        beforeSend: function (objeto) {
            $(".mensaje").html("Mensaje: Cargando...");
        },
        success: function (datos) {
            $(".mensaje").html(datos);
            /*Limpiamos los inputs */
            $('#cedula').val('');
            $('#cedula').focus();

        }
    });
    event.preventDefault();
});

$("#btnsalir").click(function () {
    var datos = $('#guardarDatos').serialize();

    $.ajax({
        type: "POST",
        url: "modelos/registrar-salida.php",
        data: datos,
        beforeSend: function (objeto) {
            $(".mensaje").html("Mensaje: Cargando...");
        },
        success: function (datos) {
            $(".mensaje").html(datos);
            /*Limpiamos los inputs */
            $('#cedula').val('');
            $('#cedula').focus();

        }
    });
    event.preventDefault();
});

function modPersonal() {
    $("#loader").fadeIn('slow');
    $.ajax({
        url: "vistas/modulos/hola.html",
        type: "POST",

        success: function (data) {
            $(".mensaje").html(data).fadeIn('slow');
            $("#mensaje").html("");
        }
    })
}