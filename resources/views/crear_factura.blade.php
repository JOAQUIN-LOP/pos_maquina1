@extends('adminlte::page')

@section('title', 'Nueva Factura')

@section('css')
  <style>
    .btn.btn-as-block{
      display: block;
    }
  </style>
@stop

@section('content_header')
    <h1>Facturas</h1>
@stop

@section('content')

<!-- Form Element sizes -->
<div class="box box-success">

    @include('flash::message')

  <div class="box-header with-border">
    <h3 class="box-title">Nueva Factura</h3>
  </div>
  @if(Session::has('flash_message'))
  <div class="alert alert-success">
    <strong>Success!</strong> {{Session::get('flash_message')}}
  </div> 
  @endif
  <!-- box-body -->
    <div class="box-body">
        <input type="text" value="{!!Request::path()!!}" id="route" hidden>
      {{--  inicio form  --}}
      <form id="ver_facturas" name="ver_facturas">
        <input type="text" class="form-control" name="_token" id="token" value="{{ csrf_token() }}" style="display:none">
        {{ csrf_field() }}      
        {{--  inicio row  --}}
        <div class="row">
          <div class="col-sm-12">
            <div class="col-sm-3">
              <div class="form-group">                
                  <label for="nom_empresa">Nombre Empresa</label>
                  <input type="text" class="form-control" name="nom_empresa"  id="nom_empresa" value="" readonly required>                  
                  <input type="text" name="id_empresa" id="id_empresa" value="" readonly hidden>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                
                  <label for="nom_sucursal">Sucursal</label>
                  <select type="text" class="form-control" name="nom_sucursal" id="nom_sucursal" required>
                    <option value="">Seleccione Sucursal</option>
                   
                  </select>
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                  <label for="mes">Mes</label>
                  <select type="text" class="form-control" name="mes" id="mes" required>
                    <option value="">Seleccionar</option>
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

            <div class="col-sm-2">
              <div class="form-group">
                  <label for="anio">Año</label>
                  <select type="text" class="form-control" name="anio" id="anio" required>
                    <option value="">Seleccionar</option>
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
            <div class="col-sm-1">
              <div class="form-group">
                <label>&nbsp;</label>
                <button type="button" id="btn_ver" class="btn btn-primary btn-as-block"><i class="fa fa-search"></i></button>                            
              </div>
            </div>
          </div>
        </div>
        {{--  fin row  --}}
      </form>
      {{--  fin form  --}}
      
      
    </div>
  <!-- /.box-body -->
  <div class="modal fade" id="modal-info">
        
  </div>
  
</div>
<div class="alert" id="notification-container" style="display:none;">
    <div class="notification">
        <button class="notification-close"></button>
        <div class="notification-title"><span id="titulo"></span> !</div>
        <div class="notification-message"><span id="mensaje"></span></div>
    </div>
</div>
@stop
@section('js')
  <script type="text/javascript"></script>
  @stack('js')
  @yield('js')
@stop





