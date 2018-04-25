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

  var id_factura = $(this).parents("tr").find("td")[0].innerHTML;
  //console.log(id_factura);
  //console.log($(this).text());
  $("#modal-info").modal();

});

$("#GuardarPrecio").click(function(){
  alert("Guardando Precio");
});