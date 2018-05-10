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
        idInv = result[0].idInventario;
        mesInvent = NumInventario[result[0].mes - 1];
        $("#idInventario").val(result[0].idInventario);
        $("#empresa").val(result[0].empresa);
        $("#anio").val(result[0].anio);
        $("#mes").append("<option value='"+NumInventario[result[0].mes - 1]+"'>"+meses[result[0].mes - 1]+"</option>");
        
        AllInv();
    });

    $.get(url+'/home/producto', headers = { 'X-CSRF-TOKEN': token }, function (result) {
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
            
            $(result).each(function (key, value) {
            
                AllProd.row.add([
                    key+1,
                    value.producto['nomProducto'],
                    '<input type="text" class="form-control input-sm precio" value="'+value['precio_unidad']+'" readonly>',
                    parseInt(value['cantidad_unidades']),
                    '<input type="number" class="form-control input-sm OnliNumber cantidad" max="'+parseInt(value['cantidad_unidades'])+'" value="" onkeypress="return event.charCode >= 48" min="0">',
                    '<input type="text" class="form-control input-sm total" readonly>',
                    '<a name="'+value['idProducto']+'" class="btn btn-primary btn-xs Agregar" data-toggle="tooltip" title="Agregar Producto" style="display:none"><i class="fa fa-plus"></i></a>'
                ]).draw(false);
                $( ".odd" ).addClass("fila");
                $( ".even" ).addClass("fila");
            });
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
                            value['cant'],
                            value['sub'],
                            '<a name="'+value['idPro']+'" class="btn btn-primary btn-xs modalVer" data-toggle="tooltip" title="Ver mas" ><i class="fa fa-search"></i></a>'
                        ]).draw(false);
                        $( ".odd" ).addClass("fila");
                        $( ".even" ).addClass("fila");
                    })
                }
            },
        });    
    }

    $('#AllProd').on('blur','tr.fila input.cantidad', function(){
        
        
        var valor = $(this).val();
        var codigo = $(this).parents("tr").find(".precio").val();

        var exist = $(this).closest('tr').find("td").get(3).innerHTML;
        var existencia = parseInt(exist);
        if(valor != ""){
            if(valor <= existencia){
                var total = valor*codigo;
                $(this).parents("tr").find(".total").val(total);
                $(this).parents("tr").find(".Agregar").show();
            }else{
                $(this).parents("tr").find(".Agregar").hide();
                var dialog = bootbox.dialog({
                    message: '<p class="text-center">La cantidad exede el numero de existencia</p>',
                    closeButton: false
                });
                $(this).val("");
                // do something in the background
                $(this).parents("tr").find(".total").val("");
                setTimeout(function(){ dialog.modal('hide'); }, 3000);
            }
            
        }else{
            var dialog = bootbox.dialog({
                message: '<p class="text-center">El campo no puede ir vacio</p>',
                closeButton: false
            });
            
            // do something in the background
            $(this).parents("tr").find(".total").val("");
            setTimeout(function(){ dialog.modal('hide'); }, 3000);
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
                        if (response['notification'] == "success") {
                        $('#mensaje').text(' Se Creo Inventario No. '+ response['data']+' Exitosamente ');
                        }
                        if (response['notification'] == "danger") {
                        $('#mensaje').html(objeto.message + "<br>" + response.data  + "<br> No existe");
                        }
                        if (response['notification'] == "warning") {
                        objeto = response["data"];
                        $('#mensaje').html( response.data  + "<br> error de servidor interno");
                        }
                        $('#modal-warning').modal('toggle');
                        // notificacion
                        All.clear();
                        id = $("#CodProducto").val();
                        cargarProd(id);
                        All.ajax.reload();
    
                        $('div#notification-container').fadeIn(350);
                        $(".notification").addClass("notification-"+response['notification']);
                        $('#titulo').text(response['notification']);
        
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
                            value['cant'],
                            value['sub'],
                        ]).draw(false);
                        $( ".odd" ).addClass("fila");
                        $( ".even" ).addClass("fila");
                    })
                }
            },
        });    
    }

});

// nomProducto id