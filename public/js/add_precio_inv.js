$(document).ready(function(){

	var msg = "<h4>Alerta!</h4>" +
		      "<p>El año no corresponde al actual.</p>";

	var msg2 = "<h4>Alerta!</h4>" +
		      "<p>Seleccione un valor.</p>";

	var msg_error = "<h4>Alerta!</h4>" +
		      		"<p>Error Interno.</p>"+
		      		"<p>Contacte con Administrador.</p>";

	var msg_success = "<h4>Exito!</h4>" +
		      		"<p>Datos Guardados.</p>";


	$(".selector").select2({
		language: {

			noResult: function(){
				return "No hay resultado";
			}
		}
	});


	$("#nom_sucursal").change(function(){

		var ad = $(this).val();
		var token = $("#token").val();

		if (ad == 0) {
			alertify.closeLogOnClick(true).error(msg2);
			return false;
		}


		$.ajax({
			url: "./det_inv_sucursal/" + ad,
			headers: {'X-CSRF-TOKEN' : token },
			type:"POST",
			dataType: 'json'		
		})
		.done(function(response){
		
			if (response.length == 0) {

				$("#anio").val("");
				$("#mes").val("");
				$("#no_inventario").val("");
				$("#id_inv_sucursal").val("");

				alertify.closeLogOnClick(true).error("No se encontro Inventario Activo.");
				return false;

			}

			$("#anio").val(response[0].anio);			
			$("#mes_db").val(response[0].mes);

			switch(response[0].mes){
				case 1:
						$('#mes').val('Enero');
						$("#mes_db").val(response[0].mes);
				break;

				case 2:
						$('#mes').val('Febrero');
						$("#mes_db").val(response[0].mes);
				break;

				case 3:
						$('#mes').val('Marzo');
						$("#mes_db").val(response[0].mes);
				break;

				case 4:
						$('#mes').val('Abril');
						$("#mes_db").val(response[0].mes);
				break;

				case 5:
						$('#mes').val('Mayo');
						$("#mes_db").val(response[0].mes);
				break;

				case 6:
						$('#mes').val('Junio');
						$("#mes_db").val(response[0].mes);
				break;

				case 7:
						$('#mes').val('Julio');
						$("#mes_db").val(response[0].mes);
				break;

				case 8:
						$('#mes').val('Agosto');
						$("#mes_db").val(response[0].mes);
				break;

				case 9:
						$('#mes').val('Septiembre');
						$("#mes_db").val(response[0].mes);
				break;

				case 10:
						$('#mes').val('Octubre');
						$("#mes_db").val(response[0].mes);
				break;

				case 11:
						$('#mes').val('Noviembre');
						$("#mes_db").val(response[0].mes);
				break;

				case 12:
						$('#mes').val('Diciembre');
						$("#mes_db").val(response[0].mes);
				break;

				default:						
				break;

			}

			$("#no_inventario").val(response[0].num_inventario_sucursal);
			$("#id_inv_sucursal").val(response[0].idInventarioSucursal);
			console.log(response[0].idInventarioSucursal);
		

		})
		.fail(function(response){

			alertify.closeLogOnClick(true).error(msg_error);
			//console.log(response);

		});

	});

	$("#btn_agregar").click(function(){

		if($("#no_existe").length){
			$("#no_existe").remove();
		}

		var suc = $("#nom_sucursal").val();		
		var anio = $("#anio").val();
		var mes = $("#mes_db").val();		
		var noInv = $("#no_inventario").val();
		var id = $("#id_inv_sucursal").val();		

		if (suc == "" || anio == 0 || mes == "" || noInv == "" || id == "") {
			alertify.closeLogOnClick(true).error(msg2);
			return false;
		}

		var token = $("#token").val();



		$.ajax({
            url:"./detalle/" + id_detalle + "/"+ id_sucursal,
            headers: {'X-CSRF-TOKEN': token},
            type:"POST",
            dataType: 'json',
	                    
	    })
	    .done(function(response){
			$(".modal").append(response.responseText);
		    //console.log(response);

	    })
	    .fail(function(response){
	    	$(".modal").append(response.responseText);
	    	//console.log(response);
	    });
	

	});

});