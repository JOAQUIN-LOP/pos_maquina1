@extends('adminlte::page')

@section('title', 'Articulos')

@section('content_header')
    <h1>Detalle Articulos</h1>
@stop

@section('content')

<div class="box box-success">

  <div class="box-header with-border">
    <h3 class="box-title">Detalle Articulo</h3>
  </div>
  <input type="text" value="{{URL::to('/home/detalle/precio')}}" id="pathDetalleProd" class="form-control" style="display:none">
  <input type="text" value="{{URL::to('/home/producto')}}" id="pathProd" class="form-control" style="display:none">
  <!-- box-body -->
    <div class="box-body">

      {{--  inici box body  --}}
      <div class="box-body">
        <div class="row">
          <div class="col-sm-12">
            <table id="TablaDetalle" class="display" >
            <thead>
              <tr>
                <th>id</th>
                <th>Producto</th>
                <th>Descripcion</th>
                <th>Estado</th>
                <th>Opcion</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>
      {{--  fin box body  --}}
    </div>

    {{--  /box-body   --}}
    <div class="modal modal-info fade" id="modal-info">
        <div class="modal-dialog modal-xl">
          <div class="modal-content ">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Crear Precio Producto</h4>
            </div>
            <div class="modal-body">
              
                <form id="FormPrecioProd" action="{{URL::to('/home/detalle/precio')}}" method="POST">
                  {{ csrf_field() }}   
                  <input type="text" class="form-control" name="_token" id="token" value="{{ csrf_token() }}" style="display:none">   
                  {{--  inicio row  --}}
                  <div class="row">
                    <div class="col-sm-3">
                      <div class="form-group">
                          <label for="exampleInputPassword1">Id Producto</label>
                          <input type="text" class="form-control" name="IdProducto" id="IdProducto" readonly required>
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                          <label for="exampleInputPassword1">Producto</label>
                          <input type="text" class="form-control" name="nomProducto" id="nomProducto" readonly required>
                      </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mes</label>
                            <select class="form-control" name="mesDetalle" id="mesDetalle">
                                <option value="">Seleccione Mes</option>  
                                <option value="1">Enero</option>
                                <option value="2">Febrero</option>
                                <option value="3">Marzo</option>
                                <option value="4">Abril</option>
                                <option value="5">Mayo</option>
                                <option value="6">Junio</option>
                                <option value="7">Julio</option>
                                <option value="8">Agosto</option>
                                <option value="9">Septiembre</option>
                                <option value="10">Octubre</option>
                                <option value="11">Noviembre</option>
                                <option value="12">Diciembre</option>
                            </select>
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Año</label>
                              <select class="form-control" name="AnioDetalle" id="AnioDetalle">
                                  <option value="">Seleccione Anio</option>  
                              </select>
                          </div>
                        </div>
                  </div>
                  {{--  fin row  --}}
                  <div class="row top-row">
                      <div class="col-sm-3">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Cantidad</label>
                                <input type="text" class="form-control OnlyNumber" name="cantidad_unidades" id="cantidad_unidades" required>
                          </div>
                        </div>
                      <div class="col-sm-3">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Precio Total</label>
                              <input type="text" class="form-control OnlyNumbreFloat" name="precio_total_compras" id="precio_total_compras" required>
                        </div>
                      </div>
                      <div class="col-sm-1">
                        <div class="form-group" style="padding-top:25px">
                          <input type ="button" id="calcular" class="btn btn-outline" value="Calcular">
                        </div>
                      </div>
                      <div class="col-sm-2">
                          <div class="form-group">
                            <label for="exampleInputPassword1">Precio U</label>
                            <input type="text" class="form-control" name="precio_unidad" id="precio_unidad" readonly required>
                          </div>
                      </div>
                      <div class="col-sm-3 text-center">
                        <div class="form-group" style="padding-top:25px"s>
                          <button type ="submit" id="GuardarPrecio" class="btn btn-outline"><i class="fa fa-save"></i> Guardar</button>
                        </div>
                      </div>
                  </div>
                </form>
                
                <hr>
               <div class="container-fluid">
                    <div class="table-responsive">
                      <table id="detallePrecioProducto" class="table" >
                        <thead>
                        <tr>
                          <th>Producto</th>
                          <th>Cantidad</th>
                          <th>Precio Unitario</th>
                          <th>Precio Total</th>
                          <th>Mes</th>
                          <th>Anio</th>
                          <th>estado</th>
                        </tr>
                        </thead>
                        <tbody>
                  
                        </tbody>
                      </table>
                    </div>
                    {{--  fin box body  --}}
                    
                    <div class="alert" id="notification-container" style="display:none;">
                        <div class="notification">
                            <button class="notification-close"></button>
                            <div class="notification-title"><span id="titulo"></span> !</div>
                            <div class="notification-message"><span id="mensaje"></span></div>
                        </div>
                    </div>
                                        
                </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Salir</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
</div>
@stop
@section('js')
  <script type="text/javascript" src="{{ asset('js/detalleArticulos.js') }}"></script>
  @stack('js')
  @yield('js')
@stop

