$('document').ready(function(){
   
    
    var TablaAll = $('#TablaAll').DataTable( {
        "bLengthChange": false,
        responsive: true
        
    } );


    var AllDetalle = $("#AllDetalle").DataTable({
        "bLengthChange": false,
        "searching": false,
        responsive: true

    });

    var meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
    let NumInventario = [1,2,3,4,5,6,7,8,9,10,11,12];
    
    var fecha = new Date();
    var mes = fecha.getMonth();
    var anio = fecha.getFullYear();

    var ann = anio - 5;

    for(i=ann;i<anio+5;i++){
       $("#SelectAnio").append("<option>"+(ann++)+"</option>");
    }

    $('#SelectAnio').val(anio).trigger('change.select2');

    routePage = $('#route').val();


    if(routePage == 'home/inventario/create'){
        index(anio);
    }
    

    $('#mes').append( "<option value='"+NumInventario[mes]+"'>"+meses[mes]+"</option>" );
    $('#idInventario').val(NumInventario[mes]);
    $('#anio').val(anio);
    var token = $("#token").val();
    var urlEmp = $('#ruta-Emp').val();
    

    $.get(urlEmp, headers = { 'X-CSRF-TOKEN': token }, function (result) {        
        $.each(result, function(j, tem) {
            $('#Empresa').append( "<option value='"+result[0].idEmpresa+"' selected>"+result[0].nom_empresa+"</option>" );
        });
    });

    var rutaInv = $('#rutaInv').val();


    $("#SelectAnio").change(function(){
        anioo = $("#SelectAnio").val();
        index(anioo);
    })

    // cargamos los productos activos al datatable
  var tabla;
  function index(anio) {
    var url = $('#CrearInventario').attr('action');
    
      tabla = $('#All').DataTable(
      {
        "bLengthChange": false,
        destroy: true,
        responsive: true,
        "ajax":
				{
                url: url+'/all/'+anio,
                type : "get",
                success: function(r){
                    $(r).each(function (key, value) {
                            if(value['estado']==1){
                                $("#idInventario").val(value['num_inventario']);
                            }
                            
                        tabla.row.add([
                            key+1,
                            value.empresa['nom_empresa'],
                            meses[value['mes']-1],
                            value['anio'],
                            parseInt(value['total_cantidad_productos']),
                            parseFloat(value['total_cantidad_inventario']).toFixed(2),
                            estado = (value['estado'] == 1) ?"<span class='label label-success'>Activo</span>" :"<span class='label label-danger'>Inactivo</span>",
                            estado2 = (value['estado'] == 1) ? "<div class='btn-group'><a class='btn btn-danger btn-xs'data-toggle='tooltip' data-placement='top' title='Finalizar Inventario!' name='"+value['num_inventario']+"'><i class='fa fa-times-circle'></i></a></div>":"" 
                        ]).draw(false);
                        $( ".odd" ).addClass("fila");
                        $( ".even" ).addClass("fila");
                        });
                    },
					error: function(e){
						console.log(e.responseText);	
					}
				},
      });
  }
   

    $("#CrearInventario").submit(function(e){

        e.preventDefault();
        var url = $('#CrearInventario').attr('action');

        $.ajax({
            url: url,
            headers: { 'X-CSRF-TOKEN': token },
            type: 'POST',
            dataType: 'json',
            data: $("#CrearInventario").serialize(),
            success: function (response) {
            
                tabla.clear();
              if (response['notification'] == "success") {
                $('#mensaje').text(' Se Creo Inventario No. '+ response['data']+' Exitosamente ');
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
              $('#modal-warning').modal('toggle');
              // notificacion
              tabla.ajax.reload();
              $('div#notification-container').fadeIn(350);
              $(".notification").addClass("notification-"+response['notification']);
              $('div#notification-container').delay(3000).fadeOut(350);
              
            }
        });
    });
    
    
    $('#All').on('click','tr.fila a', function(){
        var iD = $(this).attr('name');
        FinalizarInventario(iD);
    });

    $('#All').on('click','tr.child a', function(){
        var iD = $(this).attr('name');
        FinalizarInventario(iD);
    });

    

    function FinalizarInventario(id){
        var token = $("#token").val();
        var url = $('#CrearInventario').attr('action');

        $.get(url+'/finalizar/'+id, headers = { 'X-CSRF-TOKEN': token }, function(response){ 

                tabla.clear();
              
              if (response['notification'] == "success") {
                $('#mensaje').text(' Se Modifico '+ response['producto']+' Exitosamente ');
                $('#titulo').text('Exito');
              }
              if (response['notification'] == "danger") {
                objeto = response["data"];
                $('#mensaje').html(objeto.message + "<br>" + objeto.status  + "<br> No existe");
                $('#titulo').text('Peligro');
              }
              if (response['notification'] == "warning") {
                objeto = response["data"];
                $('#mensaje').html(objeto.message + "<br>" + objeto.status  + "<br> error de servidor interno");
                $('#titulo').text('Alerta');
              }
              $('#modal-warning').modal('toggle');
              // notificacion
              tabla.ajax.reload();
              $('div#notification-container').fadeIn(350);
              $(".notification").addClass("notification-"+response['notification']);
    
              $('div#notification-container').delay(3000).fadeOut(350);
        })
    }

    // ver inventario lista de inventario

    if(routePage == 'home/ver/inventario'){
        // AllInventario
        var url = $('#CrearInventario').attr('action');
        $.get(url, headers = { 'X-CSRF-TOKEN': token }, function (result) {

                if(result.length >= 1){
                    $(result).each(function (key, value) {
                        TablaAll.row.add([
                            value['idInventario'],
                            value.empresa['nom_empresa'],
                            meses[value['mes']-1],
                            value['anio'],
                            parseInt(value['total_cantidad_productos']),
                            parseFloat(value['total_cantidad_inventario']).toFixed(2),
                            estado = (value['estado'] == 1) ?"<span class='label label-success'>Activo</span>" :"<span class='label label-danger'>Inactivo</span>",
                            "<div class='btn-group'>"+
                            "<a class='btn btn-primary btn-xs VerInventario' data-toggle='tooltip' data-placement='top' title='Ver Inventario!' name='"+value['idInventario']+"'><i class='fa fa-search'></i></a>"+ 
                            "<a class='btn btn-danger btn-xs DescargarPDF' data-toggle='tooltip' data-placement='top' title='Descar Inventario!' name='"+value['idInventario']+"'><i class='fa fa-file-pdf-o'></i></a>"+ 
                            "<a class='btn btn-info btn-xs ImprimirPDF' name='"+value['idInventario']+"' data-toggle='tooltip' title='Imprimir Inventario!' ><i class='fa fa-print' ></i></a>"+
                            "</div>"
                        ]).draw(false);
                
                    });
                }else{
                    $(".dataTables_empty").text("No se encontraron resultados");
                }
        });

    }

    

    $('#TablaAll').on('click', '.DescargarPDF', function(){
        let id = $(this).attr("name");

        bootbox.confirm({
            size: 'small',
            message: "Desea Descargar el Documento",
            buttons: {
                confirm: {
                    label: 'Aceptar',
                    className: 'btn-success'
                },
                cancel: {
                    label: 'Cancelar',
                    className: 'btn-danger'
                }
            },
            callback: function (result) {
            
              if(result == true){
              
                $.get(url+"/PDF/"+id, headers = { 'X-CSRF-TOKEN': token }, function (result) {
            
                    let rows = [];
        
                    let columns = ['Producto','Mes','Año','Cantidad','Subtotal'];
        
                    $.each(result[1], function(i, item) {
                    rows[i] = [item.producto, meses[item.mes-1], item.anio, parseInt(item.cant), item.sub];
                    });
                           
                    // fecha actual
                    var hoy = new Date();
                    dia = hoy.getDate(); 
                    mes = hoy.getMonth()+1;
                    anio= hoy.getFullYear();
                    fecha_actual = String(dia+"/"+mes+"/"+anio);
                    let F = result[0][0].fecha;
                    let FC = F.split("-");
        
                    let Fcreacion = String(FC[2]+"/"+FC[1]+"/"+FC[0]);
                
                    var doc = new jsPDF('p', 'pt', 'letter');
                    // nombre de la empresa
                    doc.setFontSize(14);
                    doc.setFont("arial", "bold");
                    doc.text(250, 40, ''+result[0][0].empresa['nom_empresa']+'');
                    doc.setFontSize(11);
        
                    // Direccion    
                    doc.setFont("arial", "bold");
                    doc.text(40, 65, 'Direccion: ');
                    doc.setFont("arial", "normal");
                    doc.text(140, 65, ''+result[0][0].empresa['direccion']+'');
        
                    // numero de inventario
                    doc.setFont("arial", "bold");
                    doc.text(40, 80, 'Inventario No. ');
                    doc.setFont("arial", "normal");
                    doc.text(140, 80, ''+result[0][0].num_inventario+'');
        
                    //Fecha
                    doc.setFont("arial", "bold");
                    doc.text(40, 95, 'Fecha Creación: ');
                    doc.setFont("arial", "normal");
                    doc.text(140, 95, ''+Fcreacion+'');
                   
                    //Fecha
                    doc.setFont("arial", "bold");
                    doc.text(300, 95, 'Fecha Emisión: ');
                    doc.setFont("arial", "normal");
                    doc.text(390, 95, ''+fecha_actual+'');
        
                     //cantidad producto
                     doc.setFont("arial", "bold");
                     doc.text(40, 110, 'Cant. Productos: ');
                     doc.setFont("arial", "normal");
                     doc.text(140, 110, ''+parseInt(result[0][0].total_cantidad_productos)+'');
         
                     //Total inventario Q.
                     doc.setFont("arial", "bold");
                     doc.text(300, 110, 'Total:  Q.');
                     doc.setFont("arial", "normal");
                     doc.text(350, 110, ''+result[0][0].total_cantidad_inventario+'');
        
                    // Agregamos los datos a la tabla
                    doc.autoTable(columns, rows, {margin: {top: 120}});
                    doc.save('Inventario.pdf')
                });

                }
            }
        });
    });


    
    $('#TablaAll').on('click', '.ImprimirPDF', function(){
        let id = $(this).attr("name");

        bootbox.confirm({
            size: 'small',
            message: "Desea Imprimir el Documento",
            buttons: {
                confirm: {
                    label: 'Aceptar',
                    className: 'btn-success'
                },
                cancel: {
                    label: 'Cancelar',
                    className: 'btn-danger'
                }
            },
            callback: function (result) {
            
              if(result == true){
                $.get(url+"/PDF/"+id, headers = { 'X-CSRF-TOKEN': token }, function (result) {
            
                    let rows = [];
        
                    let columns = ['Producto','Mes','Año','Cantidad','Subtotal'];
        
                    $.each(result[1], function(i, item) {
                    rows[i] = [item.producto, meses[item.mes-1], item.anio, parseInt(item.cant), item.sub];
                    });
                           
                    // fecha actual
                    var hoy = new Date();
                    dia = hoy.getDate(); 
                    mes = hoy.getMonth()+1;
                    anio= hoy.getFullYear();
                    fecha_actual = String(dia+"/"+mes+"/"+anio);
                    let F = result[0][0].fecha;
                    let FC = F.split("-");
        
                    let Fcreacion = String(FC[2]+"/"+FC[1]+"/"+FC[0]);
                
                    var doc = new jsPDF('p', 'pt', 'letter');
                    // nombre de la empresa
                    doc.setFontSize(14);
                    doc.setFont("arial", "bold");
                    doc.text(250, 40, ''+result[0][0].empresa['nom_empresa']+'');
                    doc.setFontSize(11);
        
                    // Direccion    
                    doc.setFont("arial", "bold");
                    doc.text(40, 65, 'Direccion: ');
                    doc.setFont("arial", "normal");
                    doc.text(140, 65, ''+result[0][0].empresa['direccion']+'');
        
                    // numero de inventario
                    doc.setFont("arial", "bold");
                    doc.text(40, 80, 'Inventario No. ');
                    doc.setFont("arial", "normal");
                    doc.text(140, 80, ''+result[0][0].num_inventario+'');
        
                    //Fecha
                    doc.setFont("arial", "bold");
                    doc.text(40, 95, 'Fecha Creación: ');
                    doc.setFont("arial", "normal");
                    doc.text(140, 95, ''+Fcreacion+'');
                   
                    //Fecha
                    doc.setFont("arial", "bold");
                    doc.text(300, 95, 'Fecha Emisión: ');
                    doc.setFont("arial", "normal");
                    doc.text(390, 95, ''+fecha_actual+'');
        
                    //cantidad producto
                    doc.setFont("arial", "bold");
                    doc.text(40, 110, 'Cant. Productos: ');
                    doc.setFont("arial", "normal");
                    doc.text(140, 110, ''+parseInt(result[0][0].total_cantidad_productos)+'');
        
                    //Total inventario Q.
                    doc.setFont("arial", "bold");
                    doc.text(300, 110, 'Total:  Q.');
                    doc.setFont("arial", "normal");
                    doc.text(350, 110, ''+result[0][0].total_cantidad_inventario+'');
        
                    doc.autoTable(columns, rows, {margin: {top: 120}});
                    doc.autoPrint();
                    doc.save('Inventario.pdf')
                });

              }
            }
        });        
    });
    
    
    $('#TablaAll').on('click', '.VerInventario', function(){
        let id = $(this).attr("name");
        $("#modal-primary").modal("toggle");
        $.get(url+"/PDF/"+id, headers = { 'X-CSRF-TOKEN': token }, function (result) {

            

            // encabezado
            $("#EditNombre").val(result[0][0].empresa.nom_empresa);
            $("#EditAnio").val(result[0][0].anio);
            $("#CantidadNueva").val(parseInt(result[0][0].total_cantidad_productos));
            $("#EditTotal").val(result[0][0].total_cantidad_inventario);
            $("#EditMes").val(meses[result[0][0].mes - 1]);
            AllDetalle.clear();
            AllDetalle.rows().remove().draw();

            if(result[1].length >= 1){
            // detalle
            $(result[1]).each(function (key, value) {
                
                AllDetalle.row.add([
                    key+1,
                    value['producto'],
                    meses[value['mes']-1],
                    value['anio'],
                    parseInt(value['cant']),
                    value['sub']
                ]).draw(false);
            });
        }else{
            $(".dataTables_empty").text("No se encontraron resultados");
        }
            
            
        });
        
    });
});