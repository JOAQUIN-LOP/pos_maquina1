
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

  var nombre = $("#sucursal").val();
  var cantidad = $("#total_prod").val();
  var total = $("#total_cantidad").val();

  $("#detalle_sucursal").DataTable({
    autoWitdh: true,
    order: [[ 0, "asc" ]],
      dom: 'Bfrtip',//Definimos los elementos del control de tabla
      // agregamos botones para exportar la informacion 
      buttons: [
        {
            extend: 'pdfHtml5',
            title: 'Inventario Sucursal: ' + nombre,            
            exportOptions:{
            columns: [0, 1, 2, 3, 4]
          }       
      }
    ]  
  });
</script>