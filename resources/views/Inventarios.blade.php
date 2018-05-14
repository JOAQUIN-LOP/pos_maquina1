@extends('adminlte::page')

@section('title', 'Inventario')

@section('content_header')
    <h1>Inventario</h1>
@stop

@section('content')
{{--  div contenedor  --}}
<div class="box box-success">
  <div class="box-header with-border">
    <h3 class="box-title">Inventario</h3>
  </div>
  <div class="box-body">
    <input type="text" value="{!!Request::path()!!}" id="route" hidden>
    {{--  inicio form  --}}
      <form id="CrearInventario" action="{{URL::to('/home/inventario')}}" method="POST">
        <input type="text" class="form-control" name="_token" id="token" value="{{ csrf_token() }}" style="display:none">
        <input type="text" value="{{URL::to('home/empresa')}}" id="ruta-Emp" style="display:none" >
        <input type="text" value="{{URL::to('home/inventario/contar')}}" id="rutaInv" style="display:none" >

        
  <div class="box-body">
    <div class="row">
      <div class="col-sm-12">
        <div class="col-sm-2">
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon">Busqueda</span>
              <select id="SelectAnio" class="form-control select2">
              </select>
          </div>
        </div>
      </div>
    </div>
  </div>

  {{-- inicio datatable  --}}
  <div class="box-body">
    <div class="row">
      <div class="col-sm-12">
        <table id="All" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
          <thead>
            <th>No.</th>
            <th>Empresa</th>
            <th>Mes</th>
            <th>Año</th>
            <th>Total Productos</th>
            <th>Total Inventario</th>
            <th>Estado</th>
            <th></th>
          </thead>
          <tbody>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

@stop
@section('js')
  <script type="text/javascript" src="{{ asset('js/inventario.js') }}"></script>  
  @stack('js')
  @yield('js')
@stop
