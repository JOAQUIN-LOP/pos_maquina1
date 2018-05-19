$(document).ready(function () {

  // validacion de input
  $('.OnlyNumbreFloat').on('input', function () {
      this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');
  });
  $('.OnlyNumber').on('input', function () { 
    this.value = this.value.replace(/[^0-9]/g,'');
  });
  $('.OnlyChart').on('input', function () { 
    this.value = this.value.replace(/[^a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ!/^\s/]/g,'');
  });
  var mesInventario;
  var anioInventario;
  let meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
  let NumInventario = [1,2,3,4,5,6,7,8,9,10,11,12];
  
  var UrlInv = $('#UrlInv').val();
    $.get(UrlInv+'/home/detalle/inventario/ver/activo', function (result) {
      mesInventario = NumInventario[result[0].mes - 1];
      anioInventario = result[0].anio;
      $("#mesDetalle").append("<option value='"+NumInventario[result[0].mes - 1]+"'>"+meses[result[0].mes - 1]+"</option>");
      $("#AnioDetalle").append(" <option value='"+result[0].anio +"' selected>"+ result[0].anio +"</option>");
    }); 

  // cargamos los productos activos al datatable
  index();
  var tabla;
  var tabla2;
  function index() {
    url = $('#pathProd').val();
    
      tabla = $('#TablaDetalle').DataTable(
      {
        dom: 'Bfrtip',//Definimos los elementos del control de tabla
        // agregamos botones para exportar la informacion 
        buttons: [ // agregamos botones para exportar la informacion 
          {
            text: 'PDF',
            action: function ( e, dt, button, config ) {
                var data = dt.buttons.exportData();

                var rows = [];

                var columns = [ data.header[0], data.header[1], data.header[2] ];


                $.each(data.body, function(i, item) {
                  rows[i] = [ data.body[i][0], data.body[i][1], data.body[i][2] ];
                });

               
                // Only pt supported (not mm or in)
                var doc = new jsPDF('p', 'pt', 'letter');
                doc.text(210, 50, 'Listado de Productos');
                doc.autoTable(columns, rows, {margin: {top: 60}});
                doc.save('table.pdf')
            }
          },
        ],
        "ajax":
				{
					url: url + "/1",
          type : "get",
          success: function(r){
            // agregamos los datos al datatable 
            $(r).each(function (key, value) {
              tabla.row.add([
                value['id'],
                value['nomProducto'],
                value['descripcion_producto'],
                estado = (value['estado'] == 1) ? "<span class='label label-success'>Activo</span>" : "<span class='label label-danger'>Inactivo</span>",
                "<button type='button' class='btn btn-info btn-sm' data-toggle='modal' data-target='#modal-info'>Agregar Precio</button>"
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

// carga los productos con precio 
  function ProductosPrecio(id) {
    url =  $('#pathDetalleProd').val();   
      tabla2 = $('#detallePrecioProducto').DataTable(
      {
        "ajax":
				{
					url: url + "/" + id + "/" + anioInventario+ "/" + mesInventario,
          type : "get",
          success: function(r){
            // agregamos los datos al datatable
            if(r[0] == null){
              $("#detallePrecioProducto tbody tr td.dataTables_empty").text('No se encontraron resultados');
            }else{
              tabla2.clear();
              $(r).each(function (key, value) {
                tabla2.row.add([
                  value.producto['nomProducto'],
                  parseInt(value['cantidad_unidades']),
                  value['precio_unidad'],
                  value['precio_total_compras'],
                  meses[value['mes']-1],
                  value['anio'],
                  estado = (value['estado'] == 1) ? "<span class='label label-success'>Activo</span>" : "<span class='label label-danger'>Inactivo</span>",
                  "<button type='button' name='"+value['id_detalle_producto']+"' class='btn btn-danger btn-sm EliminarProd' title='Eliminar'><i class='fa fa-trash'></i></button>"
                ]).draw(false);
                $( ".odd" ).addClass("fila");
                $( ".even" ).addClass("fila");
              })
            }
            
      
            
          },
					error: function(e){
						console.log(e.responseText);	
					}
				},
      });
  }
  
// al precionar el boton agregar precio abre un modal  
  $('#TablaDetalle').on('click','tr.fila button.btn-sm', function(){
    var idProducto = $(this).closest('tr').find('td').get(0).innerHTML;
    var nomProducto = $(this).closest('tr').find('td').get(1).innerHTML;
    var descripcion_producto = $(this).closest('tr').find('td').get(2).innerHTML;
  
    $("#IdProducto").val(idProducto);
    $("#nomProducto").val(nomProducto);
    //limpiamos el datatable
    $('#detallePrecioProducto').DataTable().destroy();
    ProductosPrecio(idProducto);
   
});

    //  Calcular precio unitario

     $('#calcular').on('click', function(){
           var cantidad = $("#cantidad_unidades").val();
           var precio =  $("#precio_total_compras").val();

           if(precio > 0){
            Total = (precio / cantidad);
           $('#precio_unidad').val(Total);
           }
           
    })   
    
    //guardar precio producto
    $('#GuardarPrecio').click(function (e) {
      e.preventDefault();
      Producto = $("#nomProducto").val();
      
      bootbox.confirm({
        size: 'small',
        message: "Esta seguro de crear el producto "+ Producto+"",
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

            var dato = $("#idProducto").val();
            var url = $('#FormPrecioProd').attr('action');
            var token = $("#token").val();
            var method = $('#FormPrecioProd').attr('method');
            
            $.ajax({
              url: url,
              headers: { 'X-CSRF-TOKEN': token },
              type: method,
              dataType: 'json',
              data: $("#FormPrecioProd").serialize(),
              success: function (response) {
                tabla2.ajax.reload();
                // limpia el formulario
                $('#cantidad_unidades').val("");
                $('#precio_total_compras').val("");
                $('#precio_total_compras').val("");

                // notificacion
                

                if (response['notification'] == "success") {
                  $('#mensaje').text(' Se Creo '+ response['producto']+' Exitosamente ');
                }
                if (response['notification'] == "warning") {
                  objeto = response["data"];
                  $('#mensaje').html(objeto.message + "<br>" + objeto.status  + "<br> Los Campos no pueden ir vacios");
                }
                if (response['notification'] == "danger") {
                  objeto = response["data"];
                  $('#mensaje').html(objeto.message + "<br>" + objeto.status  + "<br> error de servidor interno");
                }
                
                $('div#notification-container').fadeIn(350);
                $(".notification").addClass("notification-"+response['notification']);
                $('#titulo').text(response['notification']);
                

                // oculta notificacion

                $('div#notification-container').delay(3000).fadeOut(350);    
              
              }
            });
          }
        }
      });
    });

    $('#detallePrecioProducto').on('click', 'tr button.EliminarProd', function(){
      let cod = $(this).attr('name');
        bootbox.confirm({
        size: 'small',
        message: "Esta seguro de eliminar el registro",
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
            $.ajax({
              url: url+"/delete/"+cod,
              headers: { 'X-CSRF-TOKEN': token },
              type: 'GET',
              success: function (response) {
                tabla2.ajax.reload();
                // limpia el formulario
                $('#cantidad_unidades').val("");
                $('#precio_total_compras').val("");
                $('#precio_total_compras').val("");
      
                // notificacion
                
      
                if (response['notification'] == "success") {
                  $('#mensaje').text(' Se Elimino Exitosamente ');
                }
                if (response['notification'] == "warning") {
                  objeto = response["data"];
                  $('#mensaje').html(objeto.message + "<br>" + objeto.status  + "<br> Los Campos no pueden ir vacios");
                }
                if (response['notification'] == "danger") {
                  objeto = response["data"];
                  $('#mensaje').html(objeto.message + "<br>" + objeto.status  + "<br> error de servidor interno");
                }
                
                $('div#notification-container').fadeIn(350);
                $(".notification").addClass("notification-"+response['notification']);
                $('#titulo').text(response['notification']);
                
      
                // oculta notificacion
      
                $('div#notification-container').delay(3000).fadeOut(350);    
              
              }
            });
          }
        }
      });
    });

    // listado de productos   

     // cargamos los productos activos al datatable
  index2();
  var TablaList;
  function index2() {
    url = $('#pathProd').val();
    
    TablaList = $('#TablaList').DataTable(
      {
        destroy:true,
        dom: 'Bfrtip',//Definimos los elementos del control de tabla
        // agregamos botones para exportar la informacion 
        buttons: [ // agregamos botones para exportar la informacion 
          {
            text: 'PDF',
            action: function ( e, dt, button, config ) {
                var data = dt.buttons.exportData();

                var rows = [];

                var columns = [ data.header[0], data.header[1], data.header[2], data.header[3], data.header[4] ];


                $.each(data.body, function(i, item) {
                  rows[i] = [ data.body[i][0], data.body[i][1], data.body[i][2], data.body[i][3], data.body[i][4] ];
                });

               
                // Only pt supported (not mm or in)
                var doc = new jsPDF('p', 'pt', 'letter');
                doc.text(210, 50, 'Listado de Productos');
                doc.autoTable(columns, rows, {margin: {top: 60}});
                doc.save('table.pdf')
            }
          },
        ],
        "ajax":
				{
					url: url + "/list/1",
          type : "get",
          success: function(r){
            TablaList.clear();
            // agregamos los datos al datatable 
            $(r).each(function (key, value) {
              TablaList.row.add([
                key+1,
                parseInt(value['cantidad_unidades']),
                value['nomProducto'],
                value['precio_total_compras'],
                value['descripcion_producto'],
                estado = (value['estado'] == 1) ? "<span class='label label-success'>Activo</span>" : "<span class='label label-danger'>Inactivo</span>"
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


// fin document ready
});

