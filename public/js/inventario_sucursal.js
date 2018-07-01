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

	$("#nom_sucursal").change(function(){			

	});

	$("btn_agregar").click(function(){

	});

	
	$("#btn_ver").click(function(){

		if($("#already").length){
			$("#already").remove();
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

		var valida = date.getFullYear();

		if(anio > valida){
			$("#mes").val("");
			$("#no_inventario").val("");
			alertify.closeLogOnClick(true).error(msg);
			return false;
		}

		var token = $("token").val();

		var data = $(".form-numero").serialize();

		$.ajax({
			url: "./inv_sucursal/" + id,
			headers: {'X-CSRF-TOKEN' : token },
			type:"POST",
			dataType: 'json',
			data:data,
		})
		.done(function(response){

			switch(response){
				case 1:
						$('#mes').val('Enero');
						$("#no_inventario").val(response);
				break;

				case 2:
						$('#mes').val('Febrero');
						$("#no_inventario").val(response);
				break;

				case 3:
						$('#mes').val('Marzo');
						$("#no_inventario").val(response);
				break;

				case 4:
						$('#mes').val('Abril');
						$("#no_inventario").val(response);
				break;

				case 5:
						$('#mes').val('Mayo');
						$("#no_inventario").val(response);
				break;

				case 6:
						$('#mes').val('Junio');
						$("#no_inventario").val(response);
				break;

				case 7:
						$('#mes').val('Julio');
						$("#no_inventario").val(response);
				break;

				case 8:
						$('#mes').val('Agosto');
						$("#no_inventario").val(response);
				break;

				case 9:
						$('#mes').val('Septiembre');
						$("#no_inventario").val(response);
				break;

				case 10:
						$('#mes').val('Octubre');
						$("#no_inventario").val(response);
				break;

				case 11:
						$('#mes').val('Noviembre');
						$("#no_inventario").val(response);
				break;

				case 12:
						$('#mes').val('Diciembre');
						$("#no_inventario").val(response);
				break;

				default:
						$(".box").append(response);
				break;

			}

			//console.log(response);			

		})
		.fail(function(response){

			alertify.closeLogOnClick(true).error(msg_error);
			console.log(response);

		});
	});


	$("#btn_listar").click(function(){
		
		
	});

});