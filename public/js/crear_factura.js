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

	});	

	/*----seccion donde carga los datos al panel donde luego se cargará la factura completa*/




	/*---- section for factura header*/

	$(".btn_borrar_linea").on('click', function(){
		$(this).closest("tr").remove();
	});

	$("#nom_producto").select2({
		language: {

		    noResults: function() {

		      return "No hay resultado";        
	    	}
	    }
	});
});