$('document').ready(function(){
    
    var token = $("#token").val();
    var url = $('#CrearInventario').attr('action');
    var idInv = null;

    var All = $('#All').DataTable( {
        responsive: true
    });

    let meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
    let NumInventario = [1,2,3,4,5,6,7,8,9,10,11,12];
    
    var fecha = new Date();
    var mes = fecha.getMonth();
    var anio = fecha.getFullYear();

    $.get(url+'/home/detalle/inventario/ver/activo', headers = { 'X-CSRF-TOKEN': token }, function (result) {
        idInv = result[0].idInventario;
        $("#idInventario").val(result[0].idInventario);
        $("#empresa").val(result[0].empresa);
        $("#anio").val(result[0].anio);
        $("#mes").val(meses[result[0].mes - 1]);

        $.get(url+'/home/detalle/inventario/'+idInv, headers = { 'X-CSRF-TOKEN': token }, function (result) {
            $(result).each(function (key, value) {
                All.row.add([
                    key+1,
                    value['producto'],
                    meses[value['mes']-1],
                    value['anio'],
                    value['sub'],
                    value['cant']
                ]).draw(false);
                $( ".odd" ).addClass("fila");
                $( ".even" ).addClass("fila");
            })
        });
    });

    $.get(url+'/home/producto', headers = { 'X-CSRF-TOKEN': token }, function (result) {
        $(result).each(function (key, value) {
            $("#CodProducto").append("<option value='"+value['id']+"'>"+value['nomProducto']+"</option>");
        });
    });

    var AllProd = $('#AllProd').DataTable( {
        responsive: true
    });
    

    $("#CodProducto").change(function(){
        id = $("#CodProducto").val();
        $.get(url+'/home/detalle/precio/'+id, headers = { 'X-CSRF-TOKEN': token }, function (result) {
            $(result).each(function (key, value) {
                console.log(value);
                AllProd.row.add([
                    key+1,
                    value.producto['nomProducto'],
                    value['precio_unidad'],
                    value['cantidad_unidades'],
                    '<input type="text" class"form-control">',
                    '<input type="text" class"form-control">',
                    '<input type="text" class"form-control">',
                ]).draw(false);
                $( ".odd" ).addClass("fila");
                $( ".even" ).addClass("fila");
            });
        });
    })

    

});

// nomProducto id