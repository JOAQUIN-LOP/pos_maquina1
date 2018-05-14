

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
        
        <hr>
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
                  <input type="button" class="btn btn-warning btn-as-block" id="imprimir_factura" value="Imprimir Factura">
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
        <!-- /.modal-dialog -->
<script type="text/javascript">
  $("#detalle_factura").DataTable({
    "lengthChange": false ,
    "order": [[ 1, "asc" ]]
  });
</script>

