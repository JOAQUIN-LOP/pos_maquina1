$('document').ready(function(){
   
    $('#All').DataTable( {
        responsive: true
        
    } );
    
    let meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
    let NumInventario = [1,2,3,4,5,6,7,8,9,10,11,12];
    
    var fecha = new Date();
    var mes = fecha.getMonth();
    var anio = fecha.getFullYear();

    var ann = anio - 5;

    for(i=ann;i<anio+5;i++){
       $("#SelectAnio").append("<option>"+(ann++)+"</option>");
    }

    $("#idInventario").val(NumInventario[mes]);

    index(anio);

    $('#mes').append( "<option value='"+NumInventario[mes]+"'>"+meses[mes]+"</option>" );
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
        destroy: true,
        responsive: true,
        "ajax":
				{
                url: url+'/all/'+anio,
                type : "get",
                success: function(r){
                    $(r).each(function (key, value) {
                        tabla.row.add([
                            value['num_inventario'],
                            value['idEmpresa'],
                            value['mes'],
                            value['anio'],
                            value['total_cantidad_productos'],
                            value['total_cantidad_inventario'],
                            estado = (value['estado'] == 1) ?"<span class='label label-success'>Activo</span>" :"<span class='label label-danger'>Inactivo</span>",
                            "<div class='btn-group'><a class='btn btn-danger btn-xs' name='"+value['num_inventario']+"'>Finalizar Inventario</a></div>"
                        ]).draw(false);
                        $( ".odd" ).addClass("fila");
                        $( ".even" ).addClass("fila");
                        })
                    },
					error: function(e){
						console.log(e.responseText);	
					}
				},
      });
  }
   

    $("CrearInventario").submit(function(e){

        e.preventDefault();
        var url = $('#CrearInventario').attr('action');
        console.log("funciona");
        // $.get(url)

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
              
              if (response['notification'] == "success") {
                $('#mensaje').text(' Se Modifico '+ response['producto']+' Exitosamente ');
              }
              if (response['notification'] == "danger") {
                objeto = response["data"];
                $('#mensaje').html(objeto.message + "<br>" + objeto.status  + "<br> No existe");
              }
              if (response['notification'] == "warning") {
                objeto = response["data"];
                $('#mensaje').html(objeto.message + "<br>" + objeto.status  + "<br> error de servidor interno");
              }
              $('#modal-warning').modal('toggle');
              // notificacion
              tabla.ajax.reload();
              $('div#notification-container').fadeIn(350);
              $(".notification").addClass("notification-"+response['notification']);
              $('#titulo').text(response['notification']);

              $('div#notification-container').delay(3000).fadeOut(350);
        })
    }
})