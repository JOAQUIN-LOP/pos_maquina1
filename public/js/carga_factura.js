$(document).ready(function(){

	var id_producto;

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

			console.log(response[0].precio_unidad);

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

	$("#precio_prod").change(function(){
		if ($("#cantidad").val()=="" || $("#cantidad").val() == 0) {
			console.log($("#cantidad").val());
			return false;
		}
	});


	$("#btn_agregar").click(function(){

		if ($("#nom_producto").val()==0 || $("#precio_prod").val()=="a") {
			return false;
		}

	});


	$("#btn_guardar").click(function(){


		//var id = $("#").val();

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

	});

});