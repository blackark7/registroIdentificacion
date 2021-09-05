/*=============================================
EDITAR AREA
=============================================*/
$(".tablas").on("click", ".btnEditarArea", function(){

	var idArea = $(this).attr("idArea");

	var datos = new FormData();
	datos.append("idArea", idArea);

	$.ajax({
		url: "ajax/areas.ajax.php",
		method: "POST",
      	data: datos,
      	cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",
     	success: function(respuesta){

     		$("#editarArea").val(respuesta["area"]);
     		$("#idArea").val(respuesta["id"]);

     	}

	})


})

/*=============================================
ELIMINAR AREA
=============================================*/
$(".tablas").on("click", ".btnEliminarArea", function(){

	 var idArea = $(this).attr("idArea");

	 swal({
	 	title: '¿Está seguro de borrar el área?',
	 	text: "¡Si no lo está puede cancelar la acción!",
	 	type: 'warning',
	 	showCancelButton: true,
	 	confirmButtonColor: '#3085d6',
	 	cancelButtonColor: '#d33',
	 	cancelButtonText: 'Cancelar',
	 	confirmButtonText: 'Si, borrar área!'
	 }).then(function(result){

	 	if(result.value){

	 		window.location = "index.php?ruta=areas&idArea="+idArea;

	 	}

	 })

})
