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


  var anioActual = (new Date).getFullYear();
  var mesActual = (new Date).getMonth();
  
  var mesInventario;
  var anioInventario;
  let meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
  let NumInventario = [1,2,3,4,5,6,7,8,9,10,11,12];

  $(NumInventario).each(function (key, value) {
            
    if(NumInventario[key] == NumInventario[mesActual]){  
    $("#mesDetalle").append("<option value='"+NumInventario[key]+"' selected>"+meses[value-1]+"</option>");
    }else{
      $("#mesDetalle").append("<option value='"+NumInventario[key]+"'>"+meses[value-1]+"</option>");
    }

    });

    $("#AnioDetalle").append(" <option value='"+ anioActual +"' >"+ anioActual +"</option>");


  

  // cargamos los productos activos al datatable
  index();
  var tabla;
  var tabla2;
  function index() {
    url = $('#pathProd').val();
    
      tabla = $('#TablaDetalle').DataTable(
      {
        responsive:true,
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
              if(r.length >= 1){

                // agregamos los datos al datatable 
                $(r).each(function (key, value) {
                  tabla.row.add([
                    key+1,
                    value['nomProducto'],
                    value['descripcion_producto'],
                    estado = (value['estado'] == 1) ? "<span class='label label-success'>Activo</span>" : "<span class='label label-danger'>Inactivo</span>",
                    "<button type='button' role='"+value["id"]+"' class='btn btn-info btn-sm AgregarPrecioPro' data-toggle='modal' data-target='#modal-info'>Agregar Precio</button>"
                  ]).draw(false);
                  $( ".odd" ).addClass("fila");
                  $( ".even" ).addClass("fila");
                })

              }else{
                  $(".dataTables_empty").text("No se encontro ningun registros"); 
              }
      
          },
					error: function(e){
						console.log(e.responseText);	
					}
				},
      });
  }

// al precionar el boton agregar precio abre un modal  
$('#TablaDetalle').on('click','button.AgregarPrecioPro', function(){
  var idProducto = $(this).attr('role');
  var nomProducto = $(this).closest('tr').find('td').get(1).innerHTML;
  var descripcion_producto = $(this).closest('tr').find('td').get(2).innerHTML;

  $("#IdProducto").val(idProducto);
  $("#nomProducto").val(nomProducto);
  //limpiamos el datatable
  $('#detallePrecioProducto').DataTable().destroy();
  ProductosPrecio(idProducto);
 
});

// carga los productos con precio 
  function ProductosPrecio(id) {
    url =  $('#pathDetalleProd').val();   
      tabla2 = $('#detallePrecioProducto').DataTable(
      {
        responsive:true,
        "ajax":
				{
					url: url + "/" + id + "/" + anioActual + "/" + NumInventario[mesActual],
          type : "get",
          success: function(r){
            // agregamos los datos al datatable
            if(r.length == 0){
              $(".dataTables_empty").text('No se encontraron resultados');
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
  

    //  Calcular precio unitario

     $('#calcular').on('click', function(){
           var cantidad = $("#cantidad_unidades").val();
           var precio =  $("#precio_total_compras").val();

           if(precio > 0){
            Total = (precio / cantidad);
           $('#precio_unidad').val(parseFloat(Total).toFixed(2));
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
                // muestra notificacion
                $('div#notification-container').fadeIn(350);
                $(".notification").addClass("notification-"+response['notification']);              
      
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
        responsive:true,
        destroy:true,
        dom: 'Bfrtip',//Definimos los elementos del control de tabla
        // agregamos botones para exportar la informacion 
        buttons: [ // agregamos botones para exportar la informacion 
          {
            text: 'PDF',
            action: function ( e, dt, button, config ) {
                var data = dt.buttons.exportData(),
                totalPagesExp = "{total_pages_count_string}",
                pageContent,
                fecha = new Date(),
                Mes =("00" + (fecha.getMonth()+1)).slice (-2),
                Dia =("00" + fecha.getDate()).slice (-2),            
                doc = new jsPDF('p', 'pt', 'letter'),
                rows = [],
                columns = [ data.header[0], data.header[1], data.header[2], data.header[3], data.header[4] ],
                pageHeight = doc.internal.pageSize.height || doc.internal.pageSize.getHeight(),
                pageWidth = doc.internal.pageSize.width || doc.internal.pageSize.getWidth(),
                Ancho = pageWidth - 125;

                pageContent = function (data) {
                  // HEADER
                  doc.setFontSize(16).setFontType("bold");
                  doc.writeText(20, 30, `TIENDA MALDONADO`, { align: 'center' });
                  doc.setFontSize(12).writeText(20, 50, `SAN JOSE LA MAQUINA`, { align: 'center' });
                  doc.setFontSize(12).writeText(20, 70, 'LISTADO DE ARTICULOS', { align: 'center' });
      
                  FActual = Dia + "/" +  Mes + "/" + fecha.getFullYear();
                  doc.setFontSize(10).writeText(Ancho, 90, `FECHA: ${FActual}  `);
                //doc.writeText(Ancho, 70, `PAGINA: ${data.pageCount}`); 
                  // FOOTER
                  str = "Pagina " + data.pageCount;
                  // Total page number plugin only available in jspdf v1.0+
                  if (typeof doc.putTotalPages === 'function') {
                      doc.setFontSize(8);
                      doc.setFontType("normal");
                       str = str + " de " + totalPagesExp;
                      //str = "ORIGINAL: UNIDAD DE BODEGA DE PROVEEDURIA";
                  }
              
                  doc.text(str, data.settings.margin.left, pageHeight  - 25);
                  
              };
                $.each(data.body, function(i, item) {
                  rows[i] = [ data.body[i][0], data.body[i][1], data.body[i][2], data.body[i][3], `Q. ${parseFloat(data.body[i][4]).toFixed(2)}`];
                });

  
                doc.autoTable(columns, rows,{
                  addPageContent: pageContent,
                  headerStyles:   {
                    textColor: 255,
                    fillColor:[41, 128, 185],
                    halign: 'center',
                    valign: 'middle',
                    fontSize: 12,
                    fontStyle: 'bold'
                        },
                    margin: { 
                      top: 100, bottom: 80 
                    },
                    styles: {
                        textColor: 0,
                        fontSize: 12,
                        lineWidth: 0,
                        fillColor: false,
                        tableWidth: 'auto',
                    },
                   columnStyles: {
                    textColor: 0,
                    width: 'wrap',
                    overflow: 'linebreak', 
                    0: {columnWidth: 55 },
                    1: {width: 'wrap', overflow: 'linebreak', halign: 'center', columnWidth: 80 },
                    2: {width: 'wrap', overflow: 'linebreak', halign: 'center', columnWidth: 150 },
                    3: {width: 'wrap', overflow: 'linebreak', halign: 'center', columnWidth: 150 },
                    4: {halign: 'right', columnWidth: 100 }
                  }
                });

                 // Total page number plugin only available in jspdf v1.0+
                if (typeof doc.putTotalPages === 'function') {
                    doc.putTotalPages(totalPagesExp);
                }
                doc.autoPrint();
                var iframe = document.getElementById('iframePDF');
              
                iframe.data = doc.output('dataurlstring');
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
                value['descripcion_producto'],
                value['precio_total_compras'],  
                value['fecha'],
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

