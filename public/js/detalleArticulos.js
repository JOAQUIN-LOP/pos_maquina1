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
        buttons: [
          {
            extend: 'pdfHtml5',
            text: ' PDF',
            title: 'Detalle Articulos',
            exportOptions: {
              columns: [ 0, 1, 2, 3 ]
            },
            customize: function ( win ) {
              $(win.document.body)
                  .css( 'font-size', '10pt' )
                  .prepend(
                      '<img src="http://datatables.net/media/images/logo-fade.png" style="position:absolute; top:0; left:0;" />'
                  );

              $(win.document.body).find( 'table' )
                  .addClass( 'compact' )
                  .css( 'font-size', 'inherit' );
          },
            
          }
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
					url: url + "/" + id,
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
                  value['cantidad_unidades'],
                  value['precio_unidad'],
                  value['precio_total_compras'],
                  value['mes'],
                  value['anio'],
                  value['anio'],                  
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

var fecha = new Date();
    var ano = fecha.getFullYear();
    var mes = fecha.getMonth();

    // selecciona el mes actual
    $("#mesDetalle option").each(function(){
        
        if((mes+1)==$(this).attr('value')){
            $(this).attr('selected', 'selected');
        }

     });
     
    //  mostrar anio actual y 5 anios atras y 5 adelante     

    var actual = ano;
     ano = ano - 5;
    for(i=0;i<=10;i++){
        if(actual == ano){
            $("#AnioDetalle").append(" <option value='"+ano +"' selected>"+ ano +"</option>");
        }else{
            $("#AnioDetalle").append(" <option value='"+ano +"'>"+ ano +"</option>"); 
        }
        
        ano++;
    }

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
        message: "Esta seguro de crear el producto "+ Producto+" con el",
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
    
    

// fin document ready
});

