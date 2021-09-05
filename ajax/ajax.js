	function load(page){
		var parametros = {"action":"ajax","page":page};
		$("#loader").fadeIn('slow');
		$.ajax({
			url:'/vistas/modulos/login-asistencia.php',
			data: parametros,
			success:function(data){
				$(".outer_div").html(data).fadeIn('slow');
				
			}
		})
	}


		$( "#btnguardar" ).click(function() {
			var datos=$('#guardarDatos').serialize();
			
			$.ajax({
				type:"POST",
				url:"../login/registrar-asistencia.php",
				data:datos,
				beforeSend: function(objeto){
						$(".datos_ajax_delete").html("<img src='loader.gif'>");
					  },
					success: function(datos){
					$(".datos_ajax_delete").html(datos);
                    /*Limpiamos los inputs */
					$('#cedula').val('');
                    $('#cedula').focus();
					
				  }
			});
		  event.preventDefault();
		});
                
                $( "#btnsalir" ).click(function() {
			var datos=$('#guardarDatos').serialize();
			
			$.ajax({
				type:"POST",
				url:"../login/registrar-salida.php",
				data:datos,
				beforeSend: function(objeto){
						$(".datos_ajax_delete").html("<img src='loader.gif'>");
					  },
					success: function(datos){
					$(".datos_ajax_delete").html(datos);
                    /*Limpiamos los inputs */
					$('#cedula').val('');
                    $('#cedula').focus();
					
				  }
			});
		  event.preventDefault();
		});

function modPersonal(){
		$("#loader").fadeIn('slow');
		$.ajax({
			url:"hola.html",
			type: "POST",
			
			success:function(data){
				$("#nombres").html(data).fadeIn('slow');
				$("#nombres").html("");
			}
		})
	}