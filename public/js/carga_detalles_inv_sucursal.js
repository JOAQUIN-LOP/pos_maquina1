$(document).ready(function(){

	$("#inventarios").DataTable({
		autoWitdh: true,
	 	order: [[ 0, "asc" ]],
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

	$(".modal .modal-dialog").remove();
	
	var token = $("#token").val();


	var id_detalle = $(btn).closest("tr").find("td")[0].innerHTML;
	var id_sucursal= $(btn).closest("tr").find("td")[2].firstChild.value;

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
	  //console.log(id_factura);
	  //console.log($(this).text());
	$("#modal-info").modal();
}


function editar(btn){

}