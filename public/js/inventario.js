$('document').ready(function(){
   
    $('#All').DataTable( {
        
        
    } );
    
    let meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
    
    var fecha = new Date();
    var mes = fecha.getMonth();
    var anio = fecha.getFullYear();
    
    
    $('#mes').val(meses[mes]);
    $('#anio').val(anio);
    
    
    var url = $('#FormPrecioProd').attr('action');
    console.log(url);
    $.get(url, function (data) {
        //success data
        console.log(data);
    });
})