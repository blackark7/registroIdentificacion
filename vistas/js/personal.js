/*=============================================
EDITAR PERSONAL
=============================================*/
$(".tablas").on("click", ".btnEditarPersonal", function(){

	var idPersonal = $(this).attr("idPersonal");

	var datos = new FormData();
    datos.append("idPersonal", idPersonal);

    $.ajax({

      url:"ajax/personal.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){

         var datosCargo = new FormData();
          datosCargo.append("idCargo",respuesta["id_cargo"]);

           $.ajax({

              url:"ajax/cargos.ajax.php",
              method: "POST",
              data: datosCargo,
              cache: false,
              contentType: false,
              processData: false,
              dataType:"json",
              success:function(respuesta){
                  
                  $("#editarCargo").val(respuesta["id"]);
                  $("#editarCargo").html(respuesta["cargo"]);

              }

          })

           var datosDepartamento = new FormData();
          datosDepartamento.append("idDepartamento",respuesta["id_departamento"]);

           $.ajax({

              url:"ajax/departamentos.ajax.php",
              method: "POST",
              data: datosDepartamento,
              cache: false,
              contentType: false,
              processData: false,
              dataType:"json",
              success:function(respuesta){
                  
                  $("#editarDepartamento").val(respuesta["id"]);
                  $("#editarDepartamento").html(respuesta["departamento"]);

              }

          })
      
      	 $("#idPersonal").val(respuesta["id"]);
	       $("#editarCedula").val(respuesta["cedula"]);
	       $("#editarNombre").val(respuesta["nombres"]);
	       $("#editarApellido").val(respuesta["apellidos"]);
	       $("#editarTelefono").val(respuesta["telefono"]);
	       $("#editarDireccion").val(respuesta["direccion"]);
         $("#editarFechaNacimiento").val(respuesta["fecha_nacimiento"]);
	  }

  	})

})

/*=============================================
ELIMINAR PERSONAL
=============================================*/
$(".tablas").on("click", ".btnEliminarPersonal", function(){

	var idPersonal = $(this).attr("idPersonal");
	
	swal({
        title: '¿Está seguro de borrar el trabajador?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar trabajador!'
      }).then(function(result){
        if (result.value) {
          
            window.location = "index.php?ruta=personal&idPersonal="+idPersonal;
        }

  })

})