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
  <input type="text" class="form-control" name="UrlInv" id="UrlInv" value="{{URL::to('')}}" style="display:none">  
  <!-- box-body -->
    <div class="box-body">

      {{--  inici box body  --}}
      <div class="box-body">
        <div class="row">
          <div class="col-sm-12">
            <table id="TablaList" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th>No.</th>
                <th>Contiene</th>
                <th>Producto</th>
                <th>Descripcion</th>
                <th>Precio Costo</th>
                <th>Fecha</th>
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
@stop
@section('js')
  <script type="text/javascript" src="{{ asset('js/detalleArticulos.js') }}"></script>
  @stack('js')
  @yield('js')
@stop

