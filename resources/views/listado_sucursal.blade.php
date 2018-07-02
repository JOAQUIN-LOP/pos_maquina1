@extends('adminlte::page')

@section('title', 'Inventario')

@section('content_header')
    <h1>Inventario Sucursal</h1>
@stop

@section('content')
{{--  div contenedor  --}}
<div class="box box-success">
  <div class="box-header with-border">
    <h3 class="box-title">Lista Inventario Sucursal</h3>
  </div>
  <div class="box-body">
    
    {{--  inicio form  --}}
      <form id="crear_inventario" class="form-numero">
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
                    <option value="0">Seleccionar</option>
                    @foreach($sucursal as $suc)
                      <option value="{{$suc->idSucursal}}">{{$suc->nom_sucursal}}</option>
                    @endforeach
                  </select>
              </div>
            </div>
            
            <div class="col-sm-2">
              <div class="form-group">
                  <label for="anio">Año</label>
                  <select type="text" class="form-control selector" name="anio" id="anio" required>
                    <option value="0">Seleccionar</option>
                    <option value="2017">2017</option> 
                    <option value="2018">2018</option>
                    <option value="2019">2019</option>
                    <option value="2020">2020</option>
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                    <option value="2025">2025</option>
                    <option value="2026">2026</option>
                    <option value="2027">2027</option>
                    <option value="2028">2028</option>
                  </select>
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label>&nbsp;</label>
                <button type="button" id="btn_ver" class="btn btn-primary btn-as-block form-control"><i class="fa fa-list"></i> Ver Inventarios</button>
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
  <script type="text/javascript" src="{{ asset('js/listado_sucursal.js') }}"></script>
  @stack('js')
  @yield('js')
@stop
