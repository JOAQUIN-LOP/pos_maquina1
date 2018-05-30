$(document).ready(function(){

	var id_producto;

	/*configuración del touchspin*/
	$("#cantidad").TouchSpin({
		verticalbuttons: true
	});

	/*subir y bajar valores en cantidad*/
	$(".input-group-btn-vertical > .btn").click(function(){
		if ($("#cantidad").val() == 0 || $("#precio_prod").val() == "a") {
			$("#sub_total").val("");
			return false;
		}

		var suma = $("#cantidad").val() * $("#precio_prod").val();


		$("#sub_total").val(parseFloat(suma).toFixed(2)); //colocar 2 decimales
	});


	/*---- cambio de lenguaje al no encontrar valores en los select */
	$(".seleccionar").select2({
		language: {
		    noResults: function() {
		      return "No hay resultado";        
	    	}
	    }
	});

	/*Valida que se haya seleccionado un producto*/
	$("#nom_producto").change(function(){
		
		if($(this).val()==0){
			$("#cantidad").val("");
			return false;
		}

		var id = $(this).val();	

		var token = $("#token").val();		

		$.ajax({
	        url:"./ver_precio/"+id,
	        headers: {'X-CSRF-TOKEN': token},
	        type:"POST",                       
	        dataType: 'json'
	    })
	    .done(function(response){
			//var datos = JSON.parse(response); 

			//console.log(response[0].precio_unidad);

	    	$("#precio_prod").html("");
			$("#precio_prod").append("<option value='a'>Precio</option>");
	    
	    	for(i in response){
				$("#precio_prod").append("<option value='"+response[i].precio_unidad+"'>"+response[i].precio_unidad+"</option>");
			}
			//$(".box").append(response);
			//console.log(response);
	    })
	    .fail(function(response){
	    	//var datos = JSON.parse(response); 
	    	console.log(response);	    	
	    });	
	});

	/*-----select precio unitario */
	$("#precio_prod").change(function(){


		if ($(this).val()=="a") {
			
		var msg = "<h4>Alerta!</h4>" +
		      "<p>* Campos obligatorios</p>";

		    //alertify.logPosition("top right");
			alertify.closeLogOnClick(true).error(msg);
			
			return false;
		}		

		if ($("#cantidad").val()=="" || $("#cantidad").val() == 0) {			
			return false;
		}

		var cantidad = $("#cantidad").val();
		var precio = $("#precio_prod").val();

		var sub_total = (cantidad * precio);

		$("#sub_total").val(sub_total);

	});

	/*input cantidad al perder el foco*/
	$("#cantidad").focusout(function(){
		
		if ($(this).val()=="" || $(this).val()<=0) {
			return false;
		}

		if ($("#nom_producto").val()==0 || $("#precio_prod").val()=="a") {
			return false;
		}

		var cantidad = $("#cantidad").val();
		var precio = $("#precio_prod").val();

		var sub_total = (cantidad * precio);

		$("#sub_total").val(sub_total);		

	});


	/* boton agregar al cuerpo de la factura*/
	$("#btn_agregar").click(function(){

		if ($("#nom_producto").val()==0 || $("#precio_prod").val()=="a") {
			return false;
		}

		if ($("#cantidad").val()<=0) {
			return false;
		}

	});


	/*-- boton guardar factura*/
	$("#btn_guardar").click(function(){


		$(this).attr('disabled', true);
		


		var token = $("#token").val();		

		$.ajax({
	        url:"./ver_precio/"+id,
	        headers: {'X-CSRF-TOKEN': token},
	        type:"POST",                       
	        dataType: 'json'
	    })
	    .done(function(response){
	    	var datos = JSON.parse(response); 

	    	
			//$(".box").append(response);
			console.log(response);
	    })
	    .fail(function(response){
	    	//$(".box").append(response.responseText);
	    	console.log(response);
	    });	

	    $(this).removeAttribute("disabled");

	});

	/*boton cancelar, remueve factura y habilita las sucursales*/
	$("#btn_cancelar").click(function(){
		var desactivar = document.getElementById("nom_sucursal");
		desactivar.removeAttribute("disabled");

		if($("#no_existe").length){
			$("#no_existe").remove();
		}
	});

});