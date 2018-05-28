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

		id_producto = $(this).val();
		console.log(id_producto);
	});


	$("#btn_agregar").click(function(){

		if ($("#nom_producto").val()==0 || $("#precio_prod").val()=="a") {
			return false;
		}
		

	});
		

});