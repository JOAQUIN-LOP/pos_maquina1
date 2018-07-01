$(document).ready(function(){

	$("#inventarios").DataTable({
		autoWitdh: true,
	 	order: [[ 1, "asc" ]],
	  	dom: 'Bfrtip',//Definimos los elementos del control de tabla
	  	// agregamos botones para exportar la informacion 
	  	buttons: [
	    	{
	      		extend: 'pdfHtml5',
	      		title: 'Inventarios Sucursal',     
	      		exportOptions:{
	        	columns: [1, 2, 3, 4, 5, 6]
	      	}       
	    }
	  ]  
	});

});


function verDetalle(btn){

	var id_detalle = $(btn).closest("tr").find("td")[0].innerHTML;
	var id_sucursal= $(btn).closest("tr").find("td")[2].firstChild.value;

	var cant_sub = $(btn).closest("tr").find("td")[3].firstChild.value;
					
	var total = parseFloat($("#total_importe").val()) - parseFloat(cant_sub).toFixed(2);
	var cantidades = parseFloat($("#total_cantidad").val()) - parseFloat(cant_prod).toFixed(2);

	$("#total_importe").val(parseFloat(total).toFixed(2));
	$("#total_cantidad").val(parseFloat(cantidades).toFixed(2));

	btn.closest("tr").remove();
}


function editar(btn){

}