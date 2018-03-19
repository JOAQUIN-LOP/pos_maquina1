$(document).ready(function(){

    $('#Productos').DataTable(
       
    );

    $('#Productos').on('click','tr.fila', function(){
            var IdProducto = $(this).find("td").get(0).innerHTML;
            var nomProducto = $(this).find("td").get(1).innerHTML;

            $('#IdProducto').val(IdProducto);
            $('#nomProducto').val(nomProducto);

        });    
});