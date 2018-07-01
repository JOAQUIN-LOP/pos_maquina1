$(document).ready(function(){

	var msg = "<h4>Alerta!</h4>" +
		      "<p>El año no corresponde al actual.</p>";

	var msg2 = "<h4>Alerta!</h4>" +
		      "<p>Seleccione un valor.</p>";

	var msg_error = "<h4>Alerta!</h4>" +
		      		"<p>Error Interno.</p>"+
		      		"<p>Contacte con Administrador.</p>";

	$(".selector").select2({
		language: {

			noResult: function(){
				return "No hay resultado";
			}
		}
	});
	
	
	$("#btn_ver").click(function(){

		if($("#lista-cargada").length){
			$("#lista-cargada").remove();
		}

		if($("#no_existe").length){
			$("#no_existe").remove();
		}
		
		var id = $("#nom_sucursal").val();

		//var mes = $("#mes").val();

		var anio = $("#anio").val();

		//validamos para realizar request ajax
		if (anio == 0 || id == 0) {
			alertify.closeLogOnClick(true).error(msg2);
			return false;
		}

		var date = new Date();

		var token = $("token").val();

		var data = $(".form-numero").serialize();

		$.ajax({
			url: "./carga/" + id,
			headers: {'X-CSRF-TOKEN' : token },
			type:"POST",
			dataType: 'json',
			data:data,
		})
		.done(function(response){			

			$(".box").append(response);
			//console.log(response);			

		})
		.fail(function(response){
			$(".box").append(response.responseText);
			//alertify.closeLogOnClick(true).error(msg_error);
			console.log(response);

		});
	});


	$("#btn_listar").click(function(){
		
		
	});

});