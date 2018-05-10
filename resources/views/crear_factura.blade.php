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
                  <input type="text" class="form-control" name="nom_empresa"  id="nom_empresa" value="{{$facturas[0]->nom_empresa}}" readonly required>                  
                  <input type="text" name="id_empresa" id="id_empresa" value="{{$facturas[0]->idEmpresa}}" readonly hidden>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                
                  <label for="nom_sucursal">Sucursal</label>
                  <select type="text" class="form-control" name="nom_sucursal" id="nom_sucursal" required>
                    <option value="">Seleccione Sucursal</option>
                    @foreach($facturas as $sucursal)
                      <option value="{{$sucursal->idSucursal}}">{{$sucursal->nom_sucursal}}</option>
                    @endforeach
                  </select>
              </div>
            </div>
            <div class="col-sm-1">
              <div class="form-group">
                  <label for="fecha">Mes</label>
                  <input type="text" class="form-control" name="mes" id="mes" value="{{$facturas[0]->mes}}" required readonly="true">
                  <input type="text" name="mes_db" id="mes_db" value="{{$facturas[0]->mes}}" hidden>
              </div>
            </div>
            <div class="col-sm-1">
              <div class="form-group">
                  <label for="fecha">Año</label>
                  <input type="text" class="form-control" name="anio" id="anio" value="{{$facturas[0]->anio}}" required readonly="true">
                  <input type="text" name="anio_db" id="anio_db" value="{{$date2}}" hidden>
              </div>
            </div>

            <div class="col-sm-1">
              <div class="form-group">
                <label>&nbsp;</label>
                <button type="button" id="btn_iniciar" class="btn btn-primary btn-as-block"><i class="fa fa-search" style="margin-right: 3px;"></i>Iniciar Factura</button>                            
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

  
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">Realizar Factura</h3>
      </div>

      <div class="panel-body">
        <form id="FormPrecioProd">
          {{ csrf_field() }}   
          <input type="text" class="form-control" name="_token" id="token" value="{{ csrf_token() }}" style="display:none">
          <div class="row">
            <div class="col-sm-12">
              <div class="col-sm-1">
                <div class="form-group">
                  <label for="no_factura">No. Factura</label>
                  <input type="text" class="form-control" name="no_factura" id="no_factura" readonly="true">
                </div>                      
              </div>  
              <div class="col-sm-2">
                <div class="form-group">
                  <label for="">Producto</label>
                  <input type="text" class="form-control">
                </div>
              </div>
              <div class="col-sm-2">
                <div class="form-group">
                  <label for="">Precio</label>
                  <input type="text" class="form-control">
                </div>
              </div>
              <div class="col-sm-2">
                <div class="form-group">
                  <label for="">Cantidad</label>
                  <input type="text" class="form-control">
                </div>
              </div>        
              <div class="col-sm-2">
                <div class="form-group">
                  <label>&nbsp;</label>
                  <button type="button" id="btn_ver" class="btn btn-primary btn-as-block"><i class="fa fa-arrow-circle-right" style="margin-right: 3px;"></i>Ver</button>                            
                </div>
              </div>                 
            </div>

          </div>  
        </form>

        <form action="">
          
        </form>
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





