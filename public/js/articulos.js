$(document).ready(function(){

    $('#Productos').DataTable();

    $('#Productos').on('click','tr.fila', function(){
            var idProducto = $(this).find("td").get(1).innerHTML;
            var nomProducto = $(this).find("td").get(1).innerHTML;
            var descripcion_producto = $(this).find("td").get(2).innerHTML;
           
            $('#nomProducto').val(nomProducto);
            $('#descripcion_producto').val(descripcion_producto);

        });    
});