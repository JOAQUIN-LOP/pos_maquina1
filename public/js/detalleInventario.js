$('document').ready(function(){
    var token = $("#token").val();
    var url = $('#CrearInventario').attr('action');
    var idInv = null;
    
    let meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
    let NumInventario = [1,2,3,4,5,6,7,8,9,10,11,12];
    
    var fecha = new Date();
    var mes = fecha.getMonth();
    var anio = fecha.getFullYear();

    var AllProd = $('#AllProd').DataTable( {
        responsive: true,
        "lengthMenu": [5],
    });
    
    var All;
    var VerMasTable;

    $.get(url+'/home/detalle/inventario/ver/activo', headers = { 'X-CSRF-TOKEN': token }, function (result) {
    
        if(result.length >= 1){
            idInv = result[0].idInventario;
            mesInvent = NumInventario[result[0].mes - 1];
            $("#idInventario").val(result[0].idInventario);
            $("#NoInventario").val(result[0].num_inventario);            
            $("#empresa").val(result[0].empresa);
            $("#anio").val(result[0].anio);
            $("#mes").append("<option value='"+NumInventario[result[0].mes - 1]+"'>"+meses[result[0].mes - 1]+"</option>");
            
            AllInv();
        }
    });

    $.get(url+'/home/producto/agregar', headers = { 'X-CSRF-TOKEN': token }, function (result) {
        $(result).each(function (key, value) {
            $("#CodProducto").append("<option value='"+value['id']+"'>"+value['nomProducto']+"</option>");
        });
    });


    $("#CodProducto").change(function(){
        id = $("#CodProducto").val();
        cargarProd(id);
    });

    function cargarProd(id){
        AllProd.rows().remove().draw();
        $.get(url+'/home/detalle/precio/'+id+"/"+anio+"/"+mesInvent, headers = { 'X-CSRF-TOKEN': token }, function (result) {
            
            if(result.length >= 1){

            $(result).each(function (key, value) {
            
                AllProd.row.add([
                    key+1,
                    value.producto['nomProducto'],
                    '<input type="text" class="form-control input-sm precio" value="'+value['precio_unidad']+'" readonly>',
                    parseInt(value['cantidad_unidades']),
                    '<input type="number" class="form-control input-sm cantidad" max="'+parseInt(value['cantidad_unidades'])+'" value="" onkeypress="return event.charCode >= 48" min="0">',
                    '<input type="text" class="form-control input-sm total" readonly>',
                    '<a name="'+value['idProducto']+'" class="btn btn-primary btn-xs Agregar" data-toggle="tooltip" title="Agregar Producto" style="display:none"><i class="fa fa-plus"></i></a>'
                ]).draw(false);
                $( ".odd" ).addClass("fila");
                $( ".even" ).addClass("fila");
            });
            }else{ 
                $(".dataTables_empty").text('No se encontraron resultados');
            }

        });

    };

    function AllInv(){
        
        All = $('#All').DataTable( {
            responsive: true,
            destroy: true,
            "ajax": {
                url: url+'/home/detalle/inventario/'+idInv,
                type : "get",
                success: function(result){
                    $(result).each(function (key, value) {
                        All.row.add([
                            key+1,
                            value['producto'],
                            meses[value['mes']-1],
                            value['anio'],
                            parseInt(value['cant']),
                            value['sub'],
                            '<div class="btn-group"><a name="'+value['idPro']+'" class="btn btn-primary btn-xs modalVer" data-toggle="tooltip" title="Ver mas" ><i class="fa fa-search"></i></a>'
                        ]).draw(false);
                        $( ".odd" ).addClass("fila");
                        $( ".even" ).addClass("fila");
                    })
                }
            },
        });    
    }

    $('#AllProd').on('blur keypress change keydown','tr.fila input.cantidad', function(event){
        var exist = $(this).closest('tr').find("td").get(3).innerHTML;
        var valor = $(this).val();
        if ( event.which == 13 || event.type == 'blur' || event.which == 9) {
        
        var codigo = $(this).parents("tr").find(".precio").val();
        
        var existencia = parseInt(exist);
        if(valor != ""){
            if(valor <= existencia){
                var total = valor*codigo;
                $(this).parents("tr").find(".total").val(parseFloat(total).toFixed(2));
                $(this).parents("tr").find(".Agregar").show();
            }else{
                $(this).parents("tr").find(".Agregar").hide();
                MsjAlertShow('<p class="text-center">La cantidad exede el numero de existencia</p>');
                setTimeout(function(){ MsjAlertHide(); }, 1500);
                //$(this).val("");
                // do something in the background
                $(this).parents("tr").find(".total").val("");
                $(this).parents("tr").find(".Agregar").hide();
            }
            
        }
        if(valor==""){
                MsjAlertShow('<p class="text-center">El Campo No Puede Ir Vacio</p>');
                setTimeout(function(){ MsjAlertHide(); }, 1500);
            // do something in the background
            //$(this).parents("tr").find(".total").val("");
            $(this).parents("tr").find(".Agregar").hide();
            
            }

        }
    });

    $("#AllProd").on('click','tr.fila a.Agregar' , function(){
            var cod = $(this).attr('name');
            var total = $(this).parents("tr").find(".total").val();
            var cantidadT = $(this).parents("tr").find(".cantidad").val();

            data = $("#CrearInventario").serialize() + "&SubTotal=" + total + "&idProducto=" + cod + "&cantidadT=" + cantidadT;
            if(total != ""){
                $.ajax({
                    headers: { 'X-CSRF-TOKEN': token },
                    url: url+'/home/detalle/inventario',
                    type: 'POST',
                    dataType: 'json',
                    data: data,
                    success: function (response) {

                        $("#modalSuccess").modal('hide');

                        if (response['notification'] == "success") {
                        $('#mensaje').text(' Creado Exitosamente ');
                        $('#titulo').text('Exito');
                        }
                        if (response['notification'] == "danger") {
                        $('#mensaje').html(objeto.message + "<br>" + response.data  + "<br> No existe");
                        $('#titulo').text('Peligro');
                        }
                        if (response['notification'] == "warning") {
                        objeto = response["data"];
                        $('#mensaje').html( response.data  + "<br> error de servidor interno");
                        $('#titulo').text('Alerta');
                        }
                        // notificacion
                        All.clear();
                        id = $("#CodProducto").val();
                        // aquiiii
                        cargarProd(id);
                        All.ajax.reload();
    
                        $('div#notification-container').fadeIn(350);
                        $(".notification").addClass("notification-"+response['notification']);
        
                        $('div#notification-container').delay(3000).fadeOut(350);
                    }
                });
                
            }
        
    });


    $("#modalS").click(function(){
        $('#CodProducto').val("").trigger('change.select2');
        $("#modalSuccess").modal();
        AllProd.rows().remove().draw();
    });

    $('#All').on('click','tr.fila a.modalVer', function(){
        var IdProdDetalle = $(this).attr('name');
        VerMasProducto(IdProdDetalle);
        $("#modal-info").modal();
        // tabla.rows().remove().draw();
    });

    function VerMasProducto(IdProdDetalle){
        var idInv = $("#idInventario").val();
        VerMasTable = $('#VerMasProducto').DataTable( {
            "bLengthChange": false,
            responsive: true,
            destroy: true,

            "ajax": {
                url: url+'/home/detalle/inventario/'+idInv+'/ver/mas/'+IdProdDetalle,
                type : "get",
                success: function(result){
        
                    $(result).each(function (key, value) {
                        VerMasTable.row.add([
                            key+1,
                            value['producto'],
                            meses[value['mes']-1],
                            value['anio'],
                            parseInt(value['cant']),
                            value['sub'],
                            '<a name="'+value['id_detalle_inventario']+'" class="btn btn-warning btn-xs EditarProd" data-toggle="tooltip" title="Editar" ><i class="fa fa-pencil"></i></a>'
                        ]).draw(false);
                        $( ".odd" ).addClass("fila");
                        $( ".even" ).addClass("fila");
                    })
                }
            },
        });    
    }

    var count;
    let T;
    let PrecioUnitario;

    $('#VerMasProducto').on('click','tr.fila a.EditarProd', function(){
        var Producto = $(this).closest('tr').find('td').get(1).innerHTML;
        var mes = $(this).closest('tr').find('td').get(2).innerHTML;
        var anio = $(this).closest('tr').find('td').get(3).innerHTML;
        var cantidad = $(this).closest('tr').find('td').get(4).innerHTML;
        var total = $(this).closest('tr').find('td').get(5).innerHTML;
        var IdProd = $(this).attr('name');
        
        count = 0;
        T=0;
        PrecioUnitario=0;

        $("#Btn-G").attr('name', IdProd);
        $("#EditNombre").val(Producto);
        $("#EditMes").val(mes);
        $("#EditAnio").val(anio);
        $("#CantidadP").val(cantidad);
        $("#EditTotal").val(total);
        $("#modal-warning").modal("toggle");
    });

    // editar cantidad producto
            
    $("#CantidadNueva").on('keypress', function(){
        
        if ( event.which == 13 ) {

            let IdProd = 0;
            let total = 0;
            let Nueva = 0;
            let vieja = 0;
            let NuevoTotal;
            

            Nueva = $("#CantidadNueva").val();
            vieja = $("#CantidadP").val();
            total = $("#EditTotal").val();

            
            if(count == 0){
                T = total;
                PrecioUnitario = T/vieja;
            }
            count++;           

            NuevoTotal = PrecioUnitario * Nueva;
            
            $("#EditTotal").val(NuevoTotal);

        }        

    });

    $("#Btn-G").click(function(){
        let IdProd = 0;
        let total = 0;
        let Nueva = 0;

        IdDetalle = $(this).attr('name');
        total = $("#EditTotal").val();
        Nueva = $("#CantidadNueva").val();

        $.ajax({
            headers: { 'X-CSRF-TOKEN': token },
            url: url+"/home/detalle/inventario/editar/cantidad",
            method: "POST",
            data: { id : IdDetalle, Total : total, NuevaCant : Nueva  },
            success: function(response){
                    
                if (response['notification'] == "success") {
                    $('#mensaje').text(' Actualizado Exitosamente ');
                    $('#titulo').text('Exito');
                    }
                    if (response['notification'] == "danger") {
                    $('#mensaje').html(objeto.message + "<br>" + response.data  + "<br> No existe");
                    $('#titulo').text('Peligro');
                    }
                    if (response['notification'] == "warning") {
                    objeto = response["data"];
                    $('#mensaje').html( response.data  + "<br> error de servidor interno");
                    $('#titulo').text('Alerta');
                    }
                
                    VerMasTable.clear();
                
                    VerMasTable.ajax.reload();
                
                    $("#modal-warning").modal('hide');
                
                    $("#modal-info").modal('hide');

                    $('div#notification-container').fadeIn(350);
                    
                    $(".notification").addClass("notification-"+response['notification']);                
                    $('div#notification-container').delay(3000).fadeOut(350);
            }
        });
    
    });

});



// nomProducto id