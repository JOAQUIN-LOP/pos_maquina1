$(document).ready(function(){
// ---------------------------------- Seccion crear producto --------------------------------------

indexCreateProd();
var table = $('#Productos').DataTable();
 
function indexCreateProd(){
    url =  $('#CrearProducto').attr('action');
    $.get(url, function(res){
      $(res).each(function(key, value){
        $('table#Productos').dataTable().fnAddData( [
          value['id'],
          value['nomProducto'],
          value['descripcion_producto'],
          estado = (value['estado'] == 1) ?"<span class='label label-success'>Activo</span>" :"<span class='label label-danger'>Inactivo</span>",
         ] );
      })
    });
  }

  $('#btn-Guardar').click(function (e) {
    e.preventDefault();
    Producto = $("#nomProducto").val();
    if (!confirm("Desea Crear "+Producto)) {
      return false;
    }
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
        
        // notificacion

        $('div#notification-container').fadeIn(350);
        $(".notification").addClass("notification-"+response['notification']);
        $('#titulo').text(response['notification']);
        table.clear().draw();
        indexCreateProd();

       $('div#notification-container').delay(3000).fadeOut(350);    
      },

    });
  });


  // ---------------------------------- Seccion Modificr producto --------------------------------------
  
});

// var rout = $('#CrearProducto').attr('action');
//     url = rout;
//     $.get(url, function(res){
//       $(res).each(function(key, value){
//         $('table#Productos').dataTable().fnAddData( [
//           value['id'],
//           value['nomProducto'],
//           value['descripcion_producto'],
//           value['estado'],
//           "<button class='btn btn-warning btn-sm btnEdit' data-toggle='modal' data-target='#modal-warning'><i class='fa fa-pencil'></i> Editar</button>"
//          ] );
//         // $('#Productos').append("<tr class='fila'><td>"+ value['id'] +"</td><td>"+ value['nomProducto'] +"</td><td>"+ value['descripcion_producto'] +"</td><<td>"+ value['estado'] +"</td><td><button class='btn btn-warning btn-sm btnEdit' data-toggle='modal' data-target='#modal-warning'><i class='fa fa-pencil'></i> Editar</button></td></tr>")
//       })
//     });
  
//     $('.odd').on('click','button.btnEdit', function(){
//       console.log("funciona ".idProducto);
//         var idProducto = $(this).closest('tr').find('td').get(0).innerHTML;
//         var nomProducto = $(this).closest('tr').find('td').get(1).innerHTML;
//         var descripcion_producto = $(this).closest('tr').find('td').get(2).innerHTML;
      
//         $('#idProducto').val(idProducto);
//         $('#nomProducto').val(nomProducto);
//         $('#descripcion_producto').val(descripcion_producto);
//     });    


//     $('#btn-Guardar').click(function(e){
//       e.preventDefault();
//       if(! confirm("Estas seguro de Modificar")){
//           return false;
//       }
//       var dato = $("#idProducto").val();
//       var url = $('#EditarProducto').attr('action');
//       var token = $("#token").val();
//       var method = $('#EditarProducto').attr('method');
//       $.ajax({
//           url: url+'/'+dato,
//           headers: {'X-CSRF-TOKEN': token },
//           type: method,
//           dataType: 'json',
//           data: $("#EditarProducto").serialize(),
//           success : function(response){
//           if(response['StatusCode'] == "200"){
//             $('#modal-warning').modal('hide');
//           }

//           },

//         });
//       });

      


