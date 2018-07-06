

<div class="modal-dialog modal-lg">
  <div class="modal-content ">
    <div class="modal-header bg-info">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title">Detalle de Factura</h4>
    </div>
    <div class="modal-body">
      
        <form id="FormPrecioProd">
          {{ csrf_field() }}   
          <input type="text" class="form-control" name="_token" id="token" value="{{ csrf_token() }}" style="display:none">   
          {{--  inicio row  --}}
          <div class="row">
            <div class="col-sm-3">
              <div class="form-group">
                  <label for="empresa">Empresa:</label>
                  <input type="text" class="form-control" name="empresa" id="empresa" value="{{ $cabecera[0]->nom_empresa }}" readonly>
                  <input type="text" name="id_factura" id="id_factura" hidden>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                  <label for="sucursal">Sucursal:</label>
                  <input type="text" class="form-control" name="sucursal" id="sucursal" value="{{ $cabecera[0]->nom_sucursal }}" readonly >
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                  <label for="numero">Número Factura:</label>
                  <input type="text" class="form-control" name="numero" id="numero" value="{{ $cabecera[0]->num_factura }}" readonly >
              </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label for="exampleInputPassword1">Fecha:</label>
                    <input type="text" class="form-control" name="fecha" id="fecha" value="{{ \Carbon\Carbon::parse($cabecera[0]->fecha)->format('d/m/Y') }}" readonly>
                </div>
              </div>                   
          </div>
          {{--  fin row  --}}                
        </form>
        
       <div class="container-fluid">
            <div class="table-responsive">
              <table id="detalle_factura" class="display table table-striped table-responsive table-bordered table-hover" style="width:100%">
                <thead>
                <tr>
                  <th>IdProducto</th>
                  <th>Nombre</th>
                  <th>Cantidad Unidades</th>
                  <th>Precio Unitario</th>
                  <th>Sub Total</th>                  
                </tr>
                </thead>
                <tbody>
                  @foreach($detalles as $detalle)
                  <tr>
                    <td>{{ $detalle -> idProducto}}</td>
                    <td>{{ $detalle -> nomProducto}}</td>
                    <td>{{ $detalle -> cantidad}}</td>
                    <td>{{ $detalle -> precio_unit}}</td>
                    <td>{{ $detalle -> total_venta}}</td>
                  </tr>                                                                                                            
                  @endforeach      
                </tbody>
              </table>
            </div>
            {{--  fin box body  --}}

            <form>
              <div class="form-row">
                <div class="form-group col-md-3">
                  <label for="total_cantidad">Total Productos:</label>
                  <input type="text" class="form-control" id="total_cantidad" value="{{ $cantidades[0]->cantidad }}" readonly>
                </div>
                <div class="form-group col-md-3">
                  <label for="total_quetzales">Total Factura:</label>
                  <input type="text" class="form-control" id="total_quetzales" value="{{ $cantidades[0]->total }}" readonly>
                </div>
                <div class="form-group col-md-2">              
                  <label>&nbsp;</label>    
                  <input type="button" class="btn btn-warning btn-as-block" id="imprimir_factura" idFactura="{{$cabecera[0]->idFactura}}" value="Imprimir Factura">
                </div>
              </div>                
            </form>
          
                                
        </div>

    </div>
    <div class="modal-footer">
      <button type="button" class="btn pull-right dark-blue-button" data-dismiss="modal">Salir</button>
    </div>
  </div>
  <!-- /.modal-content -->
</div>
<input type="text" value="{{URL::to('/home/detalle_factura/reporte/')}}" id="rutaURL" hidden >
<object   height="0" width="0" id="iframePDF"></object>
        <!-- /.modal-dialog -->
<script type="text/javascript">
  $("#detalle_factura").DataTable({
    "lengthChange": false ,
    "order": [[ 1, "asc" ]]
  });

  $("#imprimir_factura").on('click', function(){
    
    var urlEmp = $('#rutaURL').val();
    let idVal = $("#imprimir_factura").attr("idFactura");
    console.log(urlEmp+"/"+idVal);
    $.get(urlEmp+"/"+idVal, function (result) {        
        console.log(result);
   
    var doc = new jsPDF('l', 'pt', 'letter');

    var totalPagesExp = "{total_pages_count_string}";

    var pageContent = function (data) {
        // HEADER
        // doc.addImage(imgBase, 'JPEG', 45, 20, 90, 90);
        doc.setFontSize(20);
        doc.setTextColor(40);
        doc.setFontStyle('normal');
        doc.setDrawColor(48, 55, 62);
        var fecha = new Date();
        let FActual = fecha.getDate() + "/" + (fecha.getMonth() +1) + "/" + fecha.getFullYear();
        // encabezado 
        doc.setFontSize(8);
        doc.writeText(-50, 60, `Fecha Impresión: ${FActual}`, { align: 'right' });
        doc.setFontSize(16);
        doc.setFont("times");
        doc.setFontType("bold");
        doc.writeText(20, 60, `${result.cabecera[0].nom_empresa}`, { align: 'center' });
        doc.setFontSize(14);
        doc.setFontType("normal");
        doc.writeText(20, 80, `${result.cabecera[0].nom_sucursal}`, { align: 'center' });
        doc.setFontSize(11);
        doc.writeText(120, 120,`${result.cabecera[0].num_factura}`, { align: 'lefth' });
        doc.writeText(40, 120, `No. Factura:`, { align: 'lefth' });
        doc.line(110, 127, 285, 127);
        doc.writeText(-150, 120,`${result.cabecera[0].fecha}`, { align: 'right' });
        doc.writeText(-230, 120, `Fecha:`, { align: 'right' });
        doc.line(570, 127, 745, 127);
        

        // FOOTER
        var str = "Pagina " + data.pageCount;
        // Total page number plugin only available in jspdf v1.0+
        if (typeof doc.putTotalPages === 'function') {
            doc.setFontSize(12);
            doc.setFontType("normal");
            doc.writeText(150, 548, `${parseInt(result.cantidades[0].cantidad)}` , { align: 'lefth' });
            doc.writeText(430, 548, `${result.cantidades[0].total}`, { align: 'lefth' });
            doc.setFontType("bold");
            doc.writeText(40, 550, `Total Productos: ________________________________ Total Factura: __________________________________`, { align: 'lefth' }); 
            doc.setFontSize(9);
            doc.setFontType("normal");
            str = str + " de " + totalPagesExp;
        }
       
        var pageHeight = doc.internal.pageSize.height || doc.internal.pageSize.getHeight();
        doc.text(str, data.settings.margin.left, pageHeight  - 25);
        
    };
    let rows = [];
    var columns = [ 'Id Producto', 'Nombre', 'Cantidad Unidades', 'Precio Unitario', 'Sub Total'];           
        $.each(result.detalles, function(i, item) {
            rows[i] = [result.detalles[i].idProducto, result.detalles[i].nomProducto, parseInt(result.detalles[i].cantidad), parseFloat(result.detalles[i].precio_unit).toFixed(2), parseFloat(result.detalles[i].total_venta).toFixed(2)];
        });
    doc.autoTable(columns, rows, {
        theme: 'grid',
        headerStyles: {fillColor: [48, 55, 62]},
        addPageContent: pageContent,
        margin: { top: 170, bottom: 100 },

    });

    // Total page number plugin only available in jspdf v1.0+
    if (typeof doc.putTotalPages === 'function') {
        doc.putTotalPages(totalPagesExp);
    }

    
        doc.autoPrint();

        var iframe = document.getElementById('iframePDF');

        iframe.data = doc.output('dataurlstring');
      })
  });
</script>

