

{{--  inici box body  --}}

        <div class="box-body" id="lista-cargada">
          <div class="row">
            <div class="col-sm-12">
              <table id="inventarios" class="display table table-responsive table-bordered table-striped table-hover">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>Numero</th>
                  <th>Sucursal</th>                  
                  <th>Fecha</th>
                  <th>Cant. Prod.</th>
                  <th>Total Q.</th>
                  <th>Estado</th>
                  <th>Opción</th>
                </tr>
                </thead>
                <tbody>
                 @foreach ($listado as $lista)
                  <tr>
                    <td>{{ $lista -> idInventarioSucursal }}</td>
                    <td>{{ $lista -> num_inventario_sucursal }}</td>
                    <td><input type="text" class="columnas" name="id_sucursal" value="{{ $lista -> idSucursal }}" hidden="true">
                      {{ $lista -> nom_sucursal }}
                    </td>                                        
                    <td>{{ \Carbon\Carbon::parse($lista->fecha)->format('d/m/Y')}}</td>                    
                    <td>{{ $lista -> total_cantidad_productos}}</td>
                    <td>{{ $lista -> total_cantidad_inventario }} </td>
                    <td>@if($lista -> estado == 1)
                          <span class="label label-success">Abierto</span>
                        @else
                          <span class="label label-danger">Cerrado</span>
                        @endif
                    </td>
                    <td> <button type="button" class="btn btn-primary btn-as-block detalles" onclick="verDetalle(this)"><i class="fa fa-search"></i></button>
                        @if ($lista->estado == 1)
                          <button type="button" class="btn btn-warning btn-as-block edita" onclick="editar(this)"><i class="fa fa-edit"></i></button>
                        @endif
                    </td>
                  </tr>

                 @endforeach
                </tbody>
              </table>
            </div>
          </div>
          {{--  fin box body  --}}
      </div>


<script type="text/javascript" src="{{ asset('js/carga_detalles_inv_sucursal.js') }}"></script>