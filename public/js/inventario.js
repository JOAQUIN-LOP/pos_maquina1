$('document').ready(function(){
   
    $('#All').DataTable( {
        responsive: true
        
    } );
    
    let meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
    
    var fecha = new Date();
    var mes = fecha.getMonth();
    var anio = fecha.getFullYear();

    var ann = anio - 5;

    for(i=ann;i<anio+5;i++){
       $("#SelectAnio").append("<option>"+(ann++)+"</option>");
    }

    index(anio);

    $('#mes').val(meses[mes]);
    $('#anio').val(anio);
    
    var token = $("#token").val();
    var urlEmp = $('#ruta-Emp').val();
    

    $.get(urlEmp, headers = { 'X-CSRF-TOKEN': token }, function (result) {
        $.each(result, function(j, tem) {
            $('#Empresa').append( "<option value='"+result[0].idEmpresa+"'>"+result[0].nom_empresa+"</option>" );
        });
    });

    var rutaInv = $('#rutaInv').val();

    $.get(rutaInv +'/'+anio,  headers = { 'X-CSRF-TOKEN': token }, function (data) {
       
        $('#idInventario').val(data[0].cantidad);

    });


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
        "ajax":
				{
                url: url+'/all/'+anio,
                type : "get",
                success: function(r){
                    console.log(r);
                    $(r).each(function (key, value) {
                        tabla.row.add([
                            value['num_inventario'],
                            value['idEmpresa'],
                            value['mes'],
                            value['anio'],
                            value['total_cantidad_productos'],
                            value['total_cantidad_inventario'],
                            estado = (value['estado'] == 1) ?"<span class='label label-success'>Activo</span>" :"<span class='label label-danger'>Inactivo</span>",
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
   
   

   
})