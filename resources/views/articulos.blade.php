@extends('adminlte::page')

@section('title', 'Articulos')

@section('content_header')
    <h1>Articulos</h1>
@stop

@section('content')

<!-- Form Element sizes -->
<div class="box box-success">

    @include('flash::message')

  <div class="box-header with-border">
    <h3 class="box-title">Crear Articulo</h3>
  </div>
  <!-- box-body -->
    <div class="box-body">
        <input type="text" value="{!!Request::path()!!}" id="route" hidden>
      {{--  inicio form  --}}
      <form id="CrearProducto" action="{{URL::to('/home/producto')}}" method="POST">
        <input type="text" class="form-control" name="_token" id="token" value="{{ csrf_token() }}" style="display:none">
        {{ csrf_field() }}      
        {{--  inicio row  --}}
        <div class="row">
          <div class="col-sm-12">
            <div class="col-sm-4">
              <div class="form-group nomProducto">
                <div class="input-group">
                  <span class="input-group-addon">Producto</span>
                  <input type="text" class="form-control" name="nomProducto"  id="nomProducto" required>
                </div>
              </div>
            </div>
            <div class="col-sm-7">
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon">Descripcion</span>
                  <input type="text" class="form-control" name="descripcion_producto" id="descripcion_producto">
                </div>
              </div>
            </div>
            <div class="col-sm-1">
              <div class="form-group">
                <button type="submit" id="btn-Guardar" class="btn btn-primary"><i class="fa fa-save"></i> Crear</button>
              </div>
            </div>
          </div>
        </div>
        {{--  fin row  --}}
      </form>
      {{--  fin form  --}}
      {{--  inici box body  --}}
        <div class="box-body">
          <div class="row">
            <div class="col-sm-12">
              <table id="Productos" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                  <th>id</th>
                  <th>Producto</th>
                  <th>Descripcion</th>
                  <th>Estado</th>
                </tr>
                </thead>
                <tbody>
                 
                </tbody>
              </table>
            </div>
          </div>
          {{--  fin box body  --}}
      </div>
      
    </div>
  <!-- /.box-body -->
  
</div>
@stop
@section('js')
  <script type="text/javascript" src="{{ asset('js/articulos.js') }}"></script>
  @stack('js')
  @yield('js')
@stop





