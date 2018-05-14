$(document).ready(function(){

	$("#btn_iniciar").click(function(){

		if($("#no_existe").length){
			$("#no_existe").remove();
		}

		$.ajax({
	        url:"./carga_factura/",
	        
	        type:"GET",                       
	    })
	    .done(function(response){
			$(".box").append(response);
			console.log(response);
	    })
	    .fail(function(response){
	    	$(".box").append(response.responseText);
	    	console.log(response);
	    });
	});

});