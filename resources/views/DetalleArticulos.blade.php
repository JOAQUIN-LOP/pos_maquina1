@extends('adminlte::page')

@section('title', 'Articulos')

@section('content_header')
    <h1>Agregar Precio Articulo</h1>
@stop

@section('content')

<div class="box box-success">

  <div class="box-header with-border">
    <h1 class="box-title">Agregar Precio Articulo</h1>
  </div>
  <input type="text" value="{{URL::to('/home/detalle/precio')}}" id="pathDetalleProd" class="form-control" style="display:none">
  <input type="text" value="{{URL::to('/home/producto')}}" id="pathProd" class="form-control" style="display:none">
  <input type="text" class="form-control" name="UrlInv" id="UrlInv" value="{{URL::to('')}}" style="display:none">  
  <!-- box-body -->
    <div class="box-body">

      {{--  inici box body  --}}
      <div class="box-body">
        <div class="row">
          <div class="col-sm-12">
            <table id="TablaDetalle" class="table table-striped table-bordered" style="width:100%">
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
    <div class="modal modal-default fade" id="modal-info">
        <div class="modal-dialog modal-xl">
          <div class="modal-content ">
            <div class="modal-header  bg-info">
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
                                
                            </select>
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Año</label>
                              <select class="form-control" name="AnioDetalle" id="AnioDetalle"> 
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
                          <input type ="button" id="calcular" class="btn bg-navy" value="Calcular">
                        </div>
                      </div>
                      <div class="col-sm-2">
                          <div class="form-group">
                            <label for="exampleInputPassword1">Precio Unitario</label>
                            <input type="text" class="form-control" name="precio_unidad" id="precio_unidad" readonly required>
                          </div>
                      </div>
                      <div class="col-sm-3 text-center">
                        <div class="form-group" style="padding-top:25px"s>
                          <button type ="submit" id="GuardarPrecio" class="btn btn-success"><i class="fa fa-save"></i> Guardar</button>
                        </div>
                      </div>
                  </div>
                </form>
                
                <hr>
               <div class="container-fluid">
                    <div class="table-responsive">
                      <table id="detallePrecioProducto" class="table table-striped" style="width:100%">
                        <thead>
                        <tr>
                          <th>Producto</th>
                          <th>Cantidad</th>
                          <th>Precio Unitario</th>
                          <th>Precio Total</th>
                          <th>Mes</th>
                          <th>Anio</th>
                          <th>estado</th>
                          <th>Opciones</th>
                        </tr>
                        </thead>
                        <tbody>
                  
                        </tbody>
                      </table>
                    </div>
                    {{--  fin box body  --}}
                    
                                        
                </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Salir</button>
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

