

{{--  inici box body  --}}

        <div class="box-body">
          <div class="row">
            <div class="col-sm-12">
              <table id="facturas" class="display table table-responsive table-bordered table-striped table-hover">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>Numero</th>
                  <th>Sucursal</th>
                  <th>Usuario</th>
                  <th>Fecha</th>
                  <th>Total</th>
                  <th>Opción</th>
                </tr>
                </thead>
                <tbody>
                 @foreach ($facturas as $factura)
                  <tr>
                    <td>{{ $factura -> idFactura }}</td>
                    <td>{{ $factura -> num_factura }}</td>
                    <td>{{ $factura -> nom_sucursal }}</td>
                    <td>{{ $factura -> nom_usuario }}</td>
                    <td>{{ $factura -> fecha }}</td>                    
                    <td>{{ $factura -> total_factura }} </td>
                    <td> <button type="button" class="btn btn-primary btn-as-block detalles"><i class="fa fa-search"></i>Ver Detalle</button> </td>
                  </tr>

                 @endforeach
                </tbody>
              </table>
            </div>
          </div>
          {{--  fin box body  --}}
      </div>


<script type="text/javascript" src="{{ asset('js/lista_facturas.js') }}"></script>



