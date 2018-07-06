@extends('adminlte::page')

@section('title', 'Inventario')

@section('content_header')
    <h1>Inventario Sucursal</h1>
@stop

@section('content')
{{--  div contenedor  --}}
<div class="box box-success">
  <div class="box-header with-border">
    <h3 class="box-title">Agregar Producto Inventario</h3>
  </div>
  <div class="box-body">
    
    {{--  inicio form  --}}
      <form id="crear_inventario" class="head-inventario">
        <input type="text" class="form-control" name="_token" id="token" value="{{ csrf_token() }}" style="display:none">
        <div class="row">
          <div class="col-sm-12">
            
            <div class="col-sm-3">
              <div class="form-group">
                  <label for="nom_empresa">Empresa:</label>
                  <input type="text" class="form-control" name="nom_empresa"  id="nom_empresa" value="{{$sucursal[0]->nom_empresa}}" readonly required>
                  <input type="text" name="id_empresa" id="id_empresa" value="{{$sucursal[0]->idEmpresa}}" readonly hidden>
              </div>
            </div>
            <div class="col-sm-2">
             <div class="form-group">
                  <label for="nom_sucursal">Sucursal</label>
                  <select type="text" class="form-control selector" name="nom_sucursal" id="nom_sucursal" required>
                    <option value="0">Seleccione Sucursal</option>
                    @foreach($sucursal as $suc)
                      <option value="{{$suc->idSucursal}}">{{$suc->nom_sucursal}}</option>
                    @endforeach
                  </select>
              </div>
            </div>
            
            <div class="col-sm-2">
              <div class="form-group">
                  <label for="anio">Año</label>
                  <input type="text" class="form-control" name="anio" id="anio" required readonly="true">
              </div>
            </div>            
            <div class="col-sm-2">
              <div class="form-group">
                  <label for="mes">Mes</label>
                  <input type="text" class="form-control" name="mes" id="mes" required readonly="true"/>
                  <input type="text" name="mes_db" id="mes_db" readonly="true" value="" hidden="true">
              </div>
            </div>
            <div class="col-sm-1">
              <div class="form-group">
                  <label for="no_inventario">No. Inv.</label>
                  <input type="text" class="form-control" name="no_inventario"  id="no_inventario" value="" readonly required> 
                  <input type="text" name="id_inv_sucursal" id="id_inv_sucursal" value="" hidden="true">                
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label>&nbsp;</label>
                <button type="button" id="btn_agregar" class="btn btn-primary btn-as-block form-control"><i class="fa fa-plus"></i> Agregar Producto</button>
              </div>
            </div>
          </div>
        </div>
      </form>
  </div>
</div>
  

<div class="modal fade" id="modal-info">
        
</div>

@stop
@section('js')
  <script type="text/javascript" src="{{ asset('js/add_precio_inv.js') }}"></script>
  @stack('js')
  @yield('js')
@stop
