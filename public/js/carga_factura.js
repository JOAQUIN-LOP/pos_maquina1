$(document).ready(function(){

	var id_producto;

	var msg = "<h4>Alerta!</h4>" +
		      "<p>* Campos obligatorios</p>";

	/*configuración del touchspin*/
	$("#cantidad").TouchSpin({
		verticalbuttons: true
	});

	/*subir y bajar valores en cantidad*/
	$(".input-group-btn-vertical > .btn").click(function(){

		if ($("#cantidad").val() == 0 || $("#precio_prod").val() == "a") {
			$("#sub_total").val("");
			alertify.closeLogOnClick(true).error(msg);
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
		
		$("#sub_total").val("");
		$("#cantidad").val("");

		if($(this).val()==0){			
			alertify.closeLogOnClick(true).error(msg);
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
			
	    	$("#precio_prod").html("");
			$("#precio_prod").append("<option value='a'>Precio</option>");
	    
	    	for(i in response){
				$("#precio_prod").append("<option value='"+response[i].precio_unidad+"'>"+response[i].precio_unidad+"</option>");
			}
			
	    })
	    .fail(function(response){
	    	//var datos = JSON.parse(response); 
	    	console.log(response);	    	
	    });	
	});

	/*-----select precio unitario */
	$("#precio_prod").change(function(){


		if ($(this).val()=="a") {

			$("#sub_total").val("");
			$("#cantidad").val("");
		    //alertify.logPosition("top right");
			alertify.closeLogOnClick(true).error(msg);
			
			return false;
		}		

		if ($("#cantidad").val()=="" || $("#cantidad").val() == 0) {
			alertify.closeLogOnClick(true).error(msg);			
			return false;
		}

		var cantidad = $("#cantidad").val();
		var precio = $("#precio_prod").val();

		var sub_total = (cantidad * precio);

		$("#sub_total").val(parseFloat(sub_total).toFixed(2));

	});

	/*input cantidad al perder el foco*/
	$("#cantidad").focusout(function(){
		
		if ($(this).val()=="" || $(this).val()<=0) {
			alertify.closeLogOnClick(true).error(msg);
			return false;
		}

		if ($("#nom_producto").val()==0 || $("#precio_prod").val()=="a") {
			alertify.closeLogOnClick(true).error(msg);
			return false;
		}

		var cantidad = $("#cantidad").val();
		var precio = $("#precio_prod").val();

		var sub_total = (cantidad * precio);

		$("#sub_total").val(parseFloat(sub_total).toFixed(2));		

	});


	/* boton agregar al cuerpo de la factura*/
	$("#btn_agregar").click(function(){

		if ($("#nom_producto").val()==0 || $("#precio_prod").val()=="a") {
			alertify.closeLogOnClick(true).error(msg);
			return false;
		}

		if ($("#cantidad").val()<=0) {
			alertify.closeLogOnClick(true).error(msg);
			return false;
		}

		if ($("#sub_total").val()=="" || $("#sub_total").val()==0) {
			alertify.closeLogOnClick(true).error(msg);
			return false;
		}

		var cantidad = $("#cantidad").val();
		var id_prod = $("#nom_producto").val();
		var nom_prod = $("#nom_producto :selected").text();
		var precio = $("#precio_prod").val();
		var sub = $("#sub_total").val();

		//console.log(cantidad +"+"+id_prod+"+"+nom_prod+"+"+precio+"+"+sub);

		$("#creacion_factura > tbody").append("<tr><td><input type='text' class='columnas' name='id_producto[]' value='"+id_prod+"' hidden='true'>"+nom_prod+"</td><td><input type='text' class='columnas' name='cantidad[]' value='"+cantidad+"' hidden='true'>"+cantidad+"</td><td><input type='text' class='columnas' name='precio[]' value='"+precio+"' hidden='true'>"+precio+"</td><td><input type='text' class='columnas' name='sub_total[]' value='"+sub+"' hidden='true'>"+sub+"</td><td><button type='button' class='btn btn-danger btn-as-block btn-sm btn_borrar_linea' onclick='borrar_linea(this)'><i class='fa fa-trash' style='margin-right: 5px;''></i>Borrar</button></td></tr>");

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

/*----función botón para borrar linea*/
function borrar_linea(btn){
	btn.closest("tr").remove();
}