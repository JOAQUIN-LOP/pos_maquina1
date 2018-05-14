@extends('adminlte::page')



@section('title', 'Listado Productos')

@section('content_header')
    <h1>Listado de Productos</h1>
@stop

@section('content')

<div class="box">
        <div class="box-header">
          <h3 class="box-title">Productos</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="EditProductos" class="table table-striped table-bordered" style="width:100%" >
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
        <!-- /.box-body -->
      </div>
      
      <input type="text" value="{!!Request::path()!!}" id="route" hidden>

      <div class="modal modal-warning fade" id="modal-warning">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Actualizar Producto</h4>
              </div>
              <form id="EditarProducto" action="{{URL::to('/home/producto')}}" method="put" accept-charset="UTF-8">
                  <div class="modal-body">
                    <input type="text" class="form-control" name="_token" id="token" value="{{ csrf_token() }}" style="display:none;">
                    <input type="text" class="form-control" name="idProducto" id="idProducto" placeholder="id Producto" style="display:none;">
                    <div class="form-group">
                        <label>Nombre:</label>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-cube"></i>
                          </div>
                          <input type="text" class="form-control" name="nomProducto" id="nomProducto" placeholder="Nombre Producto">
                        </div>
                        <!-- /.input group -->
                    </div>
                      <!-- /.form group -->
                     <!-- textarea -->
                    <div class="form-group">
                      <label>Textarea</label>
                      <textarea class="form-control" name="descripcion_producto" id="descripcion_producto" rows="3" placeholder="Enter ..."></textarea>
                    </div>  
               
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Salir</button>
                <button type="submit" class="btn btn-outline" id="btn-Editar">Guardar Cambios</button>
              </div>
            </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

@stop
@section('js')
<script type="text/javascript" src="{{ asset('js/articulos.js') }}"></script>
@stack('js')
@yield('js')
@stop