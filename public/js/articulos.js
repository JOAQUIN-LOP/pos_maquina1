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
        responsive:true,
        dom: 'Bfrtip',//Definimos los elementos del control de tabla
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
					url: url+"/1",
          type : "get",
          success: function(r){
            tabla.clear();
            // agregamos los datos al datatable 
            $(r).each(function (key, value) {
              
              tabla.row.add([
                key+1,
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
      let resp = validacion();
      if(resp == true){
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
                    $('#titulo').text('Exito');
                  }
                  if (response['notification'] == "warning") {
                    objeto = response["data"];
                    $('#mensaje').html(objeto.message + "<br>" + objeto.status  + "<br> Los Campos no pueden ir vacios");
                    $('#titulo').text('Alerta');
                  }
                  if (response['notification'] == "danger") {
                    objeto = response["data"];
                    $('#mensaje').html(objeto.message + "<br>" + objeto.status  + "<br> error de servidor interno");
                    $('#titulo').text('Peligro');
                  }
                  
                  $('div#notification-container').fadeIn(350);
                  $(".notification").addClass("notification-"+response['notification']);
                  
                  
                  // oculta notificacion

                  $('div#notification-container').delay(3000).fadeOut(350);    
                
                }
              });
            }
          }
        });
      }
    });

}

function validacion(){

  //validaciones 
  $(".icon-danger").fadeOut().remove();
  
      if ($("#nomProducto").val() == "") {  
          $("label[for='nomProducto']").focus().before('<span class="control-label icon-danger"> <span>&nbsp;');  
          $(".nomProducto").addClass("has-error");
              
          return false;  
      }

          return true;
  }

   //elimina el icono rojo de validacion 
   $("#nomProducto").bind('blur keyup change', function(){  
    if ($(this).val() != "") { 
    $(".form-group").removeClass("has-error");
    $(".icon-danger").fadeOut().remove();
        return false;  
    }  
});	     

// ---------------------------------- Seccion Modificar producto --------------------------------------

if(route == "home/producto/edit"){

  indexEditProd();
    
  function indexEditProd() {
    url =  $('#EditarProducto').attr('action');
    
      tabla2 = $('#EditProductos').DataTable(
      {
        responsive:true,
        dom: 'Bfrtip',//Definimos los elementos del control de tabla
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
					url: url,
          type : "get",
          success: function(r){
            tabla2.clear();
            // agregamos los datos al datatable 
            $(r).each(function (key, value) {
                tabla2.row.add([
                key+1,
                value['nomProducto'],
                value['descripcion_producto'],
                estado = (value['estado'] == 1) ?"<span class='label label-success'>Activo</span>" :"<span class='label label-danger'>Inactivo</span>",
                "<div class='btn-group'><button class='btnEdit btn btn-warning btn-sm BtnEditar' data-toggle='modal' data-target='#modal-warning' value='"+value["id"]+"'><i class='fa fa-pencil'></i> Editar</button> "+
                (estado = (value['estado'] == 1) ?"<button type='button' class='btn btn-danger btn-sm btn-Eliminar' value='"+value["id"]+"'><i class='fa fa-circle-o'></i> Desactivar</button></div>":"<button type='button' class='btn btn-success btn-sm btn-Activar' value='"+value["id"]+"'><i class='fa fa-dot-circle-o'></i> Activar</button></div>"),                
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
  
  $('#EditProductos').on('click','button.btnEdit', function(){
        var idProducto = $(this).attr("value");
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
              tabla2.ajax.reload();
              $('div#notification-container').fadeIn(350);
              $(".notification").addClass("notification-"+response['notification']);

              $('div#notification-container').delay(3000).fadeOut(350);

            }
          });
        }
      }
    });
  });

    // ---------------------------------- Seccion Desactivar producto --------------------------------------

    $('#EditProductos').on('click','button.btn-Eliminar', function(){
      var url = $('#EditarProducto').attr('action');
      var token = $("#token").val();
      var idProducto = $(this).attr('value');
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
               // notificacion
               tabla2.ajax.reload();
                $('div#notification-container').fadeIn(350);
                $(".notification").addClass("notification-"+response['notification']);              
      
                $('div#notification-container').delay(3000).fadeOut(350); 

              },
            });
          }
        }
      });
    });

        // ---------------------------------- Seccion Activar producto --------------------------------------

        $('#EditProductos').on('click','button.btn-Activar', function(){
          var url = $('#EditarProducto').attr('action');
          var token = $("#token").val();
          var idProducto = $(this).attr("value");
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
                   // notificacion
          
                    $('div#notification-container').fadeIn(350);
                    $(".notification").addClass("notification-"+response['notification']);
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