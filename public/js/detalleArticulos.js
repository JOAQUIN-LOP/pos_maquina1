$(document).ready(function(){

    // solo numero 

    $('.OnlyNumber').on('input', function () { 
      this.value = this.value.replace(/[^0-9]/g,'');
    });

    // solo numeros flotantes
    
    $('.OnlyNumbreFloat').on('input', function () {
        this.value = this.value.replace(/[^0-9\.]/g,'');
    });
    
    // datatable

    $('#detalleProducto').DataTable();

    // seleccionar producto y agregarle precio

    $('#tableProduct').on('click','tr.fila', function(){
        var IdProducto = $(this).find("td").get(0).innerHTML;
        var nomProducto = $(this).find("td").get(1).innerHTML;

        $('#IdProducto').val(IdProducto);
        $('#nomProducto').val(nomProducto);

     });    

    
    var fecha = new Date();
    var ano = fecha.getFullYear();
    var mes = fecha.getMonth();

    // selecciona el mes actual
    $("#mesDetalle option").each(function(){
        
        if((mes+1)==$(this).attr('value')){
            $(this).attr('selected', 'selected');
        }

     });
     
    //  mostrar anio actual y 5 anios atras y 5 adelante     

    var actual = ano;
     ano = ano - 5;
    for(i=0;i<=10;i++){
        if(actual == ano){
            $("#AnioDetalle").append(" <option value='"+ano +"' selected>"+ ano +"</option>");
        }else{
            $("#AnioDetalle").append(" <option value='"+ano +"'>"+ ano +"</option>"); 
        }
        
        ano++;
    }

    //  Calcular precio unitario

     $('#calcular').on('click', function(){
           var cantidad = $("#cantidad_unidades").val();
           var precio =  $("#precio_total_compras").val();

           if(precio > 0){
            Total = (precio / cantidad);
           $('#precio_unidad').val(Total);
           }
           
    })   
});

