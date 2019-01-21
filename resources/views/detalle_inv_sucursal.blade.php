
<div class="modal-dialog modal-lg">
  <div class="modal-content ">
    <div class="modal-header bg-info">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title">Detalle de Inventario</h4>
    </div>
    <div class="modal-body">        
        
      <form id="formDetalle">
          {{ csrf_field() }}   
          <input type="text" class="form-control" name="_token" id="token" value="{{ csrf_token() }}" style="display:none">   
          {{--  inicio row  --}}
          <div class="row">
            <div class="col-sm-3">
              <div class="form-group">
                  <label for="total_prod">Total Productos:</label>
                  <input type="text" class="form-control" name="total_prod" id="total_prod" value="{{ $suma[0]->cantidad }}" readonly>
                  <input type="text" name="sucursal" id="sucursal" value="{{ $sucursal[0]->nom_sucursal }}" hidden>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                  <label for="total_cantidad">Total Inventario:</label>
                  <input type="text" class="form-control" name="total_cantidad" id="total_cantidad" value="{{ $suma[0]->total }}" readonly >
              </div>
            </div>                                    
          </div>
          {{--  fin row  --}}                
        </form>

       <div class="container-fluid">
            <div class="table-responsive">
              <table id="detalle_sucursal" class="display table table-striped table-responsive table-bordered table-hover" style="width:100%">
                <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Descripcion</th>
                  <th>Fecha</th>
                  <th>Precio Unitario</th>
                  <th>Sub Total</th>                  
                </tr>
                </thead>
                <tbody>
                  @foreach($detalles as $detalle)
                  <tr>
                    <td>{{ $detalle -> nomProducto }}</td>
                    <td>{{ $detalle -> descripcion_producto }}</td>
                    <td>{{ \Carbon\Carbon::parse($detalle->fecha)->format('d/m/Y') }}</td>
                    <td>{{ $detalle -> cantidad_total }}</td>
                    <td>{{ $detalle -> subtotal_inventario }}</td>
                  </tr>                                                                                                            
                  @endforeach      
                </tbody>
              </table>
            </div>
            {{--  fin box body  --}}
                                                   
        </div>

    </div>
    <div class="modal-footer">
      <button type="button" class="btn pull-right dark-blue-button" data-dismiss="modal">Salir</button>
    </div>
  </div>
  <!-- /.modal-content -->
</div>

<script type="text/javascript">

//variables globales
var nombre = $("#sucursal").val(),
  cantidad = $("#total_prod").val(),
  total = $("#total_cantidad").val(),
  Repo = $("#DescargarRepo"),
  doc, pageContent, str, columns=[], rows=[], fecha, FActual, pageWidth, pageHeight,
  totalPagesExp = "{total_pages_count_string}";

  $("#detalle_sucursal").DataTable({
    autoWitdh: true,
    order: [[ 0, "asc" ]],
      dom: 'Bfrtip',//Definimos los elementos del control de tabla
      // agregamos botones para exportar la informacion 
      buttons: [
        {
            extend: 'pdfHtml5',
            action: function ( e, dt, button, config ) {
                var datosTable = dt.buttons.exportData();

        doc = new jsPDF('l', 'pt', 'letter');
        pageWidth = doc.internal.pageSize.width || doc.internal.pageSize.getWidth(),
        pageHeight = doc.internal.pageSize.height || doc.internal.pageSize.getHeight();             

        pageContent = function (data) {
        // HEADER
        // doc.addImage(imgBase, 'JPEG', 45, 20, 90, 90);
        doc.setFontSize(20);
        doc.setTextColor(40);
        doc.setFontStyle('normal');
        doc.setDrawColor(48, 55, 62);
        fecha = new Date();
        FActual = fecha.getDate() + "/" + (fecha.getMonth() +1) + "/" + fecha.getFullYear();
        // encabezado 
        doc.setFontSize(10);
        doc.writeText(20, 80, `Fecha: ${FActual}`, { align: 'center' });
        doc.setFontSize(16);
        doc.setFont("times");
        doc.setFontType("bold");
        doc.writeText(20, 60, `Inventario Sucursal ${nombre}`, { align: 'center' });
        doc.setFontSize(12);
        doc.setFontType("normal");
        doc.writeText(-50, 100, `Total Inventario: ${total}`, { align: 'right' });
        doc.setFontSize(12);
        doc.writeText(40, 100,`Cantidad Productos: ${parseInt(cantidad)}`, { align: 'lefth' });
        // doc.writeText(-150, 120,`${result.cabecera[0].fecha}`, { align: 'right' });      

        // FOOTER
        str = "Pagina " + data.pageCount;
        // Total page number plugin only available in jspdf v1.0+
        if (typeof doc.putTotalPages === 'function') {
            doc.setFontSize(9);
            doc.setFontType("normal");
            str = str + " de " + totalPagesExp;
        }
          doc.text(str, data.settings.margin.left, pageHeight-25 );
        }
        rows = [];
        columns = [ datosTable.header[0], datosTable.header[1], datosTable.header[2], datosTable.header[3], datosTable.header[4]  ];
        $.each(datosTable.body, function(i, item) {
          rows[i] = [ datosTable.body[i][0], datosTable.body[i][1], datosTable.body[i][2], datosTable.body[i][3], datosTable.body[i][4] ];
        });

        
    doc.autoTable(columns, rows, {
        theme: 'grid',
        headerStyles: {
          fillColor: [48, 55, 62],
          textColor: 255, 
          halign: 'center',
          width: 'wrap', 
          overflow: 'linebreak',
          },
        addPageContent: pageContent,
        margin: { top: 140, bottom: 100 },
        styles: {
            fontSize: 10,
            lineWidth: 1,
            textColor: 20,
            lineColor: [1],
            fillColor: false,
            valign: 'middle'
        },
        columnStyles: {
            0: { columnWidth: 200, halign: 'left'  },
            1: { columnWidth: 200, halign: 'left', width: 'wrap', overflow: 'linebreak'},
            2: { columnWidth: 70,  halign: 'center', width: 'wrap', overflow: 'linebreak'},
            3: { columnWidth: 120, halign: 'right', width: 'wrap', overflow: 'linebreak'},
            4: { columnWidth: 120, halign: 'right', width: 'wrap', overflow: 'linebreak'},
        },

    });

    // Total page number plugin only available in jspdf v1.0+
    if (typeof doc.putTotalPages === 'function') {
        doc.putTotalPages(totalPagesExp);
    }
        doc.save('mipdf.pdf');
            
            }       
      }
    ]  
  });
</script>