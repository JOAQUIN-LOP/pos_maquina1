$("#facturas").DataTable({
  dom: 'Bfrtip',//Definimos los elementos del control de tabla
  // agregamos botones para exportar la informacion 
  buttons: [
    {
      extend: 'pdfHtml5',
      title: 'Facturas',     
      exportOptions:{
        columns: [ 0, 1, 2, 3, 4, 5]
      }       
    }
  ],
});

$(".detalles").on('click',function(){

  $(".modal .modal-dialog").remove();

  var id_factura = $(this).parents("tr").find("td")[0].innerHTML;
  var token = $("#token").val();

  $.ajax({
            url:"./detalle_factura/" + id_factura,
            headers: {'X-CSRF-TOKEN': token},
            type:"POST",
            dataType: 'json',
                    
    })
    .done(function(response){
      $(".modal").append(response.responseText);
      console.log(response);

    })
    .fail(function(response){
      $(".modal").append(response.responseText);
      console.log(response);
    });
  //console.log(id_factura);
  //console.log($(this).text());
  $("#modal-info").modal();

});

$("#GuardarPrecio").click(function(){
  alert("Guardando Precio");
});