$(document).ready(function(){

	$("#precio_prod").select2({
		language: {

		    noResults: function() {

		      return "No hay resultado";        
	    	}
	    }
	});	

	$("#nom_sucursal").select2({
		language: {

		    noResults: function() {

		      return "No hay resultado";        
	    	}
	    }
	});

	$("#btn_iniciar").click(function(){



		if($("#nom_sucursal").val() == 0){

			if($("#no_existe").length){
				$("#no_existe").remove();
			}



			return false;
		}

		$("#nom_sucursal").attr('disabled', 'true');		

		if($("#no_existe").length){
			$("#no_existe").remove();
		}

		var token = $("#token").val();
		var id = $("#nom_sucursal").val();

		$.ajax({
	        url:"./carga_factura/"+id,
	        headers: {'X-CSRF-TOKEN': token},
	        type:"POST",                       
	        dataType: 'json'
	    })
	    .done(function(response){
			$(".box").append(response);
			//console.log(response);
	    })
	    .fail(function(response){
	    	$(".box").append(response.responseText);
	    	//console.log(response);
	    });
	});	

});