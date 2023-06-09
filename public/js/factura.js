$(document).ready(function(){
// ---------------------------------- Seccion crear producto --------------------------------------
var route = $("#route").val();

  if(route == "home/producto/create"){   
  
  // cargamos los productos activos al datatable
  index();
  var tabla;
  var tabla2;

  function index() {
    url =  $('#CrearProducto').attr('action');
   
      tabla = $('#Productos').DataTable(
      {
        dom: 'Bfrtip',//Definimos los elementos del control de tabla
        // agregamos botones para exportar la informacion 
        buttons: [
          {
            extend: 'pdfHtml5',
            title: 'Productos',
            exportOptions: {
              columns: [ 0, 1, 2, 3 ]
            }
          }
        ],
        "ajax":
				{
					url: url+"/1",
          type : "get",
          success: function(r){
            tabla.clear();
            // agregamos los datos al datatable 
            $(r).each(function (key, value) {
              tabla.row.add([
                value['id'],
                value['nomProducto'],
                value['descripcion_producto'],
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
      
    
    
    $('#btn-Guardar').click(function (e) {
      e.preventDefault();
      Producto = $("#nomProducto").val();
      
      bootbox.confirm({
        size: 'small',
        message: "Esta seguro de Crear "+ Producto,
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
            var url = $('#CrearProducto').attr('action');
            var token = $("#token").val();
            var method = $('#CrearProducto').attr('method');
            
            $.ajax({
              url: url,
              headers: { 'X-CSRF-TOKEN': token },
              type: method,
              dataType: 'json',
              data: $("#CrearProducto").serialize(),
              success: function (response) {
                // limpia el formulario
                $('#CrearProducto').trigger("reset");

                // notificacion
                tabla.ajax.reload();
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

}


// ---------------------------------- Seccion Modificar producto --------------------------------------

if(route == "home/producto/edit"){

  indexEditProd();
    
  function indexEditProd() {
    url =  $('#EditarProducto').attr('action');
    
      tabla2 = $('#EditProductos').DataTable(
      {
        dom: 'Bfrtip',//Definimos los elementos del control de tabla
        // agregamos botones para exportar la informacion 
        buttons: [
          {
            extend: 'pdfHtml5',
            title: 'Productos',
            exportOptions: {
              columns: [ 0, 1, 2, 3 ]
            }
          }
        ],
        "ajax":
				{
					url: url,
          type : "get",
          success: function(r){
            tabla2.clear();
            // agregamos los datos al datatable 
            $(r).each(function (key, value) {
              tabla2.row.add([
                value['id'],
                value['nomProducto'],
                value['descripcion_producto'],
                estado = (value['estado'] == 1) ?"<span class='label label-success'>Activo</span>" :"<span class='label label-danger'>Inactivo</span>",
                "<div class='btn-group'><button class='btnEdit btn btn-warning btn-sm ' data-toggle='modal' data-target='#modal-warning'><i class='fa fa-pencil'></i> Editar</button> "+
                (estado = (value['estado'] == 1) ?"<button type='button' class='btn btn-danger btn-sm btn-Eliminar'><i class='fa fa-circle-o'></i> Desactivar</button></div>":"<button type='button' class='btn btn-success btn-sm btn-Activar'><i class='fa fa-dot-circle-o'></i> Activar</button></div>"),                
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
  
  $('#EditProductos').on('click','tr.fila button.btnEdit', function(){
        var idProducto = $(this).closest('tr').find('td').get(0).innerHTML;
        var nomProducto = $(this).closest('tr').find('td').get(1).innerHTML;
        var descripcion_producto = $(this).closest('tr').find('td').get(2).innerHTML;
      
        $('#idProducto').val(idProducto);
        $('#nomProducto').val(nomProducto);
        $('#descripcion_producto').val(descripcion_producto);
  });


  $('#btn-Editar').click(function(e){
  
    e.preventDefault();

    Producto = $("#nomProducto").val();

    bootbox.confirm({
      size: 'small',
      message: "Esta seguro de Modificar "+ Producto,
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
          var url = $('#EditarProducto').attr('action');
          var token = $("#token").val();
          var method = $('#EditarProducto').attr('method');

          $.ajax({
            url: url+'/'+dato,
            headers: {'X-CSRF-TOKEN': token },
            type: method,
            dataType: 'json',
            data: $("#EditarProducto").serialize(),
            success : function(response){
              tabla2.ajax.reload();
              
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
              tabla2.ajax.reload();
              $('div#notification-container').fadeIn(350);
              $(".notification").addClass("notification-"+response['notification']);
              $('#titulo').text(response['notification']);

              $('div#notification-container').delay(3000).fadeOut(350);

            }
          });
        }
      }
    });
  });

    // ---------------------------------- Seccion Desactivar producto --------------------------------------

    $('#EditProductos').on('click','tr.fila button.btn-Eliminar', function(){
      var url = $('#EditarProducto').attr('action');
      var token = $("#token").val();
      var idProducto = $(this).closest('tr').find('td').get(0).innerHTML;
      var Producto = $(this).closest('tr').find('td').get(1).innerHTML;


      bootbox.confirm({
        size: 'small',
        message: "Esta seguro de Desactivar "+ Producto,
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
              url: url+'/'+idProducto,
              headers: {'X-CSRF-TOKEN': token },
              type: "DELETE",
              success : function(response){
                if (response['notification'] == "success") {
                  $('#mensaje').text(' Se Desactivo '+ Producto +' Exitosamente ');
                }
                if (response['notification'] == "danger") {
                  objeto = response["data"];
                  $('#mensaje').html(objeto.message + "<br>" + objeto.status  + "<br> No existe");
                }
                if (response['notification'] == "warning") {
                  objeto = response["data"];
                  console.log(objeto);
                  $('#mensaje').html(objeto.message + "<br>" + objeto.status  + "<br> error de servidor interno");
                } 
               // notificacion
               tabla2.ajax.reload();
                $('div#notification-container').fadeIn(350);
                $(".notification").addClass("notification-"+response['notification']);
                $('#titulo').text(response['notification']);
                
      
                $('div#notification-container').delay(3000).fadeOut(350); 

              },
            });
          }
        }
      });
    });

        // ---------------------------------- Seccion Activar producto --------------------------------------

        $('#EditProductos').on('click','tr.fila button.btn-Activar', function(){
          var url = $('#EditarProducto').attr('action');
          var token = $("#token").val();
          var idProducto = $(this).closest('tr').find('td').get(0).innerHTML;
          var Producto = $(this).closest('tr').find('td').get(1).innerHTML;
    
    
          bootbox.confirm({
            size: 'small',
            message: "Esta seguro de Activar "+ Producto,
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
                  url: url + '/' + idProducto + "/active",
                  headers: {'X-CSRF-TOKEN': token },
                  type: "GET",
                  success : function(response){
                    if (response['notification'] == "success") {
                      $('#mensaje').text(' Se Activo '+ Producto +' Exitosamente ');
                    }
                    if (response['notification'] == "danger") {
                      objeto = response["data"];
                      $('#mensaje').html(objeto.message + "<br>" + objeto.status  + "<br> No existe");
                    }
                    if (response['notification'] == "warning") {
                      objeto = response["data"];
          
                      $('#mensaje').html(objeto.message + "<br>" + objeto.status  + "<br> error de servidor interno");
                    } 
                   // notificacion
          
                    $('div#notification-container').fadeIn(350);
                    $(".notification").addClass("notification-"+response['notification']);
                    $('#titulo').text(response['notification']);
                    tabla2.ajax.reload();          
                    $('div#notification-container').delay(3000).fadeOut(350); 
    
                  },
                });
              }
            }
          });
        });
}


});