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
                <button type="button" id="btn_iniciar" class="btn btn-primary btn-as-block"><i class="fa fa-arrow-circle-right" style="margin-right: 5px;"></i>Iniciar Factura</button>                            
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
      <form id="factura" class="head-factura">
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
          </div>            
        </div>

        <div class="row">
          <div class="col-sm-12">
             
            <div class="col-sm-2">
              <div class="form-group">
                <label for="">Producto</label>
                <select name="nom_producto" id="nom_producto" class="form-control">
                  
                </select>
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label for="">Precio</label>
                <select name="precio_prod" id="precio_prod" class="form-control">
                  
                </select>                  
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
                <label for="">Sub Total</label>
                <input type="text" class="form-control">
              </div>
            </div>            
            <div class="col-sm-2">
              <div class="form-group">
                <label>&nbsp;</label>
                <button type="button" id="btn_agregar" class="btn btn-primary btn-as-block"><i class="fa fa-plus-circle" style="margin-right: 5px;"></i>Agregar</button>                            
              </div>
            </div>                 
          </div>

        </div>  
      </form>

      <form id="factura_body" class="head-factura">
        <div class="row">
          <div class="col-sm-12">
            <table id="creacion_factura" class="display table table-responsive table-bordered table-striped table-hover">
              <thead>
              <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Cantidad</th>
                <th>Precio Unitario</th>
                <th>Subtotal</th>                  
                <th>Opción</th>
              </tr>
              </thead>
              <tbody>
               
                <tr>
                  <td>
                    <div class="form-group" style="width:100% !important;">                        
                      <input type="text" class="form-control" name="test[]" style="width:100% !important;" readonly="true" value="1">
                    </div>  
                  </td>
                  <td>
                     <div class="form-group" style="width:100% !important;">                        
                      <input type="text" class="form-control" name="test[]" style="width:100% !important;" readonly="true">
                    </div>
                  </td>
                  <td>
                     <div class="form-group" style="width:100% !important;">                        
                      <input type="text" class="form-control" name="test[]" style="width:100% !important;" readonly="true">
                    </div>
                  </td>
                  <td>
                    <div class="form-group" style="width:100% !important;">                        
                      <input type="text" class="form-control" name="test[]" style="width:100% !important;" readonly="true">
                    </div>
                  </td>
                  <td>
                    <div class="form-group" style="width:100% !important;">                        
                      <input type="text" class="form-control" name="test[]" style="width:100% !important;" readonly="true">
                    </div>
                  </td>                                        
                  <td> <button type="button" class="btn btn-danger btn-as-block btn_borrar_linea"><i class="fa fa-trash" style="margin-right: 5px;"></i>Borrar</button> </td>
                </tr>

                <tr>
                  <td>
                    <div class="form-group" style="width:100% !important;">                        
                      <input type="text" class="form-control" name="test[]" style="width:100% !important;" readonly="true" value="2">
                    </div>  
                  </td>
                  <td>
                     <div class="form-group" style="width:100% !important;">                        
                      <input type="text" class="form-control" name="test[]" style="width:100% !important;" readonly="true">
                    </div>
                  </td>
                  <td>
                     <div class="form-group" style="width:100% !important;">                        
                      <input type="text" class="form-control" name="test[]" style="width:100% !important;" readonly="true">
                    </div>
                  </td>
                  <td>
                    <div class="form-group" style="width:100% !important;">                        
                      <input type="text" class="form-control" name="test[]" style="width:100% !important;" readonly="true">
                    </div>
                  </td>
                  <td>
                    <div class="form-group" style="width:100% !important;">                        
                      <input type="text" class="form-control" name="test[]" style="width:100% !important;" readonly="true">
                    </div>
                  </td>                                        
                  <td> <button type="button" class="btn btn-danger btn-as-block btn_borrar_linea"><i class="fa fa-trash" style="margin-right: 5px;"></i>Borrar</button> </td>
                </tr>
               
              </tbody>
            </table>
          </div>
        </div>
        
      </form>

      <div class="row">
        <div class="col-sm-12">
          <div class="col-sm-2">
            <div class="form-group">
              <label for="total_cantidad">Total Cantidad</label>                        
              <input type="text" class="form-control" name="total_cantidad" id="total_cantidad" readonly="true">
            </div>
          </div>
          <div class="col-sm-2">
            <div class="form-group">
              <label for="total_importe">Total Factura Q.</label>
              <input type="text" class="form-control" name="total_importe" id="total_importe" readonly="true">
            </div>
          </div>
          <div class="col-sm-2">
            <div class="form-group">
              <label>&nbsp;</label>
              <button type="button" id="btn_guardar" class="btn btn-primary btn-as-block"><i class="fa fa-download" style="margin-right: 5px;"></i>Guardar</button>
            </div>
          </div>
        </div>
      </div>

    </div>          
  </div>
  

<div class="alert" id="notification-container" style="display:none;">
    <div class="notification">
        <button class="notification-close"></button>
        <div class="notification-title"><span id="titulo"></span> !</div>
        <div class="notification-message"><span id="mensaje"></span></div>
    </div>
</div>

</div>


@stop
@section('js')
  <script type="text/javascript" src="{{ asset('js/crear_factura.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/carga_factura.js') }}"></script>
  @stack('js')
  @yield('js')
@stop





